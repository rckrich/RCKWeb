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
        <div class="mt-2">
            <x-link-button class="text-sm" wire:click="confirmImageAddition()">
                Añadir imagen
            </x-link-button>
        </div>
        <div class="block mt-6 grid grid-cols-8 gap-6">
            @foreach($project->galleries as $gallery)
            <div class="">
                <img src="{{asset($gallery->image_url) }}" alt="Info Image" class="img-thumbnail">
                <x-danger-button class="block mt-1" wire:click="confirmImageDeletion({{ $gallery->id }})" wire:loading.attr="disabled">
                    Eliminar
                </x-danger-button>
            </div>
            @endforeach
        </div>
    </div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200 ">
        <h2 class="text-xl font-medium text-gray-900">
            Etiquetas
        </h2>
        <div class="mt-2">
            <x-link-button class="my-2 text-sm" wire:click="confirmTagAddition()">
                Añadir etiqueta
            </x-link-button>
        </div>
        <div class="block mt-6 grid grid-cols-6 gap-6">
            @foreach($project->types as $type)
            <div class="">
                <span class="block items-center rounded-md bg-black px-2 py-1 text-lg text-center font-medium italic text-white ring-1 ring-inset ring-gray-500/10">
                    {{$type->name}}
                </span>
                <x-danger-button class="text-xs block mt-1" wire:click="confirmTagDeletion({{ $type->id }})" wire:loading.attr="disabled">
                    Eliminar
                </x-danger-button>
            </div>
            @endforeach
        </div>
    </div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200 ">
        <h2 class="text-xl font-medium text-gray-900">
            Links
        </h2>
        <div class="mt-2">
            <x-link-button class="my-2 text-sm" wire:click="confirmLinkAddition()">
                Añadir link
            </x-link-button>
        </div>
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
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <x-link-button class="text-xs block mt-0" wire:click="confirmLinkEdition({{ $link->id }})" wire:loading.attr="disabled">
                            Editar
                        </x-link-button>
                        <x-danger-button class="text-xs block mt-0" wire:click="confirmLinkDeletion({{ $link->id }})" wire:loading.attr="disabled">
                            Eliminar
                        </x-danger-button>
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
        <div class="mt-2">
            <x-link-button class="my-2 text-sm" wire:click="confirmVideoAddition()">
                Añadir video
            </x-link-button>
        </div>
        <div class="block mt-6 ">
            <ul role="list" class="divide-y divide-gray-100">
                @foreach($project->videos as $video)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$video->url}}</p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <x-link-button class="text-xs block mt-0" wire:click="confirmVideoEdition({{ $video->id }})" wire:loading.attr="disabled">
                            Editar
                        </x-link-button>
                        <x-danger-button class="text-xs block mt-0" wire:click="confirmVideoDeletion({{ $video->id }})" wire:loading.attr="disabled">
                            Eliminar
                        </x-danger-button>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <x-dialog-modal wire:model="confirmingImageAddition">
        <x-slot name="title">
            Añadir imagen
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="image" value="Imagen" />
                @if (isset($this->image))
                Vista previa:
                @if(isset($this->image))
                <img src="{{$this->image->temporaryUrl() }}">
                @endif
                @endif

                <input type="file" class="mt-1 block w-full" id="upload-{{ $uploadIteration }}" wire:model="image">
                <x-input-error for="image" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingImageAddition', false)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-button class="ml-2" wire:click="saveImage()" wire:loading.attr="disabled">
                Añadir
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="confirmingTagAddition">
        <x-slot name="title">
            Añadir etiqueta
        </x-slot>

        <x-slot name="content">
            <x-select id="types" name="types" type="text" class="mt-1 block w-full"
                      required
                      :options="$types"
                      wire:model.live="tag"
            />
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingTagAddition', false)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-button class="ml-2" wire:click="saveTag()" wire:loading.attr="disabled">
                Añadir
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="confirmingLinkAddition">
        <x-slot name="title">
            {{ isset($this->element->id) ?  'Editar' : 'Añadir' }} Link
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="text" value="Texto" />
                <x-input id="text" type="text" class="mt-1 block w-full" wire:model="text" />
                <x-input-error for="text" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="url" value="URL" />
                <x-input id="url" type="text" class="mt-1 block w-full" wire:model="url" />
                <x-input-error for="url" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingLinkAddition', false)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-button class="ml-2" wire:click="saveLink()" wire:loading.attr="disabled">
                Añadir
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="confirmingVideoAddition">
        <x-slot name="title">
            {{ isset($this->element->id) ?  'Editar' : 'Añadir' }} video
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="video" value="ID de Vimeo" />
                <x-input id="video" type="text" class="mt-1 block w-full" wire:model="video" />
                <x-input-error for="video" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingVideoAddition', false)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-button class="ml-2" wire:click="saveVideo()" wire:loading.attr="disabled">
                Añadir
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-confirmation-modal wire:model="confirmingImageDeletion">
        <x-slot name="title">
            Eliminar
        </x-slot>

        <x-slot name="content">
            ¿Estás seguro de eliminar este elemento?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingImageDeletion', false)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="imageDeletion({{ $confirmingImageDeletion }})" wire:loading.attr="disabled">
                Eliminar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    <x-confirmation-modal wire:model="confirmingTagDeletion">
        <x-slot name="title">
            Eliminar
        </x-slot>

        <x-slot name="content">
            ¿Estás seguro de eliminar este elemento?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingTagDeletion', false)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="tagDeletion({{ $confirmingTagDeletion }})" wire:loading.attr="disabled">
                Eliminar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    <x-confirmation-modal wire:model="confirmingLinkDeletion">
        <x-slot name="title">
            Eliminar
        </x-slot>

        <x-slot name="content">
            ¿Estás seguro de eliminar este elemento?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingLinkDeletion', false)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="linkDeletion({{ $confirmingLinkDeletion }})" wire:loading.attr="disabled">
                Eliminar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    <x-confirmation-modal wire:model="confirmingVideoDeletion">
        <x-slot name="title">
            Eliminar
        </x-slot>

        <x-slot name="content">
            ¿Estás seguro de eliminar este elemento?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingVideoDeletion', false)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="videoDeletion({{ $confirmingVideoDeletion }})" wire:loading.attr="disabled">
                Eliminar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
