<?php
session_start();

require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');
require_once('process-register.php');

$user = getUserToken();
if ($user != null) {
	header('Location: ../');
	die();
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Đăng Ký</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="https://gokisoft.com/uploads/2021/03/s-568-ico-web.jpg" />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<style>
		.error-message {
			color: red;
			font-size: 0.8rem;
			font-style: italic;
			margin-left: 1rem;
			margin-bottom: 0.5rem;
		}

		.panel {
			box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
		}

		.label-wrap {
			margin: 0;
		}
	</style>
</head>

<body>
	<div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
		<div class="panel panel-primary w-50 p-5 pt-3 pb-3">
			<div class="panel-heading">
				<h2 class="text-center text-success">Đăng Ký Tài Khoản</h2>
				<h5 style="color: red;" class="text-center"><?= $msg ?></h5>
			</div>
			<div class="panel-body">
				<form method="post" onsubmit="submitForm(event)" id="register-form">
					<div class="form-group">
						<div class="d-flex align-items-center">
							<label for="name">Họ và tên:</label>
							<div id="error-name" class="error-message"></div>
						</div>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<div class="d-flex align-items-center">
							<label for="email">Email:</label>
							<div id="error-email" class="error-message"></div>
						</div>
						<input type="email" onchange="checkEmail()" class="form-control" id="email" name="email" value="<?= $email ?>">

					</div>
					<div class="form-group">
						<div class="d-flex align-items-center">
							<label for="mobile">Số điện thoại:</label>
							<div id="error-phone" class="error-message"></div>
						</div>
						<input type="tel" onchange="checkPhoneNumber()" class="form-control" id="mobile" name="mobile" value="<?= $mobile ?>">

					</div>
					<div class="form-group">
						<div class="d-flex align-items-center">
							<label for="password">Mật Khẩu:</label>
							<div id="error-password" class="error-message"></div>
						</div>
						<input type="password" class="form-control" id="password" name="password" minlength="6">
					</div>
					<div class="form-group">
						<div class="d-flex align-items-center">
							<label for="confirmation_pwd">Xác Minh Mật Khẩu:</label>
							<div id="error-confirm" class="error-message"></div>
						</div>
						<input type="password" class="form-control" id="confirm-password" name="confirm-password" minlength="6">
					</div>
					<p class="d-flex align-items-center justify-content-center">
						<a href="login.php">Tôi đã có tài khoản</a>
					</p>
					<div class="d-flex align-items-center justify-content-center">
						<button class="btn btn-success w-50">Đăng Ký</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		//Init global variable
		let arrMarkInput = {
			name: false,
			email: false
		}

		let inputName = $('#name');
		let inputEmail = $('#email');
		let inputPhone = $('#mobile');
		let inputPassword = $('#password');
		let inputConfirmPassword = $('#confirm-password');

		function validateFullName() {
			if (isValidFullName(inputName.val())) {
				$('#error-name').empty();
			} else {
				$('#error-name').html('* Tên không được để trống!');
			}
		}

		function validateEmail() {
			if (isValidEmail(inputEmail.val())) {
				$('#error-email').empty();
			} else {
				$('#error-email').html('* Vui lòng điền đúng định dạng email!');
			}
		}

		function validatePhone() {
			if (isValidPhoneNumber(inputPhone.val())) {
				$('#error-phone').empty();
			} else {
				$('#error-phone').html('* Vui lòng điền đúng định dạng SĐT!');
			}
		}

		function validatePassword() {
			if (isValidPassword(inputPassword.val())) {
				$('#error-password').empty();
			} else {
				$('#error-password').html('* Mật khẩu phải lớn hơn 6 ký tự');
			};

			if (isValidConfirmPassword(event.target.value, inputConfirmPassword.val())) {
				$('#error-confirm').empty();
			} else {
				$('#error-confirm').html('* Mật khẩu không khớp');
			}
		}

		function validateConfirmPassword() {
			if (isValidConfirmPassword(event.target.value, inputPassword.val())) {
				$('#error-confirm').empty();
			} else {
				$('#error-confirm').html('* Mật khẩu không khớp');
			}
		}

		function validateForm() {
			$password = $('#password').val();
			$confirmPwd = $('#confirmation_pwd').val();
			if ($password != $confirmPwd) {
				alert("Mật khẩu không khớp, vui lòng kiểm tra lại")
				return false
			}
			return true
		}

		function isValidFullName(name) {
			return name.length > 0;
		}

		function isValidEmail(email) {
			return /^[^\.\s][\w\-]+(\.[\w\-]+)*@([\w-]+\.)+[\w-]{2,}$/gm.test(email);
		}

		function isValidPhoneNumber(phoneNumber) {
			return /(84|0[3|5|7|8|9])+([0-9]{8})\b/g.test(phoneNumber);
		}

		function isValidPassword(password) {
			return password.length > 6;
		}

		function isValidConfirmPassword(password, confirm) {
			return password === confirm;
		}

		const isValidForm = () => {
			return isValidFullName(inputName.val()) &&
				isValidEmail(inputEmail.val()) &&
				isValidPhoneNumber(inputPhone.val()) &&
				isValidPassword(inputPassword.val()) &&
				isValidConfirmPassword(inputConfirmPassword.val())
		}

		function submitForm(event) {
			event.preventDefault();
			validateFullName();
			validateEmail();
			validatePhone();
			validatePassword();
			validateConfirmPassword();

			// if (!isValidForm()) {
			// 	return;
			// }

			//Ajax submit form
			const dataForm = $('#register-form').serialize();
			console.log(dataForm);
			console.log($('#register-form').serializeArray());

			$.post('auth.php/register', dataForm, (response) => {
				console.log(response);
			});
		}

		$(document).ready(function() {
			inputName.on('input', validateFullName);
			inputEmail.on('input', validateEmail);
			inputPhone.on('input', validatePhone);
			inputPassword.on('input', validatePassword);
			inputConfirmPassword.on('input', validateConfirmPassword);
		});
	</script>
</body>

</html>