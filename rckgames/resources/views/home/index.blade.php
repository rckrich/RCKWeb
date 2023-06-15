<!-- resources/views/home/index.blade.php -->

@extends('layouts.landing')

@section('content')
<section id="dark_nav">
	<section id="index" class="p-0 m-0"></section>
</section>
<section id="light_nav">
	<section id="services" class="row px-0 mx-0 align-items-center">
		<div class="container mw-xl pb-5">
			<div class="title pb-5"><h1>{{$texts->firstWhere('textname', 'section_services_title')['description'];}}</h1></div>

			<div class="owl-carousel image-carousel carousel-widget flip-card-wrapper clearfix" data-margin="20" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="1" data-items-md="2" data-items-lg="3" data-items-xl="4" style="overflow: visible;">

				<div class="flip-card">
					<div class="flip-card-front bg-white">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-header text-center">
									<div class="col-12 mx-0 px-0">
										<img src="{{asset('icons/videogame.png')}}" class="mx-auto" height="60" width="60" alt="icon">
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
									<img src="{{asset('icons/videogame-w.png')}}" class="mx-auto mb-2" height="45" width="45" alt="icon">
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
				<div class="flip-card">
					<div class="flip-card-front bg-white">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-header text-center">
									<div class="col-12 mx-0 px-0 align-self-start">										
										<img src="{{asset('icons/mobile.png')}}" class="mx-auto" height="60" width="60" alt="icon">
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
									<img src="{{asset('icons/mobile-w.png')}}" class="mx-auto mb-2" height="45" width="45" alt="icon">
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
				<div class="flip-card">
					<div class="flip-card-front bg-white">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-header text-center">
									<div class="col-12 mx-0 px-0">										
										<img src="{{asset('icons/webapp.png')}}" class="mx-auto" height="60" width="60" alt="icon">
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
									<img src="{{asset('icons/webapp-w.png')}}" class="mx-auto mb-2" height="45" width="45" alt="icon">
									<ul class="mb-2 text-white">
										<li>{{__('landing.services.webapp.desc_1')}}</li>
										<li>{{__('landing.services.webapp.desc_2')}}</li>
										<li>{{__('landing.services.webapp.desc_3')}}</li>
										<li>{{__('landing.services.webapp.desc_4')}}</li>
										<li>{{__('landing.services.webapp.desc_5')}}</li>
										<li>{{__('landing.services.webapp.desc_6')}}</li>
										<li>{{__('landing.services.webapp.desc_7')}}</li>
										<li>{{__('landing.services.webapp.desc_8')}}</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="flip-card">
					<div class="flip-card-front bg-white">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-header text-center">
									<div class="col-12 mx-0 px-0">										
										<img src="{{asset('icons/design.png')}}" class="mx-auto" height="60" width="60" alt="icon">
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
									<img src="{{asset('icons/design-w.png')}}" class="mx-auto mb-2" height="45" width="45" alt="icon">
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
				<div class="flip-card">
					<div class="flip-card-front bg-white">
						<div class="flip-card-inner">
							<div class="card bg-transparent border-0">
								<div class="card-header text-center">
									<div class="col-12 mx-0 px-0">										
										<img src="{{asset('icons/ar.png')}}" class="mx-auto" height="60" width="60" alt="icon">
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
									<img src="{{asset('icons/ar-w.png')}}" class="mx-auto mb-2" height="45" width="45" alt="icon">
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
	
		</div>
	</section>

	<section id="projects">
		<div class="title py-5 bg_white"><h1>{{$texts->firstWhere('textname', 'section_projects_title')['description'];}}</h1></div>
		<div class="row mx-0 px-0">
		@foreach ($projects as $project)
			<div class="col-lg-3 col-md-4 col-sm-4 col-6 p-0">
				<a href="{{ route('projects.showp', $project) }}">
					<img src="{{asset($project->banner_img_url) }}" alt="Banner Image" class="w-100 h-100"> 
				</a>
			</div>                  
		@endforeach
		</div>
	</section>

	<section id="clients">
		<div class="title py-5 bg-white"><h3>{{$texts->firstWhere('textname', 'section_clients_title')['description'];}}</h3></div>
		<div class="row mx-0 px-0">
			<div class="section m-0" style="padding: 80px 0">
				<div id="oc-clients-full" class="owl-carousel owl-carousel-full image-carousel carousel-widget owl-loaded owl-drag" 
				data-margin="0" data-nav="false" data-pagi="false" data-loop="true" data-autoplay="3000" data-items-xs="2" 
				data-items-sm="3" data-items-md="5" data-items-lg="5" data-items-xl="5">
					<div class="owl-stage-outer">
						<div class="owl-stage" style="transform: translate3d(-1738px, 0px, 0px); transition: all 0.25s ease 0s; width: 5215px;">
							
						@foreach ($clients as $client)
							<div class="owl-item" style="width: 347.6px;">
								<div class="oc-item">
									<a href="#">
										<img src="{{asset($client->img_url) }}" class="mx-auto w-100" alt="Brands">
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
		<div class="container mw-lg py-5">
			<div class="title pb-5"><h1>{{$texts->firstWhere('textname', 'section_us_title')['description'];}}</h1></div>
			<p class="py-2 text">{{$texts->firstWhere('textname', 'us_text_1')['description'];}}</p>
			<p class="py-5 quote">{{$texts->firstWhere('textname', 'us_catchphrase')['description'];}}</p>
			<p class="pt-2 text">{{$texts->firstWhere('textname', 'us_text_2')['description'];}}</p>
		</div>
	</section>
</section>
<section id="contact" class="row px-0 mx-0 align-items-center">
	<div class="container mw-lg py-lg-5">
		<div class="title py-5 text-center"><h1>{{$texts->firstWhere('textname', 'section_contact_title')['description'];}}</h1></div>
		<div class="row mx-0 px-0 justify-content-center mt-3">
			<div class="col-lg-5 col-md-5 col-sm-12 col-12 ms-auto px-5 py-lg-0 be-solid-white">
				<img class="" src="{{asset('icons/Headphones@1x.png')}}" height="32" width="35"/>
				<p class="subtitle mt-5">{{$texts->firstWhere('textname', 'contact_us_title')['description'];}}</p>
				<p class="text">{{$texts->firstWhere('textname', 'contact_us_text')['description'];}}</p>
				<div class="row mt-4">
					<p class="text">{{$texts->firstWhere('textname', 'contact_email')['description'];}}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-12 px-5 py-lg-0">
				<img class="" src="{{asset('icons/World@1x.png')}}" height="35" width="35"/>
				<p class="subtitle mt-5">{{$texts->firstWhere('textname', 'social_net_title')['description'];}}</p>
				<p class="text">{{$texts->firstWhere('textname', 'social_net_text')['description'];}}</p>
				<div class="row mt-5">
					<div class="col-1 me-3">
						<a href="{{$info->firstWhere('fieldname', 'facebook')['value'];}}">
							<img src="{{$info->firstWhere('fieldname', 'facebook')['img_url'];}}" height="42" width="42"/>
						</a>
					</div>
					<div class="col-1 mx-3">
						<a href="{{$info->firstWhere('fieldname', 'twitter')['value'];}}">
							<img src="{{$info->firstWhere('fieldname', 'twitter')['img_url'];}}" height="42" width="42"/>
						</a>
					</div>
					<div class="col-1 mx-3">
						<a href="{{$info->firstWhere('fieldname', 'instagram')['value'];}}">
							<img src="{{$info->firstWhere('fieldname', 'instagram')['img_url'];}}" height="42" width="42"/>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection