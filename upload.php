<?php
include 'dbconfig.php';

$statusMsg = '';

//File upload directory

$targetDir = "uploads/";
 if (isset($_POST["submit_btn"])){
     if(!empty ($_FILES["file1"]["name"])){
         $fileName = basename($_FILES["file1"]["name"]);
         $targetFilePath = $targetDir.$fileName;
         $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

         //allow certain file formats
         $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
         if(in_array($fileType, $allowType)){
             //upload file to server
             if(move_uploaded_file($_FILES["file1"]["tmp_name"],$targetFilePath)){
                 //insert image file name into db
                 $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES('".$fileName."', NOW())");
                 if($insert){
                     $statusMsg = "The file".$fileName."has been uploaded successfully.";
                 }
                 else{
                     $statusMsg = "File uploaded failed";
                 }
             }else{
                 $statusMsg = "Sorry there was an error uploading your file.";
             }
         }else{
             $statusMsg = "Sorry only JPG, JPEG, GIF, & PDF  files are allowed.";
         }
     }else{
         $statusMsg = "please select a file to upload.";
     }
 }
