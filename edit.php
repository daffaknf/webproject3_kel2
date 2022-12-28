  <div class="col-md-9 mb-2">
    <div class="row">

    <!-- barang -->
    <div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $id = $_POST['idproduk'];
    $nama = $_POST['nama_produk'];
    $harga_modal = $_POST['harga_modal'];
    $stock = $_POST['stock'];
    $harga_jual = $_POST['harga_jual'];
    $foto = $_POST['foto'];
  
    
   

    $result = mysqli_query($conn, "UPDATE produk SET nama_produk='$nama',harga_modal='$harga_modal',stock = '$stock', harga_jual= '$harga_jual', foto = '$foto' WHERE idproduk=$id");
    if(!$result){
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>NOOO!</strong> data gagal di update.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
        ";
        } else{
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>YESSS!</strong> data berhasil di update.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div> ";
 header('Location: produk.php');
        }
}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk=$id");
while($data = mysqli_fetch_array($result))
{
    $idb = $data['idproduk'];
    $nama = $data['nama_produk'];
    $harga_modal = $data['harga_modal'];
    $stock = $data['stock'];
    $harga_jual = $data['harga_jual'];
    $foto = $data['foto'];
    $tgl = $data['tgl_input'];
}
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
     <div class="card">
        <div class="card-header bg-purple">
                <div class="card-tittle text-white"><i class="fa fa-shopping-cart"></i> <b>Tambah produk</b></div>
            </div>
            <div class="card-body">
            
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <input type="hidden" name="idproduk" value="<?php echo $_GET['id'] ?>">
                        <label><b>Id produk</b></label>
                        <input type="text" class="form-control" value="<?php echo $idb ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Nama produk</b></label>
                        <input type="text" name="nama_produk" class="form-control" value="<?php echo $nama; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Harga Modal</b></label>
                        <input type="number" name="harga_modal" class="form-control" value="<?php echo $harga_modal; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Stock</b></label>
                        <input type="number" name="stock" class="form-control" value="<?php echo $stock; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Harga Jual</b></label>
                        <input type="number" name="harga_jual" class="form-control" value="<?php echo $harga_jual; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Foto</b></label>
                        <input type="text" name="foto" class="form-control" value="<?php echo $foto; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Tanggal Input</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?php echo $tgl; ?>" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-purple ml-3" name="update" type="submit">
                                    <i class="fa fa-check mr-2"></i>Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end produk -->

    </div><!-- end row col-md-9 -->
  </div>


  </body>
  </html>
