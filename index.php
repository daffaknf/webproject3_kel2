<?php 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        body{
            width: 100%;
            height: 750px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            background-color: grey;
        }
        .box{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            background-color:whitesmoke;
            border-radius: 5px;
            padding: 20px 10px;
        }
        .contentForm{
            margin: 8%;
        }
        .form-control{
            border-color: grey;
            border-style: solid;
            border-width: 0 0 1px 0;
        }
        .form-control:focus{
            border-width: 0 0 3px 0;
            color: #929082;
            box-shadow: none;
            transition: all 0.1s ease-out;
        }
        .btn {
            border-radius: 20px;
        }
        img{
            margin-right: 40px;
        }
     
    </style>
</head>
  <body>
    <div class="container">
        <div class="box">
            <div class="row contentForm">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <img data-aos="fade-in" data-aos-duration="1500"
    data-aos-easing="ease-in-out" src="assets/logo_ratna.png" alt="" class="img-fluid">
                </div>
                
                <div class="col-sm-12 col-md-6 col-lg-6">
    <h4 class="text-center mb-5 ">Login Page</h4>
      <form action="" method="POST" class="login-email">
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email </label>
                <input type="email" placeholder="Masukkan Email Anda" name="email" class="form-control" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                
                 <input type="password" placeholder="Masukkan Password Anda" name="password" class="form-control" value="<?php echo $_POST['password']; ?>" required >
            </div>
            <div class="input-group">
                <button name="submit" class="btn btn-primary w-100">Login</button>
            </div>
            <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
        </form>
    
    </div>
    </div>
    </div>
    </div>


    
            
         
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
