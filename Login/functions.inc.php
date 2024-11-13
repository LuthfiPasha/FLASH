<?php

function uidExists($conn, $email) {
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt); // Close the statement before returning
        return $row;
    } else {
        mysqli_stmt_close($stmt); // Close statement even if the result is false
        return false;
    }
}

function createUser($conn, $name, $email, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersPass) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement preparation failed: " . mysqli_error($conn);
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);

    if (!mysqli_stmt_execute($stmt)) {
        echo "SQL execution failed: " . mysqli_error($conn);
        exit();
    }

    mysqli_stmt_close($stmt);
    header("Location: ../login.php?error=none");
    exit();
}


function LoginUser($conn, $username, $pwd) {
    // Fetch user data by email/username
    $uidExists = uidExists($conn, $username);

    // If user doesn't exist, redirect with an error
    if ($uidExists === false) {
        header("location: ../signup.php?error=wronglogin");
        exit();
    }

    // Get the hashed password from the database
    $pwdHashed = $uidExists["usersPass"];

    // Verify the provided password against the hashed password
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        // Incorrect password
        header("Location: ../signup.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        // Successful login, start session
        session_start();
        $_SESSION["userid"] = $uidExists["userId"];
        $_SESSION["email"] = $uidExists["usersEmail"];

        // Redirect to home page after successful login
        header("Location: ../index.php");
        exit();
    }
}
