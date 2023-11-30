<?php
    // database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test_db";

    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection error: " . $conn->connect_error);
    }

    // target directory
    $targetDir = "uploads/";

    if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] === 0){
        $fileName = basename($_FILES["fileToUpload"]["name"]);
        $targetPath = $targetDir.$fileName;

        if(move_uploaded_file($_FILES["fileToUpload"]["name"],$targetPath)){
            $sql = "INSERT INTO files (fileName, targetPath) VALUES ('$fileName', '$targetPath')";
            if($conn->$query($sql)==true){
                echo "File uploaded successfully";
            }else{
                echo "Error : ".$sql."Error Details: ".$conn->error;
            }
        }else{
            echo "Error moving file";
        }
    }else{
           echo "File not uploaded successfully";
    }
$conn->close();
