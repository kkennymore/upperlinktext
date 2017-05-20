<?php
include_once 'Lib/const.class.php';
if(isset($_POST['submitBtn'])){
    $fname = AdioSanitizeFunc($_POST['fname']);
    $sname = AdioSanitizeFunc($_POST['sname']);
    $email = AdioSanitizeFunc($_POST['email']);
    $mobile = AdioSanitizeFunc($_POST['phone']);
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $image_type = $_FILES['image']['type'];
    $ext = '.jpg';
    if(!empty($fname)){
        if(!empty($sname)){
            if(!empty($email)){
                if(!empty($mobile)){
                    if($image){
                            if(emailRegularExpression($email)){
                                require 'Apps/config/config.php';
                                $users = $upperlink->prepare("SELECT * FROM application ORDER BY ID");
                                $users->execute();
                                $applicatioMax = $users->RowCount();
                                if($applicatioMax < '4'){
                                     $upload = move_uploaded_file($tmp_image,'Images/Uploads/'.$image);
                                  if($upload){
                                      $UserRg = $upperlink->prepare("INSERT INTO application(FirstName,SurName,PhoneNumber,Email,Image,Timestamp)VALUES(?,?,?,?,?,?)");
                                      $UserRg->bindValue(1, AdioEncrypt($fname, $key));
                                      $UserRg->bindValue(2,AdioEncrypt($sname, $key));
                                      $UserRg->bindValue(3,AdioEncrypt($mobile, $key));
                                      $UserRg->bindValue(4,AdioEncrypt($email, $key));
                                      $UserRg->bindValue(5,AdioEncrypt($image, $key));
                                      $UserRg->bindValue(6, time());
                                      $UserRg->execute();
                                      if($UserRg){
                                         $message = "<font color='green'>Application successful</font>";  
                                      } else {
                                          $message = "<font color='red'>Ooop!! Application unseccussful</font>";
                                      }
                                      
                                  } else {
                                    $message = "<font color='red'>Ooop!! Error uploading image please try again</font>";   
                                  } 
                                } else {
                                   $message = "<font color='red'>Sorry application closed</font>"; 
                                }
                                }else{
                                    $message = "<font color='red'>invalid file type, please upload a .jpg file only</font>"; 
                                }
                    } else {
                      $message = "<font color='red'>please select photograph to upload</font>";   
                    }
                } else {
                   $message = "<font color='red'>Please enter mobile number</font>";  
                }
            } else {
              $message = "<font color='red'>Please enter email</font>";   
            }
        } else {
           $message = "<font color='red'>Please enter surname</font>";  
        }
    } else {
       $message = "<font color='red'>Please enter firstname</font>"; 
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adio Consultants</title>
        <meta charset="UTF-8"/>
        <meta  charset="keyword" content="">
    </head>
    <body>
        <h1>Welcome</h1>
        <span><?php global $message; echo $message;?></span>
        <form action="home" method="post" enctype="multipart/form-data" class="FormWrap">
            <input type="text" placeholder="FirstName" name="fname" class="inputfeeds"> 
            <br>
            <input type="text" placeholder="SurName" name="sname" class="inputfeeds"> 
            <br>
            <input type="number" placeholder="Mobile Number" name="phone" class="inputfeeds"> 
            <br>
            <input type="email" placeholder="Email" name="email" class="inputfeeds"> 
            <br>
            <label>Upload your passport photograph in jpg format only</label>
            <input type="file" name="image"> 
            <br>
            <input type="submit" value="Apply" name="submitBtn" class="submitBtn"> 
        </form>
    </body>
</html>
