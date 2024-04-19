<?php
require '../../utils/App.php';
require '../../database/Database.php';
class Auth extends App
{
     public function __construct()
     {
          parent::__construct();
     }

     public function register()
     {
          $name = $_POST['name'];
          $email = $_POST['email'];
          $phone = $_POST['mobile'];
          $password = $_POST['password'];
          $confirm = $_POST['confirm-password'];
          $response = [
               'status' => null,
               'data' => [],
               'message' => null,
               'error' => null
          ];

          $sql_email = "SELECT * FROM user WHERE email='" . $email . "'";
          //Check email
          $execute = Database::getInstance()->execute($sql_email);
          $result = mysqli_fetch_assoc($execute);

          if ($result !== null) {
               $response['status'] = 'fail';
               $response['message'] = 'Email đã tồn tại!';
               return $this->renderJSON($response);
          };

          if ($password !== $confirm) {
               $response['status'] = 'fail';
               $response['message'] = 'Mật khẩu không khớp!';
               return $this->renderJSON($response);
          };

          $sql_insert = "INSERT INTO user (name,email,mobile,password,role_id,is_active)
          values ('$name','$email','$phone','$password',2,1)";

          try {
               $execute = Database::getInstance()->execute($sql_insert);
               $response['status'] = 'success';
               $response['message'] = 'Đăng ký thành công!';
               return $this->renderJSON($response);
          } catch (Exception $e) {
               $response['status'] = 'fail';
               $response['message'] = 'Đã xảy ra lỗi ';
               $response['error'] = $e->getMessage();
               return $this->renderJSON($response);
          }
          return $this->renderJSON($execute);
     }
}

$auth = new Auth();
