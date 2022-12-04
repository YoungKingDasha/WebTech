<?php
if(isset($_FILES['doc'])){
      $errors= array();
      $file_name = $_FILES['doc']['name'];
      $file_size = $_FILES['doc']['size'];
      $file_tmp = $_FILES['doc']['tmp_name'];
      $file_type = $_FILES['doc']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['doc']['name'])));
      
      $expensions= array("docx","pdf","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a docx or png or pdf file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
   ?>
<html>
  <head>
    <title>Creative Learning Form</title>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="creative learning.css">
  </head>
  <body>
      <form action = "creative learning.php" method="POST" enctype = "multipart/form-data">
        <div class= "form-group">
        <label>Bookstore Name</label>
        <input type = "text" id = "bookstore" name = "bookstore">
        </div>
        <div class= "form-group">
        <label id = "address-label">Address</label>
        <input type = "text" id = "address" name = "address">
        </div>
        <div class = "form-group">
        <input type = "file" name = "image" />
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
         </div>

  </body>
</html>