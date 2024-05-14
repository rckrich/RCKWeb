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

</div>
