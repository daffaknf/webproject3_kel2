<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
  

      $queryid = "SELECT max(userid) as KodeTerbesar FROM login";
$hasil = mysqli_query($conn, $queryid);
   $data = mysqli_fetch_array($hasil);
$userid = $data['kodeTerbesar'];
 
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($userid, 3, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 


	$userid =  sprintf("%03s", $urutan);
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    
    if ($password == $cpassword) {
        $sql = "SELECT * FROM login WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
          
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO login (userid, username, email, password,alamat,telepon)
                    VALUES ('$userid','$username', '$email', '$password','$alamat','$telepon')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
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
    <h4 class="text-center mb-5 ">Register Page</h4>
      <form action="" method="POST" class="login-email">
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Id </label>
                <input type="text"  name="userid" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username </label>
                <input type="text"  name="username" class="form-control" required>
            </div>
           
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email </label>
                <input type="email" placeholder="Masukkan Email Anda" name="email" class="form-control"  required>
            </div>
             <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat </label>
                <input type="text"  name="alamat" class="form-control" required>
            </div>
             <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telepon</label>
                <input type="number"  name="telepon" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                 <input type="password" placeholder="Masukkan Password Anda" name="password" class="form-control"  required >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Cek Password</label>
                 <input type="password" placeholder="Masukkan Password Anda" name="cpassword" class="form-control"  required >
            </div>
            <div class="input-group">
                <button name="submit" class="btn btn-primary w-100">register</button>
            </div>
            <p class="login-register-text">Sudah punya akun? <a href="login.php">Login</a></p>
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
