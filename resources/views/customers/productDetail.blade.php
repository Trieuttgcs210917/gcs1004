<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>TechnologyStore Online</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../css/style1.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!-- body -->

<body>

    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    @if (Session::has('customerEmail'))
                                        <li class="nav-item"><a class="nav-link" href="#">Welcome:
                                                {{ Session::get('customerName') }}</a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ url('customers/logout') }}">Logout</a></li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" href='{{ url('admin/login') }}'>Admin Panel</a>
                                        </li>
                                        <li class="nav-item d_none">
                                            <a class="nav-link" href='{{ url('customers/login') }}'>Login</a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" href='{{ url('customers/index') }}'>Home</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href='{{ url('customers/products') }}'>Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">About</a>
                                    </li>
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="#"><i class="fa fa-search"
                                                aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->

    <!-- banner -->
    <!-- end banner -->

    <!-- three_box -->
    <!-- three_box -->

    <!-- products -->
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Detail</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="our_products">
                        <div class="row">
                            @foreach ($product as $products)
                                <div class="col-md-4">
                                    <div class="product_box">
                                        <a href="{{ url('customers/productDetail/' . $products->productID) }}"><img
                                                src="../pro_img/{{ $products->productImage }}" width="100%"
                                                style="border: 1px solid #666;"></a>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <h2>{{ $products->productName }}</h2>
                                    <h2>Category: {{ $products->catName }}</h2>
                                    <h2>Price: {{ $products->productPrice }} VND</h2>
                                    <h2>Description:</h2>
                                    <p class="description-content">
                                        {{ $products->productDetails }}Honorificabilitudinitatibus
                                        califragilisticexpialidocious
                                        Taumatawhakatangihangakoauauotamateaturipukakapikimaungahoronukupokaiwhenuakitanatahu
                                        次の単語グレートブリテンおよび北アイルランド連合王国で本当に大きな言葉</p>
                                    <a class="read_more" href="#">Add to cart</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products -->
    <!-- laptop  section -->
    <div class="laptop">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="titlepage">
                        <p>Every Computer and laptop</p>
                        <h2>Up to 40% off !</h2>
                        <a class="read_more" href="#">Shop Now</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="laptop_box">
                        <figure><img src="../images/pc.png" alt="#" /></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end laptop  section -->

    <!-- customer -->
    <!-- end customer -->

    <!--  contact -->
    <!-- end contact -->

    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <img class="logo1" src="../images/logo1.png" alt="#" />
                        <ul class="social_icon">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <h3>About Us</h3>
                        <ul class="about_us">
                            <li>dolor sit amet, consectetur<br> magna aliqua. Ut enim ad <br>minim veniam, <br>
                                quisdotempor incididunt r</li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <h3>Contact Us</h3>
                        <ul class="conta">
                            <li>dolor sit amet,<br> consectetur <br>magna aliqua.<br> quisdotempor <br>incididunt ut e
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <form class="bottom_form">
                            <h3>Newsletter</h3>
                            <input class="enter" placeholder="Enter your email" type="text"
                                name="Enter your email">
                            <button class="sub_btn">subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html
                                    Templates</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html>
