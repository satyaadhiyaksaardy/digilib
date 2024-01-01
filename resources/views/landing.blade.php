<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Digital Library of All Knowledge.">
    <script src="{{ asset('HTWF/scripts/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/bootstrap/css/bootstrap.css') }}">
    <script src="{{ asset('HTWF/scripts/script.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('HTWF/style.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/css/content-box.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/css/image-box.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/flexslider/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/php/contact-form.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/social.stream.css') }}">
    <link rel="icon" href="{{ asset('images/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/skin.css') }}">
</head>

<body>
    <div id="preloader"></div>
    <header class="fixed-top scroll-change" data-menu-anima="fade-bottom">
        <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
            <div class="navbar navbar-main">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="index.html">
                            <img class="logo-default" src="{{ asset('images/logo-black.png') }}" alt="logo" />
                            <img class="logo-retina" src="{{ asset('images/logo-retina-black.png') }}"
                                alt="logo" />
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <div class="nav navbar-nav navbar-right">
                            <ul class="nav navbar-nav">
                                @auth
                                    <li class="active">
                                        <a href="{{ url('/books') }}" role="button">Dashboard</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('login') }}" role="button">Masuk</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}" role="button">Daftar</a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="section-bg-image bg-top white" style="background-image:url({{ asset('images/hd-8.jpg') }})">
        <div class="container content">
            <hr class="space" />
            <hr class="space m" />
            <div class="row">
                <div class="col-md-8 col-center text-center">
                    <h1>Temukan <b>10.000+</b> buku digital untuk pengetahuan bangsa</h1>
                </div>
            </div>
            <hr class="space" />
            <hr class="space" />
            <hr class="space" />
            <hr class="space" />
            <hr class="space" />
        </div>
    </div>
    <div class="section-empty">
        <div class="container content">
            <hr class="space" />
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="img-box lightbox inner shadow-1" href="#">
                        <span><img src="{{ asset('images/gallery/image-9.jpg') }}" alt=""
                                draggable="false"></span>
                        <span class="caption-box">
                            <span class="caption">
                                Einstein percaya bahwa kekayaan sejati terletak dalam pengetahuan dan
                                pemahaman, bukan dalam harta material. Dia sering mengungkapkan penghargaannya terhadap
                                buku dan perpustakaan sebagai alat utama untuk memperoleh dan memperluas pengetahuan.
                            </span>
                        </span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <hr class="space m visible-sm" />
                    <p class="block-quote quote-1 no-margins">
                        The only thing that you absolutely have to know is the location of the library.
                        <span class="quote-author">Albert Einstein</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
    <footer class="footer-base">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 footer-center text-left">
                        <img width="120" src="{{ asset('images/logo.png') }}" alt="" />
                    </div>
                    <div class="col-md-6 footer-left text-left">
                        <p>Sleman, Yogyakarta, Indonesia.</p>
                        <div class="tag-row">
                            <span>satyaadhiyaksa@gmail.com</span>
                            <span><a target="_blank" href="https://wa.me/6285701710446">+62 857 0171 0446</a></span>
                        </div>
                    </div>
                    <div class="col-md-3 footer-left text-right text-left-sm">
                        <div class="btn-group social-group btn-group-icons">
                            <a target="_blank" href="https://www.instagram.com/satyaadhiyaksa"
                                data-social="share-instagram">
                                <i class="fa fa-instagram text-xs circle"></i>
                            </a>
                            <a target="_blank" href="https://www.linkedin.com/in/satyaadhiyaksa/"
                                data-social="share-linkedin">
                                <i class="fa fa-linkedin text-xs circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row copy-row">
                <div class="col-md-12 copy-text">
                    © {{ date('Y') }} DigiLib <span> <a href="http://me.satyaadhiyaksa.com/">Satya Adhiyaksa
                            Ardy</a></span>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="{{ asset('HTWF/scripts/font-awesome/css/font-awesome.css') }}">
        <script async src="{{ asset('HTWF/scripts/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('HTWF/scripts/imagesloaded.min.js') }}"></script>
        <script src="{{ asset('HTWF/scripts/parallax.min.js') }}"></script>
        <script src="{{ asset('HTWF/scripts/flexslider/jquery.flexslider-min.js') }}"></script>
        <script async src="{{ asset('HTWF/scripts/isotope.min.js') }}"></script>
        <script async src="{{ asset('HTWF/scripts/php/contact-form.js') }}"></script>
        <script async src="{{ asset('HTWF/scripts/jquery.progress-counter.js') }}"></script>
        <script async src="{{ asset('HTWF/scripts/jquery.tab-accordion.js') }}"></script>
        <script async src="{{ asset('HTWF/scripts/bootstrap/js/bootstrap.popover.min.js') }}"></script>
        <script async src="{{ asset('HTWF/scripts/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('HTWF/scripts/social.stream.min.js') }}"></script>
        <script src="{{ asset('HTWF/scripts/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('HTWF/scripts/smooth.scroll.min.js') }}"></script>
    </footer>
</body>

</html>
