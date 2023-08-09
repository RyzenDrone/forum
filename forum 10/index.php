<!DOCTYPE html>
<html>
<head>
    <title>Upload File Form</title>
</head>
<body>
    <h2>Upload File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <label for="file">File (JPEG/PNG only):</label>
        <input type="file" name="file" accept=".jpeg, .jpg, .png" required>
        <br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>