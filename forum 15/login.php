<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br><br>
        <div class="g-recaptcha" data-sitekey="https://www.google.com/recaptcha/enterprise.js?render=6Lf0_cknAAAAAN49KJPPcY30WOb5B3eZOW8xqSdV"></div>
        <br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php
session_start();
$secretKey = "https://www.google.com/recaptcha/enterprise.js?render=6Lf0_cknAAAAAN49KJPPcY30WOb5B3eZOW8xqSdV";
$response = $_POST['g-recaptcha-response'];
$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$response}");
$responseData = json_decode($verify);
if ($responseData->success) {
    $_SESSION['user_role'] = 'user';
    header("Location: welcome.php");
} else {
    echo "reCAPTCHA verification failed. Please try again.";
}
?>
