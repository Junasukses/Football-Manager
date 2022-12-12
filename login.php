<?php

session_start();
require 'functions.php';

if(isset($_SESSION['LOGIN'])){
    if ($_SESSION['LOGIN'] == true) {
        
        echo "
        <script>
            document.location.href ='overview.php';
        </script>
        ";	
    }
}


if ( isset($_POST["login"]) ){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $data = mysqli_query($conn, "SELECT * FROM akun WHERE EMAIL = '$username' AND PASSWORD_USER= '$password'");

    $cek_user = mysqli_num_rows($data);

    if ($cek_user > 0) {
        $n = mysqli_fetch_array($data);

        
        $_SESSION['LOGIN'] = true;
        $_SESSION['ID_AKUN'] = $n['ID_AKUN'];
        
        echo "
        <script>
            document.location.href ='overview.php';
        </script>
        ";	


        
        // // nasabah
        // $id_n = $n['ID_AKUN'];
        // $id_R = $n['ID_ROLE'];
        // $nama_n = $n['NAMA'];
        // $username_n = $n['USERNAME'];
        // $no_telp = $n['NO_TELP'];
        // $cek_user = mysqli_num_rows($data);
    } else {
        echo "
        <script>
        alert('Maaf username dan password tidak valid!');
        document.location.href ='login.php';
        </script>
        ";
    }
    
    // if ($username == "" || $password == "") {
    //     echo "
    //     <script>
    //         alert('Username dan Password tidak boleh kosong!');
    //         document.location.href ='login.php';
    //     </script>
    //     ";
    // }
    // else if ($cek_user > 0) {
    // $_SESSION['ID_AKUN'] = $id_n;
    // $_SESSION['ID_ROLE'] = $id_r;
    // $_SESSION['NAMA'] = $nama_n;
    // $_SESSION['USERNAME'] = $username_n;
    // $_SESSION['NO_TELP'] = $no_telp;
    // $_SESSION['EMAIL'] = $username;
    // $_SESSION['PASSWORD'] = $password;
    // $_SESSION["login"] = true;
     
    // if ( isset($_POST['remember']) ){
    //     //buat cookie
    //     setcookie('login', 'true', time()+60);
    // }
    // echo "
    // <script>
    //     alert('Selamat Anda berhasil login!');
    //     document.location.href ='overview.php';
    // </script>
    // ";	
    // }

    // else {
    // echo "
    // <script>
    // alert('Maaf username dan password tidak valid!');
    // document.location.href ='login.php';
    // </script>
    // ";
    // }
}

  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="username" type="email" placeholder="name@example.com" />
                                                <label for="username">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                                <label for="password">Password</label>
                                            </div>
                                            <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="remember" type="checkbox" value="" />
                                                <label class="form-check-label" for="remember">Remember Password</label>
                                            </div> -->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.php">Forgot Password?</a> -->
                                                <button type="submit" name="login" class="btn-login mt-3 me-2" style="width: 100%;">LOGIN</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
