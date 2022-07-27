<?php 
 include '../core/init.php';
 //post value
    $firstName = ((isset($_POST['firstName']) && $_POST['firstName'] != '')?sanitize($_POST['firstName']):'');
    $lastName = ((isset($_POST['lastName']) && $_POST['lastName'] != '')?sanitize($_POST['lastName']):'');
    $email = ((isset($_POST['email']) && $_POST['email'] != '')?sanitize($_POST['email']):'');
    //echo $email;
    $password = ((isset($_POST['password']) && $_POST['password'] != '')?sanitize($_POST['password']):'');
    $Rpassword = ((isset($_POST['Rpassword']) && $_POST['Rpassword'] != '')?sanitize($_POST['Rpassword']):'');
    $privilage = 'Admin';
    $errors = array();
    $displayError = '';
    $re = array();
// validation rules
    if($_POST){
        if(empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($Rpassword)){
            $errors[] = 'Please Fill All....';
        }
        if($email =! '' && !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Email address is not correct...";
        }
        /*if(strlen($password) < 7 ){
            $errors[] = "Password must not be less than 7.";
        }
        if($Rpassword !== $password){
            $errors[] = "Password does not match.";
        }*/
        if(!empty($errors)){
			$displayError = displayErrors($errors);
        }else{
        $sql = "INSERT INTO `users`(`userPassword`, `userFirstName`, `userLastName`, `email`, `privilege`) VALUES ('$password','$firstName','$lastName','$email','$privilage')";
        $conn->query($sql);
        echo $email;
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin GDP  - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <span class="error"><?=$displayError;?></span>
                            <form class="user" method="post" action="register.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="firstName" name="firstName"
                                            placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="lastName" name="lastName"
                                            placeholder="Last Name" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="inputEmail" name="email"
                                        placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            id="inputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="Rpassword"
                                            id="repeatPassword" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Register Account">
                                <!--<a href="#" class="btn btn-primary btn-user btn-block" id="submit">
                                    Register Account
                                </a>-->
                                <hr>
                                <!--<a href="index.php" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>-->
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>