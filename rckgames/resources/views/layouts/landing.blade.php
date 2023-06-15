<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>RCKgames</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" >
    <link rel="stylesheet" href="{{asset('css/canvas_carousels.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/canvas_style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/business.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css" />
    
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top bb-solid-bnw py-0 px-3 mx-0">
            <div class="row col-lg-2 col-md-4 col-sm-4 col-4 be-solid-bnw">
                <a class="navbar-brand text-center" href="{{ route('projects.index') }}">
                    <img  id="navbarLogo" src="{{asset('img/RCK_Logo.svg')}}" alt="RCK Logo" height="77" width="77"/>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->routeIs('home.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('home.index')}}">{{__('general.nav_index')}}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('home.services') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('home.services')}}">{{__('general.nav_services')}}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('home.projects') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('home.projects')}}">{{__('general.nav_projects')}}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('home.clients') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('home.clients')}}">{{__('general.nav_clients')}}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('home.us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('home.us')}}">{{__('general.nav_us')}}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('home.contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('home.contact')}}">{{__('general.nav_contact')}}</a>
                    </li>
                </ul>
            </div>
    </nav>
    <div class="pt-nav">
        @yield('content')
    <div>
    <footer>
        <div class="container py-5 text-center">
            <img id="" src="{{asset('img/RCK_LOGO_Black.png')}}" alt="RCK Logo" class="" height="77" width="77"/>
            <p class="">{{$texts->firstWhere('textname', 'footer_text')['description'];}}</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script> 
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
