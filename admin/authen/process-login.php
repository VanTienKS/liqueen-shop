<?php
$fullname=$email=$msg='';
require_once('../../database/dbhelper.php');

if(!empty($_POST))
{
    
    $email=getPOST('email');
    $password=getPOST('password');
  //  $pwd= getSecuritymd5    ($pwd);
   
  
   
    $userExist= executeResult("select * from user where email='$email' and password = '$password' and is_active=1",true);
    if($userExist == null)
    {   
        $msg='Đăng nhập không thành công';
    }else{
         $token = getSecuritymd5($userExist['$email'].time());
         setcookie('token',$token,time()+7*24*60*60,'/');
         $created_at = date('Y-m-d H:i:s');
         $userID= $userExist['id'];
         $_SESSION['user']=$userExist;
        $sql="insert into token (user_id,token,created_at) values ('$user_id','$token','$created_at')";
        execute($sql);
        
   
       header('Location: ../');
        die();
    }
   
}

