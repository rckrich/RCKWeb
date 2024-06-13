<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7FT8Q8K748"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-7FT8Q8K748');
    </script>

    <title>RCK</title>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="RCK Games" />
    <meta name="description" content="Desarrollo de software creativo – IA – Videojuegos – Realidad Aumentada – NFT – Realidad Virtual">

    <link rel="icon" href="lti-icon.png"> <!-- PONER NOMBRE DE LA IMAGEN LA CUAL DEBE ESTAR LA CARPETA RAIZ -->

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@rckgames" />
    <meta name="twitter:title" content="RCK" />
    <meta name="twitter:description" content="Desarrollo de software creativo – IA – Videojuegos – Realidad Aumentada – NFT – Realidad Virtual" />
    <meta name="twitter:image" content="{{asset('assets/icons/rck-icono.png')}}" />

    <meta property="og:title" content="RCK" />
    <meta property="og:description" content="Desarrollo de software creativo – IA – Videojuegos – Realidad Aumentada – NFT – Realidad Virtual" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://rckgames.com" />
    <meta property="og:image" content="{{asset('assets/img/rck-Image-Socials.jpg')}}" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/appHome.css')}}" type="text/css" >
    <link rel="stylesheet" href="{{asset('css/canvas_carousels.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/canvas_style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/business.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top bb-solid-bnw py-0 px-0 mx-0">
        <div class="row mx-0 col-lg-2 col-md-4 col-sm-4 col-4 be-solid-bnw">
            @if(Auth::check())
            <a class="navbar-brand text-center" href="{{ route('home.index') }}">
                <img  id="navbarLogo" src="{{asset('assets/img/Wordmark_Negro.png')}}" alt="RCK Logo" height="77" />
            </a>
            @else
            <a class="navbar-brand text-center" href="{{ route('home.index') }}">
                <img  id="navbarLogo" src="{{asset('assets/img/Wordmark_Negro.png')}}" alt="RCK Logo" height="77" />
            </a>
            @endif
        </div>
        <button id="OpenMenu" class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li id="nav_index" class="nav-item {{ request()->routeIs('home.index') ? 'active' : '' }}">
                    <a class="nav-link link link-10" href="{{route('home.index')}}">{{__('general.nav_index')}}</a>
                </li>
                <li id="nav_services" class="nav-item {{ request()->routeIs('home.services') ? 'active' : '' }}">
                    <a class="nav-link link link-10" href="{{route('home.services')}}">{{__('general.nav_services')}}</a>
                </li>
                <li id="nav_projects" class="nav-item {{ request()->routeIs('home.projects') ? 'active' : '' }}">
                    <a class="nav-link link link-10" href="{{route('home.projects')}}">{{__('general.nav_projects')}}</a>
                </li>
                <li id="nav_clients" class="nav-item {{ request()->routeIs('home.clients') ? 'active' : '' }}">
                    <a class="nav-link link link-10" href="{{route('home.clients')}}">{{__('general.nav_clients')}}</a>
                </li>
                <li id="nav_us" class="nav-item {{ request()->routeIs('home.us') ? 'active' : '' }}">
                    <a class="nav-link link link-10" href="{{route('home.us')}}">{{__('general.nav_us')}}</a>
                </li>
                <li id="nav_contact" class="nav-item {{ request()->routeIs('home.contact') ? 'active' : '' }}">
                    <a class="nav-link link link-10" href="{{route('home.contact')}}">{{__('general.nav_contact')}}</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="pt-nav">
        @yield('content')
    <div>
    <footer>
        <div class="p-5 text-center">
            <div class="row mx-0 px-0">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 offset-lg-4 align-self-center py-2">
                    <img id="footer-logo" src="{{asset('assets/img/Wordmark_Negro.png')}}" alt="RCK Logo" class="" height="77" width="77"/>

                    <p class="my-auto">{{$texts->firstWhere('textname', 'footer_text')['description'];}}</p>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 align-self-center py-2">
                    <div class="row my-auto pe-50">
                        <div class="col-lg-1 col me-3 ms-auto my-auto">
                            <a href="{{$info->firstWhere('fieldname', 'facebook')['value'];}}" target=”_blank”>
                                <img class="icon-social" src="{{asset($info->firstWhere('fieldname', 'facebook')['image_url'])}}" height="42" width="42"/>
                            </a>
                        </div>
                        <div class="col-lg-1 col mx-3 my-auto">
                            <a href="{{$info->firstWhere('fieldname', 'twitter')['value'];}}" target=”_blank”>
                                <img class="icon-social-b" src="{{asset($info->firstWhere('fieldname', 'twitter')['image_url'])}}" height="35" width="43"/>
                            </a>
                        </div>
                        <div class="col-lg-1 col mx-3 my-auto">
                            <a href="{{$info->firstWhere('fieldname', 'instagram')['value'];}}" target=”_blank”>
                                <img class="icon-social" src="{{asset($info->firstWhere('fieldname', 'instagram')['image_url'])}}" height="42" width="42"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('js/appHome.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
    <script src="{{asset('js/plugins.min.js')}}"></script>
    <script>
		jQuery(window).on( 'pluginCarouselReady', function(){
			$('#oc-features').owlCarousel({
				items: 1,
				margin: 60,
			    nav: true,
			    navText: ['<i class="icon-line-arrow-left"></i>','<i class="icon-line-arrow-right"></i>'],
			    dots: false,
			    stagePadding: 30,
			    responsive:{
					768: { items: 2 },
					1200: { stagePadding: 200 }
				},
			});
		});
	</script>
</body>
</html>
