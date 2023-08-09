<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email=$_POST["email"];
    $targetDir="uploads/";
    $targetFile=$targetDir . basename($_FILES["file"]["name"]);
    $fileType=strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes=array("jpeg", "jpg", "png");
    if(in_array($fileType, $allowedTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)){
            echo "File has been uploaded successfully.";
        }else{
            echo "Sorry, there was an error uploading your file.";
        }
    }else{
        echo "Only JPEG and PNG files are allowed.";
    }
}
?>
