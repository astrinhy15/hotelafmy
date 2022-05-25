<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/beranda/image/favicon.png" type="/beranda/image/png">
    <title>Hotel Afmy</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/beranda/css/bootstrap.css">
    <link rel="stylesheet" href="/beranda/vendors/linericon/style.css">
    <link rel="stylesheet" href="/beranda/ss/font-awesome.min.css">
    <link rel="stylesheet" href="/beranda/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/beranda/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/beranda/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="/beranda/vendors/owl-carousel/owl.carousel.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="/beranda/css/style.css">
    <link rel="stylesheet" href="/beranda/css/responsive.css">
</head>

<body>
    <!--================Header Area =================-->
    <header class="header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="/beranda/image/Logo-2.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a href="<?= site_url(); ?>" class="nav-link text-uppercase font-weight-bold js-scroll-trigger">Home</a></li>
                        <!--<ul class="dropdown-menu">
                            
                            <li class="nav-item"><a class="nav-link" href="contact.html">Reservasi</a></li>
                        </ul>-->
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Area =================-->

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background: url('beranda/image/bg2.jpg') no-repeat scroll center 0/cover;"></div>
            <div class="container">
                <div class="banner_content text-center">
                    <!-- <h6>Away from monotonous life</h6> -->
                    <h2>Hotel Afmy</h2>
                    <p>Jika anda menginginkan sebuah kenyaman<br> Disinilah tempatnya</p>

                </div>
            </div>
        </div>

        <!--================Banner Area =================-->

        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Akomodasi Hotel</h2>
                    <p>Kami memiliki beberapa Tipe Kamar yang akan memberikan kenyaman kepada anda</p>
                </div>

                <div class="row mb_30">
                    <?php foreach ($tipe_kamar as $tipe_kamar) : ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="accomodation_item text-center">
                                <div class="card mb-5 mb-xl-0">
                                    <img src="http://localhost:8080/gambar/<?= $tipe_kamar['foto'] ?>" alt="ini adalah gambar" width="500" class="card-img-top">

                                    <a href="#">
                                        <h4 class="sec_h4"><?= $tipe_kamar['nama_tipe_kamar'] ?></h4>
                                    </a>
                                    <h5>Rp. <?= $tipe_kamar['harga'] ?><small>/malam</small></h5>
                                    <h6>
                                        <p><?= $tipe_kamar['deskripsi'] ?>
                                    </h6>
                                    <div class="card-header">
                                        Fasilitas Kamar
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <?php foreach ($tipe_kamar['fasilitas'] as $fasilitaskamar) : ?>
                                            <li class="list-group-item">
                                                <?= $fasilitaskamar['nama_fasilitas'] ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <a href="/pemesanan" class="btn theme_btn button_hover bg-info">Reservasi</a>
                                </div>
                            </div>
                        </div>


                    <?php endforeach ?>

                </div>
            </div>
        </section>
        <!--================ Accomodation Area  =================-->

        <!--================ Facilities Area  =================-->
        <section class="facilities_area section_gap">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
            </div>
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_w">Fasilitas Hotel Afmy</h2>
                    <p>Nikmati fasilitas fasilitas yang telah kami sediakan untuk kenyamanan anda.</p>
                </div>

                <div class="row mb_30">
                    <?php foreach ($fasilitas_hotel as $fasilitas_hotel) : ?>
                        <div class="col-lg-4 col-md-6">
                            <img src="http://localhost:8080/gambar/<?= $fasilitas_hotel['foto'] ?>" alt="ini adalah gambar" width="545" class="card-img-top">
                            <div class="facilities_item">
                                <h4 class="sec_h4"><?= $fasilitas_hotel['nama_fasilitas'] ?></h4>
                                <p><?= $fasilitas_hotel['deskripsi'] ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
        <!--================ Facilities Area  =================-->

        <!-- ================ About History Area  =================
        <section class="about_history_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d_flex align-items-center">
                        <div class="about_content ">
                            <h2 class="title title_color">About Us<br>Our History<br>Mission & Vision</h2>
                            <p>perilaku yang tidak pantas sering ditertawakan sebagai "anak laki-laki akan menjadi anak laki-laki," wanita menghadapi standar perilaku yang lebih tinggi terutama di tempat kerja. Itulah mengapa sangat penting bahwa, sebagai wanita, perilaku kita di tempat kerja tidak tercela. perilaku yang tidak pantas sering ditertawakan.</p>
                            <a href="#" class="button_hover theme_btn_two">Request Custom Price</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="/beranda/image/hotelbg.jpg" alt="img">
                    </div>
                </div>
            </div>
        </section>
        <!--================ About History Area  =================-->

        <!--================ Testimonial Area  =================-->
        <!-- <section class="testimonial_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Testimonial from our Clients</h2>
                    <p>Testimoni dari para pelanggan Hotel Afmy</p>
                </div>
                <div class="testimonial_slider owl-carousel">
                    <div class="media testimonial_item">
                        <img class="rounded-circle" src="/beranda/image/testtimonial-1.jpg" alt="">
                        <div class="media-body">
                            <p>most important thing for a hotel is comfort, after I tried the afmy hotel, it turned out that the type of room and its facilities were very adequate so that it made me comfortable. Hotel afmy is perfect for those who are on their honeymoon or traveling. </p>
                            <a href="#">
                                <h4 class="sec_h1">Astri Afmy</h4>
                            </a>
                            <div class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="media testimonial_item">
                        <!--    <img class="rounded-circle" src="/beranda/image/testtimonial-1.jpg" alt="">-->
        <!-- <div class="media-body">
                            <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                            <a href="#">
                                <h4 class="sec_h4">Nur handayani</h4>
                            </a>
                            <div class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="media testimonial_item"> -->
        <!--   <img class="rounded-circle" src="/beranda/image/testtimonial-1.jpg" alt="">-->
        <!-- <div class="media-body">
                            <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                            <a href="#">
                                <h4 class="sec_h4">Fanny Spencer</h4>
                            </a>
                            <div class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="media testimonial_item">
                           <img class="rounded-circle" src="/beranda/image/testtimonial-1.jpg" alt="">-->
        <!-- <div class="media-body">
                            <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                            <a href="#">
                                <h4 class="sec_h4">Afgan</h4>
                            </a>
                            <div class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--================ Testimonial Area  =================-->

        <!--================ Latest Blog Area  =================-->
        <!-- <section class="latest_blog_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">latest posts from blog</h2>
                    <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
                </div>
                <div class="row mb_30">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="/beranda/image/blog/blog-1.jpg" alt="post">
                            </div>
                            <div class="details">
                                <div class="tags">
                                    <a href="#" class="button_hover tag_btn">Travel</a>
                                    <a href="#" class="button_hover tag_btn">Life Style</a>
                                </div>
                                <a href="#">
                                    <h4 class="sec_h4">Low Cost Advertising</h4>
                                </a>
                                <p>Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.</p>
                                <h6 class="date title_color">31st January,2018</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="/beranda/image/blog/blog-2.jpg" alt="post">
                            </div>
                            <div class="details">
                                <div class="tags">
                                    <a href="#" class="button_hover tag_btn">Travel</a>
                                    <a href="#" class="button_hover tag_btn">Life Style</a>
                                </div>
                                <a href="#">
                                    <h4 class="sec_h4">Creative Outdoor Ads</h4>
                                </a>
                                <p>Self-doubt and fear interfere with our ability to achieve or set goals. Self-doubt and fear are</p>
                                <h6 class="date title_color">31st January,2018</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="/beranda/image/blog/blog-3.jpg" alt="post">
                            </div>
                            <div class="details">
                                <div class="tags">
                                    <a href="#" class="button_hover tag_btn">Travel</a>
                                    <a href="#" class="button_hover tag_btn">Life Style</a>
                                </div>
                                <a href="#">
                                    <h4 class="sec_h4">It S Classified How To Utilize Free</h4>
                                </a>
                                <p>Why do you want to motivate yourself? Actually, just answering that question fully can </p>
                                <h6 class="date title_color">31st January,2018</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--================ Recent Area  =================-->

        <!-- ================ start footer Area  =================	
        <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About Agency</h6>
                            <p>The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Navigation Links</h6>
                            <div class="row">
                                <div class="col-4">
                                    <ul class="list_style">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Feature</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Portfolio</a></li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <ul class="list_style">
                                        <li><a href="#">Team</a></li>
                                        <li><a href="#">Pricing</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>										
                            </div>							
                        </div>
                    </div>							 -->
        <!-- <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-footer-widget">
                <h6 class="footer_title">Newsletter</h6>
                <p>For business professionals caught between high OEM price and mediocre print and graphic output, </p>
                <div id="mc_embed_signup">
                    <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                        <div class="input-group d-flex flex-row">
                            <!-- <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email"> -->
        <!-- <button class="btn sub-btn"><span class="lnr lnr-location"></span></button>
        </div>
        <div class="mt-10 info"></div>
        </form>
        </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-footer-widget instafeed">
                <h6 class="footer_title">InstaFeed</h6>
                <ul class="list_style instafeed d-flex flex-wrap">
                    <li><img src="/beranda/image/instagram/Image-01.jpg" alt=""></li>
                    <li><img src="/beranda/image/instagram/Image-02.jpg" alt=""></li>
                    <li><img src="/beranda/image/instagram/Image-03.jpg" alt=""></li>
                    <li><img src="/beranda/image/instagram/Image-04.jpg" alt=""></li>
                    <li><img src="/beranda/image/instagram/Image-05.jpg" alt=""></li>
                    <li><img src="/beranda/image/instagram/Image-06.jpg" alt=""></li>
                    <li><img src="/beranda/image/instagram/Image-07.jpg" alt=""></li>
                    <li><img src="/beranda/image/instagram/Image-08.jpg" alt=""></li>
                </ul>
            </div>
        </div>
        </div>
        <div class="border_line"></div>
        <div class="row footer-bottom d-flex justify-content-between align-items-center"> -->
        <!-- <p class="col-lg-8 col-sm-12 footer-text m-0"> --> -->
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>
            document.write(new Date().getFullYear());
        </script> All rights reserved | Afmy's Hotel <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Afmy's Hotel</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
        <div class="col-lg-4 col-sm-12 footer-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-behance"></i></a>
        </div>
        </div>
        </div>
        </footer>
        <!--================ End footer Area  =================-->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="/beranda/js/jquery-3.2.1.min.js"></script>
        <script src="/beranda/js/popper.js"></script>
        <script src="/beranda/js/bootstrap.min.js"></script>
        <script src="/beranda/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="/beranda/js/jquery.ajaxchimp.min.js"></script>
        <script src="/beranda/js/mail-script.js"></script>
        <script src="/beranda/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="/beranda/vendors/nice-select/js/jquery.nice-select.js"></script>
        <script src="/beranda/js/mail-script.js"></script>
        <script src="/beranda/js/stellar.js"></script>
        <script src="/beranda/vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="/beranda/js/custom.js"></script>
</body>

</html>