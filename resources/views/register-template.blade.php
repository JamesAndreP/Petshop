<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="register">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/logo1.png" alt="IMG">
				</div>
                <div class="registration_form">
                    @yield('content')
                </div>
			</div>
		</div>
	</div>
    <script>
        document.getElementById("submit_button").disabled = true; 
        var password_valid = false
        function submitHandler() {
            if(this.password_valid) {
                document.getElementById("registration_form").submit(); 
            }
        }

        function checkSamePassword() {
            var password = document.getElementById('password').value
            var confirm_password = document.getElementById('confirm_password').value
            if(password) {
                if(password == confirm_password) {
                    password_valid = true
                    document.getElementById("submit_button").disabled = false; 
                    document.getElementById('password_error').innerHTML = ''
                } else {
                    password_valid = false
                    document.getElementById("submit_button").disabled = true; 
                    document.getElementById('password_error').innerHTML = 'Password did not match'
                }
            }
        }
    </script>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>