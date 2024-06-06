<div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
        <div>
            <p class="mt-6 font-medium text-gray-700">Banner:</p>
            <img src="{{asset($project->banner_image_url) }}" alt="Info Image" class="img-thumbnail" width="400">
        </div>
        <div>
            <p class="mt-6 font-medium text-gray-700">Nombre:</p>
            <h1 class="text-2xl font-medium text-gray-900">
                {{$project->name}}
            </h1>

            <p class="mt-6 font-medium text-gray-700">Descripción:</p>
            <p class="text-gray-500 leading-relaxed">
                {{$project->description}}
            </p>

            <p class="mt-6 font-medium text-gray-700">Ícono:</p>
            <img src="{{asset($project->icon_image_url) }}" alt="Info Image" class="img-thumbnail" width="80">

            <p class="mt-6 font-medium text-gray-700">Fecha de creación:</p>
            <p class="text-gray-500 leading-relaxed">
                {{$project->creation_date}}
            </p>
        </div>
    </div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200 ">
        <h2 class="text-xl font-medium text-gray-900">
            Galería de imágenes
        </h2>
        <div class="block mt-6 grid grid-cols-8 gap-6">
            @foreach($project->galleries as $gallery)
            <div class="">
                <img src="{{asset($gallery->image_url) }}" alt="Info Image" class="img-thumbnail">
            </div>
            @endforeach
        </div>
    </div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200 ">
        <h2 class="text-xl font-medium text-gray-900">
            Etiquetas
        </h2>
        <div class="block mt-6 grid grid-cols-6 gap-6">
            @foreach($project->types as $type)
            <div class="">
                <span class="block items-center rounded-md bg-black px-2 py-1 text-lg text-center font-medium italic text-white ring-1 ring-inset ring-gray-500/10">
                    {{$type->name}}
                </span>
            </div>
            @endforeach
        </div>
    </div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200 ">
        <h2 class="text-xl font-medium text-gray-900">
            Links
        </h2>
        <div class="block mt-6 ">
            <ul role="list" class="divide-y divide-gray-100">
                @foreach($project->links as $link)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{$link->text}}</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$link->url}}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="p-6 lg:p-8 bg-white border-b border-gray-200 ">
        <h2 class="text-xl font-medium text-gray-900">
            Videos
        </h2>
        <div class="block mt-6 ">
            <ul role="list" class="divide-y divide-gray-100">
                @foreach($project->videos as $video)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$video->url}}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
