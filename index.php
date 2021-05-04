<?php
   include 'upload.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image uploads</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="container">
      <div class="upfrm">
           <?php if(!empty($statusMsg)){?>
              <p class="status-msg"><?php echo $statusMsg; ?></p>
           <?php } ?>
          <form action="" method="post" enctype="multipart/form-data">

            Select Image File to Upload: 
            <input type="file" name="file1">
            <input type="submit" name="submit_btn" value="upload">
          </form>
      </div>
      <div class="gallery">
         <div class="gcon">
             <h2>Uploaded Images </h2>
             <?php
                //include db config file
                 include 'dbconfig.php';
                 //get images from the db
                 $query = $db ->query("SELECT *FROM (images ORDER BY uploaded_on DESC)");
                 if($query ->num_rows > 0){
                     while($row = $query ->fetch_assoc()){
                         $imageURL = 'uploads/'.$row["file_name"];
             ?>
             <img src="<?php echo $imageURL;?>" alt=""/>
             <?php }
                }else{
             ?>
                    <p> No image(s) found...</p>
                    <?php
                } ?>
             
         </div>
      
      </div>
   </div>
    
</body>
</html>