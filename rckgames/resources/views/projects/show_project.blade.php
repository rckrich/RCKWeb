<!-- resources/views/projects/show_project.blade.php -->

@extends('layouts.landing')

@section('content')
<section id="view_project" class="row px-0 py-5 mx-0 align-items-center" data-big="2" data-lightbox="gallery">
<div class="container mw-xl">
    <div class="row pb-5">
        <div class="col-lg-5 col-md-5 col-sm-12 col-12 p-4">
            <img id="project-banner" src="{{asset($project->banner_img_url) }}" alt="Banner Image" class="w-100">
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12 col-12 p-4">
            <div class="row">
                <div class="col-2">
                    <img id="project-icon" src="{{asset($project->icon_url) }}" alt="Icon Image" class="w-100">
                </div>
                <div class="col">
                    <h2 id="project-name">{{ $project->name }}</h2>
                     @if(count($projectTypes) > 0)
                        @foreach($projectTypes as $projectType)
                            <div class="badge badge-primary bg-black py-2">{{ $projectType->name }}</div>
                        @endforeach    
                    @endif
                </div>
            </div>
            <div class="row py-5">
                <p class="project-description">{{ $project->description }}</p>
            </div>
        </div>
    </div>
    <div class="row p-4">
        <h2 class="px-0">{{__('landing.galleries.title')}}</h2>
        <div class="row mx-0 px-0 py-5 max-height-gallery">
            @if(count($galleries) > 0)
            @foreach($galleries as $gallery)
            <div class="col-4 p-0 m-0">
                <a class="grid-item" href="{{asset($gallery->img_url) }}" data-lightbox="gallery-item" >
                    <img src="{{asset($gallery->img_url) }}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
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
