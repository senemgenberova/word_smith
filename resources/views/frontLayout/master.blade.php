<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Wordsmith</title>
    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('/front/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/main.css')}}">

    <!-- script
    ================================================== -->
    <script src="{{asset('front/js/modernizr.js')}}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header header">

        <div class="header__logo">
            <a class="logo" href="{{ route('home') }}">
                <img src="{{ asset('/front/images/logo.svg') }} " alt="Homepage">
            </a>
        </div> <!-- end header__logo -->

        <!-- header__search -->
<!--         <a class="header__search-trigger" href="#0"></a>
        <div class="header__search">

            <form role="search" method="get" class="header__search-form" action="#">
                <label>
                    <span class="hide-content">Search for:</span>
                    <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>

            <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

        </div>   -->

        <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
        <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6">Navigate to</h2>

            <ul class="header__nav">
                <li class="{{ strlen(url()->current()) == 21 ? 'current' : ''}}  @include('frontLayout.current',['route_name' => 'home'])"><a href="{{ route('home') }}" title="">Home</a></li>
                <li class="has-children @include('frontLayout.current',['route_name' => 'category'])">
                    <a href="#0" title="">Categories</a>
                    <ul class="sub-menu">
                        @foreach($categories as $c)
                            @if($c->posts->count() != 0)
                                <li>
                                    <a class="to-capital" href="{{ route('category', $c) }}">{{ $c->category_name }}</a>
                                </li>
                            @endif
                            
                        @endforeach
                    </ul>
                </li>
                <li class="@include('frontLayout.current',['route_name' => 'about'])">
                        <a href="{{ route('about') }}" title="">About</a>
                </li>

                <li class="@include('frontLayout.current',['route_name' => 'contact'])">
                    <a href="{{ route('contact') }}" title="">Contact</a>
                </li>
            </ul> <!-- end header__nav -->

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

        </nav> <!-- end header__nav-wrap -->

    </header> <!-- s-header -->


    @yield('content')


    <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row">

            <div class="col-eight md-six tab-full popular">
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">
                    @foreach($popular_posts as $post)
                        <article class="col-block popular__post">
                            <a href="{{ route('single_post',$post) }}" class="popular__thumb">
                                <img src="{{ asset('/upload/post/' . $post->image) }}" alt="">
                            </a>
                            <a href="{{ route('single_post',$post) }}">
                                <h5>{{ $post->title }}</h5>
                            </a>
                            <section class="popular__meta">
                                <span class="popular__author"><span>By</span> <span class="black">{{ $post->user->name }}</span></span>
                                <span class="popular__date"><span>on</span> {{ $post->updated_at->format("F d, Y") }}</span>
                            </section>
                        </article>
                    @endforeach
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->

            <div class="col-three md-six tab-full end">
                <div class="row">
                    <div class="col-seven md-six mob-full categories">
                        <h3 class="mb-25">Categories</h3>
        
                        <ul class="linklist">
                            @foreach($categories as $c)
                                @if($c->posts->count() != 0)
                                    <li>
                                        <a class="to-capital" href="{{ route('category', $c) }}">{{ $c->category_name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div> 
        
                </div>
            </div>
        </div> <!-- end row -->

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-six tab-full s-footer__about">
                        
                    <h4>About Wordsmith</h4>

                    <p>{{ isset($firstAbout->content) ? $firstAbout->content : '' }}</p>

                </div> <!-- end s-footer__about -->

                <div class="col-six tab-full s-footer__subscribe">
                        
                    <h4>Our Newsletter</h4>

                    <p>In order to get informed from our new posts, subscribe!</p>

                    <div class="subscribe">
                        <form action="{{ route('subscribe') }}"  method="post" id="sub-form" class="group"  autocomplete="on">
                            
                            {{ csrf_field() }}
                            <input type="email" name="email" class="email" id="email"  placeholder="Email Address" required>
                
                            <input type="submit" name="subscribe" value="Subscribe">
                
                            @if(Session::has('success'))
                                <label for="email" class="subscribe-message">{{ Session::get('success') }}</label>

                            @elseif(Session::has('fail'))
                                <label for="email" class="subscribe-message">{{ Session::get('fail') }}</label>

                            @endif
                
                        </form>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">

                <div class="col-six">
                    <ul class="footer-social">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="col-six">
                    <div class="s-footer__copyright">
                        <span>
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
                        </span>
                    </div>
                </div>
                
            </div>
        </div> <!-- end s-footer__bottom -->

        <div class="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>

    </footer> <!-- end s-footer -->


    <!-- Java Script
    ================================================== -->
    <script src="{{ asset('/front/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('/front/js/plugins.js') }}"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->
    <script src="{{ asset('/front/js/main.js') }}"></script>
    <script src="{{ asset('/front/js/cookie.js') }}"></script>
    

    @yield('js')

</body>

</html>