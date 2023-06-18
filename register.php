<?php
require_once('function2.php');

 ?>
<!doctype html>
<html lang="en" >

<head>

    <meta charset="utf-8" />
    <title> Register </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style"  rel="stylesheet" type="text/css" />

</head>

<body>
   
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20"> Register</h5>
                                
                            
                            </div>
                        </div>
                        <div class="card-body pt-5">

                            <div class="p-2">
 <?php 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $rror = [
        'username' => '',
        'email' => '',
        'firstname' => '',
        'lastname' => '',
        'password' => '',
    ];  

    if (strlen($username) < 4) {
        $rror['username'] = 'username cant be less than four';
    }

    if ($username == '') {
        $rror['username'] = 'username cant be empty';
    }

    if (strlen($email) < 4) {
        $rror['email'] = 'email cant be less than four';
    }

    if (strlen($password) < 6) {
        $rror['password'] = 'password cant be less than six';
    }

    foreach ($rror as $key => $value) {
        // Perform actions for each error
    }

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

    if ($username == '' || empty($username)) {
        echo "this field cant be empty";
    } elseif (strlen($username) < 4) {
        $rror['username'] = 'username cant be less than four';
    } else {
        $query = "INSERT INTO user(username, email, password, phone) ";
        $query .= "VALUES('$username', '$email', '$password', '$phone')";
        header("Location: login.php");

        $add_pro = mysqli_query($connection, $query);
        if (!$add_pro) {
               echo '<script>alert(" Registered successfully!");</script>';
        } else {
            die('Query failed' . mysqli_error($connection));
        
        }
    }
}
?>

        <form class="form-horizontal" action="" method="post">
             <div class="mb-3">
             <label class="form-label" for="useremail">Email</label>
   <input type="email" class="form-control" name="email" id="useremail"
                                            placeholder="Enter email">
                                    </div>
                                    <div class="mb-3">
  <label class="form-label" for="username">Username</label>     
  <input type="text" class="form-control" name="username" id="username"
                                            placeholder="Enter username">
                                    </div>
                                     <div class="mb-3">
<label class="form-label" for="username">Phone</label>
<input type="text" class="form-control" name="phone" id="username"
                                            placeholder="Enter phone">
                                    </div>

                                    <div class="mb-3">
            <label class="form-label" for="userpassword">Password</label>
    <input type="password" class="form-control" name="password" id="userpassword"
                                            placeholder="Enter password">
                                    </div>

                                    <div class="mt-4">
<button class="btn btn-primary w-100 waves-effect waves-light"
    type="submit" value="submit" name="submit">Register</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to the Skote <a href="#"
                                                class="text-primary">Terms of Use</a></p>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Already have an account ? <a href="pages-login.html" class="fw-medium text-primary">
                                Login</a> </p>
                        <p>©
                            <script>document.write(new Date().getFullYear())</script> Qovex. Crafted with <i
                                class="mdi mdi-heart text-danger"></i> by Themesbrand
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <!-- JAVASCRIPT -->
    <?=scripts();?>

</body>

</html>