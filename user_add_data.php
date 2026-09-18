<?php include "initialize.php"; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: user_add.php");
    exit;
}

$firstname = isset($_POST["firstname"]) ? trim($_POST["firstname"]) : "";
$lastname = isset($_POST["lastname"]) ? trim($_POST["lastname"]) : "";
$username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$confirm_password = isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : "";

if (empty($firstname)) {
    $error_message = "Firstname is required";
} elseif (empty($lastname)) {
    $error_message = "Lastname is required";
} elseif (empty($username)) {
    $error_message = "Username is required";
} elseif (empty($password)) {
    $error_message = "Password is required";
} elseif (empty($confirm_password)) {
    $error_message = "Confirm Password is required";
} elseif ($confirm_password !== $password) {
    $error_message = "Password and confirm password not match";
} else {
    $error_message = null;
}

if (!empty($error_message)) {
    $_SESSION["alert_message"] = $error_message;
    header("Location: user_add.php");
    exit;
}

$firstname_sql = $connection->real_escape_string($firstname);
$lastname_sql = $connection->real_escape_string($lastname);
$username_sql = $connection->real_escape_string($username);
$password_sql = $connection->real_escape_string($password);

$sql = "INSERT INTO users (
            firstname, lastname, username, password
        ) VALUES (
            '" . $firstname_sql . "',
            '" . $lastname_sql . "',
            '" . $username_sql . "',
            '" . $password_sql . "'
        )";

if ($connection->query($sql) === TRUE) {
    $_SESSION["alert_message"] = "New record has been created";
    header("Location: user_records.php");
    exit;
}

die($connection->error);
?>
