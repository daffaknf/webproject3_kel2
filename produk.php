
<?php
include 'config.php';

if(isset($_POST['add_barang']))
{
//     function upload_foto()
// {
//     $namaFile = $_FILES['foto']['name'];
//     //   $ukuranFile = $_FILES['foto']['size'];
// //         $error = $_FILES['foto']['error'];
//     $tmpname = $_FILES['foto']['tmp_name'];

//     $extensifileValid = ['jpg', 'jpeg', 'png'];
//     $extensifile = explode('.', $namaFile);
//     $extensifile = strtolower(end($extensifile));

//     // if (!in_array($extensifile, $extensifileValid)) {
//     //     echo "<script>document.location.href='index.php'</script>";
//     //     die();
//     // }
//     move_uploaded_file($tmpname, 'assets/img/' . $namaFile);
//     return $namaFile;
// }
    $idproduk = htmlspecialchars($_POST['idproduk']);
    $nama_produk = htmlspecialchars($_POST['nama_produk']);
    $harga_modal = htmlspecialchars($_POST['harga_modal']);
    $stock = htmlspecialchars($_POST['stock']);
    $harga_jual = htmlspecialchars($_POST['harga_jual']);
    $foto = ($_POST['foto']);
    $tgl_input =($_POST['tgl_input']);
    $userid =($_POST['userid']);
   

    $cekkode = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM produk WHERE idproduk='$idproduk'"));
    if($cekkode > 0) {
        echo '<script>alert("Maaf! kode produk sudah ada");history.go(-1);</script>';
    } else {
    $InputProduk = mysqli_query($conn,"INSERT INTO produk (idproduk,nama_produk,harga_modal,stock,harga_jual,foto,tgl_input,userid)
     values ('$idproduk','$nama_produk','$harga_modal','$stock','$harga_jual','$foto','$tgl_input','$userid')");
    if ($InputProduk){
        echo '<script>history.go(-1);</script>';
    } else {
        echo '<script>alert("Gagal Menambahkan Data");history.go(-1);</script>';
    }
}
};

$query = mysqli_query($conn, "SELECT max(idproduk) as kodeTerbesar FROM produk");
$data = mysqli_fetch_array($query);
$idproduk = $data['kodeTerbesar'];
$urutan = (int) substr($idproduk, 3, 3);
$urutan++;

$idproduk =  sprintf("%03s", $urutan);
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
    <div class="col-md-12 mb-2">
    <div class="row">

    <!-- barang -->
    
        <div class="card">
        <div class="card-header bg-purple  text-center">
            <div class="row ">
                <div class="card-tittle text-white col "><i class="fa fa-shopping-cart "></i> <b>Tambah Barang</b></div>
                <div class="col col-lg-2 text-white'"><a href="index.php" class="link-warning text-decoration-none fw-bold ms-2"><i class='bx bx-arrow-back'>  Keluar</i></a></div>
            </div>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label><b>Kode Barang</b></label>
                        <input type="text" name="idproduk" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Nama Barang</b></label>
                        <input type="text" name="nama_produk" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Harga Modal</b></label>
                        <input type="number" name="harga_modal" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>stock</b></label>
                        <input type="number" name="stock" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Harga Jual</b></label>
                        <input type="number" name="harga_jual" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Foto Produk</b></label>
                        <input type="file" name="foto" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Useri ID</b></label>
                        <input type="number" name="userid" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Tanggal Input</b></label>
                            <div class="input-group">
                                <input type="text" name="tgl_input" class="form-control" value="<?php echo  date("j F Y, G:i");?>" readonly>
                                <div class="input-group-append">
                                    <button name="add_barang" value="simpan" class="btn btn-purple" type="submit">
                                    <i class="fa fa-plus mr-2"></i>Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <!-- end barang -->


    <!-- table barang -->
    <div class="col-md-12 mb-1">
        <div class="card">
        <div class="card-header bg-purple">
                <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Barang</b></div>
            </div>
            <div class="card-body">
            <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_barang" width="100%">
                        <thead class="thead-purple">
                            <tr>
                                <th>No</th>
                                <th>Id Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Modal</th>
                                <th>Stock</th>
                                <th>Harga Jual</th>
                                <th>Foto</th>
                                <th>Tanggal Input</th>
                                <th>User ID</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $data_barang = mysqli_query($conn,"select * from produk");
                        while($d = mysqli_fetch_array($data_barang)){
                            ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['idproduk']; ?></td>
                            <td><?php echo $d['nama_produk']; ?></td>
                            <td><?php echo $d['harga_modal']; ?></td>
                            <td><?php echo $d['stock']; ?></td>
                            <td><?php echo $d['harga_jual']; ?></td>
                            <td><?php echo $d['foto']; ?></td>
                            <td><?php echo $d['tgl_input']; ?></td>
                            <td><?php echo $d['userid']; ?></td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="edit.php?id=<?php echo $d['idproduk']; ?>">
                                <i class="fa fa-pen fa-xs"></i> Edit</a>
                                <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['idproduk']; ?>" 
                                onclick="javascript:return confirm('Hapus Data Barang ?');">
                                <i class="fa fa-trash fa-xs"></i> Hapus</a>
                            </td>
						</tr>
                        <?php }?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end table barang -->

    </div><!-- end row col-md-9 -->
  </div>
  </body>
  </html>
  <?php 
	include 'config.php';
	if(!empty($_GET['id'])){
		$id= $_GET['id'];
		$hapus_data = mysqli_query($conn, "DELETE FROM produk WHERE idproduk ='$id'");
		echo '<script>window.location="produk.php"</script>';
	}

?>

