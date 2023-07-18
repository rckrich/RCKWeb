<!-- resources/views/projects/show_project.blade.php -->

@extends('layouts.landing')

@section('content')
<section id="view_project" class="row px-0 py-5 mx-0 align-items-center" data-big="2" data-lightbox="gallery">
<div class="container mw-xl">
    <div class="row ">
        <div class="col-lg-5 col-md-12 col-sm-12 col-12 p-4 my-auto">
            <img id="project-banner" src="{{asset($project->banner_img_url) }}" alt="Banner Image" class="w-100">
        </div>
        <div class="col-lg-7 col-md-12 col-sm-12 col-12 p-4">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-3 col-4 my-auto">
                    <img id="project-icon" src="{{asset($project->icon_url) }}" alt="Icon Image" class="w-100">
                </div>
                <div class="row col align-items-start">
                    <div class="col-12 mt-auto">
                        <h2 class="" id="project-name">{{ $project->name }}</h2>                    
                    </div>
                    <div class="col mb-auto py-2">
                     @if(count($projectTypes) > 0)
                        @foreach($projectTypes as $projectType)                    
                            <div class=" badge badge-primary bg-black px-2 py-2 my-1">{{ $projectType->name }}</div>    
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <p class="project-description">{{ $project->description }}</p>
            </div>
        </div>
    </div>
    <div class="row p-4">
        <h2 class="px-0">{{__('landing.galleries.title')}}</h2>
        <div class="row mx-0 px-0 py-5 max-height-gallery">
            @if(count($galleries) > 0)
            @foreach($galleries as $gallery)
            <div class="col-lg-4 col-md-4 col-sm-6 col-6 p-0 m-0">
                @if(Str::endsWith($gallery->img_url, ['.jpg', '.jpeg', '.png', '.gif']))
                <a class="grid-item" href="{{asset($gallery->img_url) }}" data-lightbox="gallery-item" >
                    <img src="{{asset($gallery->img_url) }}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
                @elseif(Str::endsWith($gallery->img_url, ['.mp4', '.mov', '.avi', '.mkv']))
                <a class="grid-item" href="{{asset($gallery->img_url) }}" data-lightbox="iframe" >
                    <!--img src="{{asset($gallery->img_url) }}" alt="Youtube Video" style="box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15); border-radius: 6px;">
                    <i class="bi-play" style="position: absolute; top: 50%; left: 50%; font-size: 60px; color: #FFF; margin-top: -45px; margin-left: -23px"></i-->
                    <video  class="gallery-img w-100 h-100">
                        <source src="{{ asset($gallery->img_url)}}" type="video/mp4">
                        <!-- Add additional <source> tags for other video formats if needed -->
                        Your browser does not support the video tag.
                    </video> 
                </a>
                @endif
            </div>
            @endforeach
            @else
                <p class="px-0">{{__('landing.galleries.not_found')}}</p>
            @endif
        </div>
    </div>
</div>
</section>
@endsection
