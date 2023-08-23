<!DOCTYPE html>
<html>
<head>
    <title>Upload File Form</title>
</head>
<body>
    <h2>Upload File</h2>
    <?php
        session_start();
        $user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 'guest';
        $access_permissions = [
            'admin' => ['upload', 'download'],
            'user' => ['upload']
        ];
        if (in_array('upload', $access_permissions[$user_role])) {
    ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <label for="file">File (JPEG/PNG only):</label>
        <input type="file" name="file" accept=".jpeg, .jpg, .png" required>
        <br><br>
        <input type="submit" value="Upload">
    </form>
    <?php
        } else {
            echo '<p>You do not have permission to access this feature.</p>';
        }
    ?>
</body>
</html>
