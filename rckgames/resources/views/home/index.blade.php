<!-- resources/views/home/index.blade.php -->

@extends('layouts.landing')

@section('content')
<section id="dark_nav">
	<section id="index" class="p-0 m-0"></section>
</section>
<section id="light_nav">
	<section id="services" class="row px-0 mx-0 align-items-center">
		<div class="container mw-xl pb-5 px-lg-5 px-md-5 px-sm-4 px-4" style="overflow:hidden">
			<div class="title pb-5"><h1>{{$texts->firstWhere('textname', 'section_services_title')['description'];}}</h1></div>

			<div id="services-lg" class="owl-carousel image-carousel carousel-widget flip-card-wrapper clearfix" data-margin="20" data-nav="true" data-pagi="true" data-items-xs="1" data-items-sm="1" data-items-md="2" data-items-lg="3" data-items-xl="4" style="overflow: visible;">

				<div id="flip-videogame" class="flip-card">
					<div class="flip-card-front bg-white">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-header text-center">
									<div class="col-12 mx-0 px-0">
										<img src="{{asset('assets/icons/videogame.png')}}" class="mx-auto" height="60" width="60" alt="icon">
									</div>
								</div>
								<div class="card-body text-center">
									<div class="col-12 mx-0 px-0">
										<h3 class="card-title text-center mt-3 mb-4">{{__('landing.services.videogame.title')}}</h3>
									</div>
									<span class="card-subtitle">{{__('landing.services.videogame.description')}}</span>
								</div>
							</div>
						</div>
					</div>
					<div class="flip-card-back bg-black no-after">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-body">
									<img src="{{asset('assets/icons/videogame-w.png')}}" class="mx-auto mb-2" height="45" width="45" alt="icon">
									<div class="col-12 mx-0 px-0">
										<h3 class="card-title text-center mt-2 mb-3">{{__('landing.services.videogame.title')}}</h3>
									</div>
									<ul class="mb-2 text-white">
										<li>{{__('landing.services.videogame.desc_1')}}</li>
										<li>{{__('landing.services.videogame.desc_2')}}</li>
										<li>{{__('landing.services.videogame.desc_3')}}</li>
										<li>{{__('landing.services.videogame.desc_4')}}</li>
										<li>{{__('landing.services.videogame.desc_5')}}</li>
										<li>{{__('landing.services.videogame.desc_6')}}</li>
										<li>{{__('landing.services.videogame.desc_7')}}</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="flip-mobile" class="flip-card">
					<div class="flip-card-front bg-white">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-header text-center">
									<div class="col-12 mx-0 px-0 align-self-start">
										<img src="{{asset('assets/icons/mobile.png')}}" class="mx-auto" height="60" width="60" alt="icon">
									</div>
								</div>
								<div class="card-body text-center">
									<div class="col-12 mx-0 px-0">
										<h3 class="card-title text-center mt-3 mb-4">{{__('landing.services.mobile.title')}}</h3>
									</div>
									<span class="card-subtitle">{{__('landing.services.mobile.description')}}</span>
								</div>
							</div>
						</div>
					</div>
					<div class="flip-card-back bg-black no-after">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-body">
									<img src="{{asset('assets/icons/mobile-w.png')}}" class="mx-auto mb-2" height="45" width="45" alt="icon">
									<div class="col-12 mx-0 px-0">
										<h3 class="card-title text-center mt-2 mb-3">{{__('landing.services.mobile.title')}}</h3>
									</div>
									<ul class="mb-2 text-white">
										<li>{{__('landing.services.mobile.desc_1')}}</li>
										<li>{{__('landing.services.mobile.desc_2')}}</li>
										<li>{{__('landing.services.mobile.desc_3')}}</li>
										<li>{{__('landing.services.mobile.desc_4')}}</li>
										<li>{{__('landing.services.mobile.desc_5')}}</li>
										<li>{{__('landing.services.mobile.desc_6')}}</li>
										<li>{{__('landing.services.mobile.desc_7')}}</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="flip-webapp" class="flip-card">
					<div class="flip-card-front bg-white">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-header text-center">
									<div class="col-12 mx-0 px-0">
										<img src="{{asset('assets/icons/webapp.png')}}" class="mx-auto" height="60" width="60" alt="icon">
									</div>
								</div>
								<div class="card-body text-center">
									<div class="col-12 mx-0 px-0">
										<h3 class="card-title text-center mt-3 mb-4">{{__('landing.services.webapp.title')}}</h3>
									</div>
									<span class="card-subtitle">{{__('landing.services.webapp.description')}}</span>
								</div>
							</div>
						</div>
					</div>
					<div class="flip-card-back bg-black no-after">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-body">
									<img src="{{asset('assets/icons/webapp-w.png')}}" class="mx-auto mb-2" height="45" width="45" alt="icon">
									<div class="col-12 mx-0 px-0">
										<h3 class="card-title text-center mt-2 mb-3">{{__('landing.services.webapp.title')}}</h3>
									</div>
									<ul class="mb-2 text-white">
										<li>{{__('landing.services.webapp.desc_1')}}</li>
										<li>{{__('landing.services.webapp.desc_2')}}</li>
										<li>{{__('landing.services.webapp.desc_3')}}</li>
										<li>{{__('landing.services.webapp.desc_4')}}</li>
										<!--li>{{__('landing.services.webapp.desc_5')}}</li-->
										<li>{{__('landing.services.webapp.desc_6')}}</li>
										<li>{{__('landing.services.webapp.desc_7')}}</li>
										<li>{{__('landing.services.webapp.desc_8')}}</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="flip-design" class="flip-card">
					<div class="flip-card-front bg-white">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-header text-center">
									<div class="col-12 mx-0 px-0">
										<img src="{{asset('assets/icons/design.png')}}" class="mx-auto" height="60" width="60" alt="icon">
									</div>
								</div>
								<div class="card-body text-center">
									<div class="col-12 mx-0 px-0">
										<h3 class="card-title text-center mt-3 mb-4">{{__('landing.services.design.title')}}</h3>
									</div>
									<span class="card-subtitle">{{__('landing.services.design.description')}}</span>
								</div>
							</div>
						</div>
					</div>
					<div class="flip-card-back bg-black no-after">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-body">
									<img src="{{asset('assets/icons/design-w.png')}}" class="mx-auto mb-2" height="45" width="45" alt="icon">
									<div class="col-12 mx-0 px-0">
										<h3 class="card-title text-center mt-2 mb-3">{{__('landing.services.design.title')}}</h3>
									</div>
									<ul class="mb-2 text-white">
										<li>{{__('landing.services.design.desc_1')}}</li>
										<li>{{__('landing.services.design.desc_2')}}</li>
										<li>{{__('landing.services.design.desc_3')}}</li>
										<li>{{__('landing.services.design.desc_4')}}</li>
										<li>{{__('landing.services.design.desc_5')}}</li>
										<li>{{__('landing.services.design.desc_6')}}</li>
										<li>{{__('landing.services.design.desc_7')}}</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="flip-ar" class="flip-card">
					<div class="flip-card-front bg-white">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-header text-center">
									<div class="col-12 mx-0 px-0">
										<img src="{{asset('assets/icons/ar.png')}}" class="mx-auto" height="60" width="60" alt="icon">
									</div>
								</div>
								<div class="card-body text-center">
									<div class="col-12 mx-0 px-0">
										<h3 class="card-title text-center mt-3 mb-4">{{__('landing.services.ar.title')}}</h3>
									</div>
									<span class="card-subtitle">{{__('landing.services.ar.description')}}</span>
								</div>
							</div>
						</div>
					</div>
					<div class="flip-card-back bg-black no-after">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-body">
									<img src="{{asset('assets/icons/ar-w.png')}}" class="mx-auto mb-2" height="45" width="45" alt="icon">
									<div class="col-12 mx-0 px-0">
										<h3 class="card-title text-center mt-2 mb-3">{{__('landing.services.ar.title')}}</h3>
									</div>
									<ul class="mb-2 text-white">
										<li>{{__('landing.services.ar.desc_1')}}</li>
										<li>{{__('landing.services.ar.desc_2')}}</li>
										<li>{{__('landing.services.ar.desc_3')}}</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="services-sm">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-6 col-12 p-3">
						<div class="row b-circle m-auto">
							<div class="row px-0 circle m-auto">
								<img src="{{asset('assets/icons/videogame-w.png')}}" class="mx-auto my-auto" alt="icon">
							</div>
						</div>
						<div class="col-12 mx-0 px-0 pt-3">
							<h3 class="text-center my-3">{{__('landing.services.videogame.title')}}</h3>
						</div>
						<ul class="col-lg-12 col-md-12 col-sm-10 col-8 col-xs-12 mx-auto mb-2">
							<li>{{__('landing.services.videogame.desc_1')}}</li>
							<li>{{__('landing.services.videogame.desc_2')}}</li>
							<li>{{__('landing.services.videogame.desc_3')}}</li>
							<li>{{__('landing.services.videogame.desc_4')}}</li>
							<li>{{__('landing.services.videogame.desc_5')}}</li>
							<li>{{__('landing.services.videogame.desc_6')}}</li>
							<li>{{__('landing.services.videogame.desc_7')}}</li>
						</ul>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-12 p-3">
						<div class="row b-circle m-auto">
							<div class="row px-0 circle m-auto">
								<img src="{{asset('assets/icons/mobile-w.png')}}" class="mx-auto my-auto" alt="icon">
							</div>
						</div>
						<div class="col-12 mx-0 px-0 pt-3">
							<h3 class="text-center my-3">{{__('landing.services.mobile.title')}}</h3>
						</div>
						<ul class="col-lg-12 col-md-12 col-sm-10 col-8 col-xs-12 mx-auto mb-2">
							<li>{{__('landing.services.mobile.desc_1')}}</li>
							<li>{{__('landing.services.mobile.desc_2')}}</li>
							<li>{{__('landing.services.mobile.desc_3')}}</li>
							<li>{{__('landing.services.mobile.desc_4')}}</li>
							<li>{{__('landing.services.mobile.desc_5')}}</li>
							<li>{{__('landing.services.mobile.desc_6')}}</li>
							<li>{{__('landing.services.mobile.desc_7')}}</li>
						</ul>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-12 p-3">
						<div class="row b-circle m-auto">
							<div class="row px-0 circle m-auto">
								<img src="{{asset('assets/icons/webapp-w.png')}}" class="mx-auto my-auto" alt="icon">
							</div>
						</div>
						<div class="col-12 mx-0 px-0 pt-3">
							<h3 class="text-center my-3">{{__('landing.services.webapp.title')}}</h3>
						</div>
						<ul class="col-lg-12 col-md-12 col-sm-10 col-8 col-xs-12 mx-auto mb-2">
							<li>{{__('landing.services.webapp.desc_1')}}</li>
							<li>{{__('landing.services.webapp.desc_2')}}</li>
							<li>{{__('landing.services.webapp.desc_3')}}</li>
							<li>{{__('landing.services.webapp.desc_4')}}</li>
							<!--li>{{__('landing.services.webapp.desc_5')}}</li-->
							<li>{{__('landing.services.webapp.desc_6')}}</li>
							<li>{{__('landing.services.webapp.desc_7')}}</li>
							<li>{{__('landing.services.webapp.desc_8')}}</li>
						</ul>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-12 p-3">
						<div class="row b-circle m-auto">
							<div class="row px-0 circle m-auto">
								<img src="{{asset('assets/icons/design-w.png')}}" class="mx-auto my-auto" alt="icon">
							</div>
						</div>
						<div class="col-12 mx-0 px-0 pt-3">
							<h3 class="text-center my-3">{{__('landing.services.design.title')}}</h3>
						</div>
						<ul class="col-lg-10 col-md-10 col-sm-8 col-6 col-xs-10 mx-auto mb-2">
							<li>{{__('landing.services.design.desc_1')}}</li>
							<li>{{__('landing.services.design.desc_2')}}</li>
							<li>{{__('landing.services.design.desc_3')}}</li>
							<li>{{__('landing.services.design.desc_4')}}</li>
							<li>{{__('landing.services.design.desc_5')}}</li>
							<li>{{__('landing.services.design.desc_6')}}</li>
							<li>{{__('landing.services.design.desc_7')}}</li>
						</ul>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-12 p-3">
						<div class="row b-circle m-auto">
							<div class="row px-0 circle m-auto">
								<img src="{{asset('assets/icons/ar-w.png')}}" class="mx-auto my-auto" alt="icon">
							</div>
						</div>
						<div class="col-12 mx-0 px-0 pt-3">
							<h3 class="text-center my-3">{{__('landing.services.ar.title')}}</h3>
						</div>
						<ul class="col-lg-12 col-md-12 col-sm-10 col-8 col-xs-12 mx-auto mb-2">
							<li>{{__('landing.services.ar.desc_1')}}</li>
							<li>{{__('landing.services.ar.desc_2')}}</li>
							<li>{{__('landing.services.ar.desc_3')}}</li>
						</ul>
					</div>
				</div>
			</div>


		</div>
	</section>

	<section id="projects">
		<div class="title py-5 bg_white"><h1>{{$texts->firstWhere('textname', 'section_projects_title')['description'];}}</h1></div>
		<div id="project-filters" class="row mx-0 px-0">
			<div class="grid-filter-wrap">
				<ul class="grid-filter style-2 mx-auto" data-container="#portfolio">
					<li class="activeFilter"><a href="#" data-filter="*">Todo</a></li>
				@foreach ($swTypes as $swType)
					<li><a href="#" data-filter="{{'.'.str_replace(' ','_',$swType->name)}}">{{$swType->name}}</a></li>
				@endforeach
				</ul>
			</div>
		</div>
		<div id="portfolio" class="portfolio row grid-container mx-0 px-0 g-0">
		@foreach ($projects as $project)
			<article class="portfolio-item col-lg-3 col-md-4 col-sm-4 col-6 p-0 {{$project->tags}}">
				<div class="grid-inner">
					<a href="{{ route('projects.showp', $project) }}" target="_blank">
						<img src="{{asset($project->banner_img_url) }}" alt="Banner Image" class="w-100 h-100">
					</a>
					<a href="{{ route('projects.showp', $project) }}" target="_blank">
						<div class="bg-overlay">
							<div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
								<div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">

								</div>
							</div>
							<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
						</div>
					</a>
					<!--div class="bg-overlay">
						<div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
							<div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
								<h3><a href="{{ route('projects.showp', $project) }}" target="_blank">{{$project->name}}</a></h3>
							</div>
						</div>
						<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
					</div-->
				</div>
			</article>

		@endforeach
		</div>
	</section>

	<section id="clients">
		<div class="title py-5 bg-white"><h3>{{$texts->firstWhere('textname', 'section_clients_title')['description'];}}</h3></div>
		<div class="row mx-0 px-0">
			<div class="section m-0" style="">
				<div id="oc-clients-full" class="owl-carousel owl-carousel-full image-carousel carousel-widget owl-loaded owl-drag"
				data-margin="0" data-nav="false" data-pagi="false" data-loop="true" data-autoplay="3000" data-items-xs="2"
				data-items-sm="3" data-items-md="5" data-items-lg="5" data-items-xl="5">
					<div class="owl-stage-outer">
						<div class="owl-stage" style="transform: translate3d(-1738px, 0px, 0px); transition: all 0.25s ease 0s; width: 5215px;">

						@foreach ($clients as $client)
							<div class="owl-item" style="width: 347.6px;">
								<div class="oc-item">
									<a href="#">
										<img src="{{asset($client->img_url) }}" class="client-img mx-auto" width="320" height="220" alt="Brands">
									</a>
								</div>
							</div>
						@endforeach

						</div>
					</div>
					<div class="owl-nav disabled">
						<button type="button" role="presentation" class="owl-prev"><i class="uil uil-angle-left-b"></i></button>
						<button type="button" role="presentation" class="owl-next"><i class="uil uil-angle-right-b"></i></button>
					</div>
					<div class="owl-dots disabled"></div>
				</div>
			</div>
		</div>
	</section>

	<section id="us" class="row px-0 mx-0 align-items-center">
		<div class="container mw-lg p-5">
			<div class="title pb-5"><h1>{{$texts->firstWhere('textname', 'section_us_title')['description'];}}</h1></div>
			<p class="py-2 text">{{$texts->firstWhere('textname', 'us_text_1')['description'];}}</p>
			<p class="py-5 quote">{{$texts->firstWhere('textname', 'us_catchphrase')['description'];}}</p>
			<p class="pt-2 text">{{$texts->firstWhere('textname', 'us_text_2')['description'];}}</p>
		</div>
	</section>
