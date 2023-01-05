<?php include 'config.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil</title>
    
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <!-- HEADER START -->
    <header class="bg-secondary shadow sticky-top">
        
        <div class="container d-flex flex-wrap justify-content-between py-2 text-light">
            Selamat datang di halaman profil...

            <div>
             <b>Ratna Staionary</b>
                <a href="dashboard.php" class="link-warning text-decoration-none fw-bold ms-2"><i class='bx bx-arrow-back'>  Keluar</i></a>
            </div>

        </div>

    </header>
    <!-- HEADER END -->

    <!-- CONTENT START -->
    <section>
        
        <!-- .container start -->
        <div class="container py-5">
            
            <!-- .row start -->
            <div class="row">

                <!-- .col start -->
                <div class="col-lg-4">

                    <div class="card text-center p-5">

                        <div class="card-body">

                            <img src="assets/logo_ratna.png" alt="Profil Picture" class="img img-thumbnail rounded-circle w-50">

                            <h2>Ratna Stationary</h2>

                            <p class="card-text text-muted">
                                Sebuah toko alat tulis (ATK)
                            </p>

                            <button class="btn btn-secondary btn-sm">
                                <i class="fa-solid fa-pencil me-1"></i> Ubah Profil
                            </button>

                        </div>

                    </div>

                </div>
                <!-- .col end -->

                <!-- .col start -->
                <div class="col-lg-8">
                    
                    <div class="shadow border rounded p-5 mb-5">
                        <h2>Tentang Kami</h2>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quasi itaque, perferendis, placeat provident quas debitis odio harum ipsam eaque deleniti numquam vero modi inventore.</p>

                    </div>

                    <div class="shadow border rounded p-5 mb-5">
                        <h2>Informasi Kontak</h2>

                        <!-- .row start -->
                        <div class="row">

                            <!-- .col start -->
                            <div class="col-lg-6">

                                <p class="card-text">
                                    <span class="text-muted mb-1 d-block">Alamat :</span>
                                    
                                    <i class="fa-solid fa-map me-2 text-secondary"></i>

                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, provident!
                                </p> <!-- alamat end -->

                                <p class="card-text">
                                    <span class="text-muted mb-1 d-block">Alamat Email</span>

                                    <i class="fa-solid fa-envelope me-2 text-secondary"></i> daffaknf@gmail.com

                                </p> <!-- alamat email end -->

                                <p class="card-text">
                                    <span class="text-muted mb-1 d-block">Nomor Telepon</span>
                                    <i class="fa-solid fa-phone me-2 text-secondary"></i> +62 8210055-8191
                                </p> <!-- nomor telepon end -->

                                <!-- <p class="card-text">
                                    <span class="text-muted mb-1 d-block">Alamat Website</span>
                                    
                                    <a href="https://nokensoft.com" target="_blank" class="text-decoration-none link-secondary">
                                        <i class="fa-solid fa-globe me-2 text-secondary"></i> www.nokensoft.com
                                    </a>
                                    
                                </p> alamat website end -->

                            </div>
                            <!-- .col end -->

                            <!-- .col start -->
                            <div class="col-lg-6">

                                <div>
                                    Ikuti saya di :
                                </div>

                                <a href="https://github.com/daffaknf" target="_blank" class="text-decoration-none link-secondary fs-2">
                                    <i class="fa-brands fa-github"></i>
                                </a>

                                <a href="https://www.instagram.com/harun.alrosyid.9237/" target="_blank" class="text-decoration-none link-secondary fs-2">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>

                                

                            </div>
                            <!-- .col end -->

                        </div>
                        <!-- .row end -->

                    </div>
                    
                </div>
                <!-- .col end -->

            </div>
            <!-- .row end -->

        </div>
        <!-- .container end -->

    </section>
    <!-- CONTENT END -->

    <!-- FOOTER START -->
    
    <!-- FOOTER END -->
    
</body>
</html>
