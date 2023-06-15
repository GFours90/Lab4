<h2>Form result</h2>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = isset($_POST['cf-name']) ? htmlspecialchars($_POST['cf-name']) : '';
        $email = isset($_POST['cf-email']) ? filter_var($_POST['cf-email'], FILTER_SANITIZE_EMAIL) : '';
        $message = isset($_POST['cf-message']) ? htmlspecialchars($_POST['cf-message']) : '';

        // Do Stuff
        $db_host = 'localhost';
        $db_name = 'grunt';
        $db_user = 'root';
        $db_pass = '';

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($conn->connect_error) {
            die('DB connection error: ' . $conn->connect_error);
        }

        // 'text'); DROP 
        $sql = "INSERT INTO T1 (Name, Email, Mesage) VALUES ('{$name}', '{$email}', '{$message}')";
        if ($conn->query($sql) === true) {
            echo 'New submit saved successfully.';
        } else {
            echo 'Error: ' . $conn->error;
        }

        echo "<p>Name: {$name}</p>";
        echo "<p>Email: {$email}</p>";
        echo "<p>Message: {$message}</p>";
    } else {
        echo 'Error in data!';
    }