</section>
<section id="contact" class="row px-0 mx-0 align-items-center">
	<div class="container mw-lg py-5 ">
		<div class="title pb-5 text-center"><h1>{{$texts->firstWhere('textname', 'section_contact_title')['description'];}}</h1></div>
		<div class="row mx-0 px-0 justify-content-center mt-3">
			<div class="col-lg-5 col-md-5 col-sm-12 col-12 ms-auto px-5 py-lg-0 py-sm-3 py-xs-3 be-solid-white">
				<img class="icon-contact" src="{{asset('assets/icons/Headphones@1x.png')}}" height="32" width="35"/>
				<p class="subtitle mt-5">{{$texts->firstWhere('textname', 'contact_us_title')['description'];}}</p>
				<p class="text">{{$texts->firstWhere('textname', 'contact_us_text')['description'];}}</p>
				<div class="row mt-4">
					<p class="text">{{$texts->firstWhere('textname', 'contact_email')['description'];}}</p>
				</div>
			</div>
			<div id="social-media" class="col-lg-6 col-md-6 col-sm-12 col-12 px-5 py-lg-0 py-sm-3 py-xs-3">
				<img class="icon-contact" src="{{asset('assets/icons/World@1x.png')}}" height="35" width="35"/>
				<p class="subtitle mt-5">{{$texts->firstWhere('textname', 'social_net_title')['description'];}}</p>
				<p class="text">{{$texts->firstWhere('textname', 'social_net_text')['description'];}}</p>
				<div  class="row mt-5">
					<div class="col-1 me-3 my-auto">
						<a href="{{$info->firstWhere('fieldname', 'facebook')['value'];}}" target=”_blank”>
							<img class="icon-social" src="{{asset($info->firstWhere('fieldname', 'facebook')['img_url']);}}" height="42" width="42"/>
						</a>
					</div>
					<div class="col-1 mx-3 my-auto">
						<a href="{{$info->firstWhere('fieldname', 'twitter')['value'];}}" target=”_blank”>
							<img class="icon-social-b" src="{{asset($info->firstWhere('fieldname', 'twitter')['img_url']);}}" height="35" width="43"/>
						</a>
					</div>
					<div class="col-1 mx-3 my-auto">
						<a href="{{$info->firstWhere('fieldname', 'instagram')['value'];}}" target=”_blank”>
							<img class="icon-social" src="{{asset($info->firstWhere('fieldname', 'instagram')['img_url']);}}" height="42" width="42"/>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
