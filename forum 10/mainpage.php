<?php
$servername="localhost:3307";
$username="username";
$password="password";
$dbname="uploads";

$conn=new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST["email"];
    $targetDir="uploads/";
    $targetFile=$targetDir . basename($_FILES["file"]["name"]);
    $fileType=strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = array("jpeg", "jpg", "png");
    if(in_array($fileType, $allowedTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)){
            $stmt=$conn->prepare("INSERT INTO uploads (email, file_name) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $targetFile);
            if($stmt->execute()){
                echo "File has been uploaded and data saved successfully.";
            }else{
                echo "Sorry, there was an error.";
            }
            $stmt->close();
        }else{
            echo "Sorry, there was an error uploading your file.";
        }
    }else{
        echo "Only JPEG and PNG files are allowed.";
    }
}
$conn->close();
?>