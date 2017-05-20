<?php
session_start();
include_once '../Lib/const.class.php';
if(isset($_POST['submitBtn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($username) && !empty($password)){
        require '../Apps/config/config.php';
        $admin = $upperlink->prepare("SELECT * FROM admin ORDER BY ID");
        $admin->execute();
        $adminuser = $admin->fetch();
        if($adminuser){
            $_SESSION['username'] = $adminuser['Username'];
            $_SESSION['password'] = $adminuser['Password'];
        } else {
           $message = "<font color='red'>Incorrect username and password</font>"; 
        }
        $upperlink = null;
    } else {
       $message = "<font color='red'>Please enter your name and password</font>"; 
    }
   
}
if (isset($_SESSION['username']) && isset($_SESSION['password'])){?>
 <!DOCTYPE html>
<html>
    <head>
        <title>Adio Consultants</title>
        <meta charset="UTF-8"/>
        <meta  charset="keyword" content="">
    </head>
    <body>
        <h1>Welcome to your admin panel <a href="logout.php">Logout</a></h1>
        
        <table>
            <th>
            <td>Firstname</td>
            <td>Surname</td>
            <td>Email</td>
            <td>Phone Number</td>
            <td>Image</td>
            <td>Verification</td>
            </th>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        
    </body>
</html>

<?php } else { ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adio Consultants</title>
        <meta charset="UTF-8"/>
        <meta  charset="keyword" content="">
    </head>
    <body>
        <h1>Login as admin</h1>
        <span><?php global $message; echo $message;?></span>
        <form action="index.php" method="post" enctype="multipart/form-data" class="FormWrap">
            <input type="text" placeholder="FirstName" name="username" class="inputfeeds"> 
            <br>
            <input type="password" placeholder="password" name="password" class="inputfeeds"> 
            <br>
            <input type="submit" value="Login" name="submitBtn" class="submitBtn"> 
        </form>
    </body>
</html>
<?php }?>
