<div id="element-list">

    @if(session()->has('message'))
    <div class="mb-6 flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3"
         role="alert"
         x-data="{show: true}"
         x-init="setTimeout(() => show = false, 5000)"
         x-show="show">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-8 w-8">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
        </svg>
        <p class="px-2">{{ session('message') }}</p>
    </div>
    @endif

    <div class="block mb-8">
        <div class="relative w-1/2 mb-6">
            <x-link-button wire:click="confirmAddition()">
                Crear
            </x-link-button>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bg-gray-100">
            <thead class="text-xs text-gray-700 uppercase">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre de la varialbe
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripción/Valor
                </th>
                <th scope="col" class="px-6 py-3">
                    Imagen/Ícono
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
            </thead>
            <tbody>
            @if($elements->count() > 0)
            @foreach($elements as $element)
            <tr class="bg-white border-b dark:text-gray-500 font-medium" wire:key="element-{{ $element->id }}">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="py-2 px-2 max-w-sm mx-auto bg-white space-y-2 sm:py-2 sm:flex  sm:ml-0 sm:items-center sm:space-y-0 sm:space-x-6">
                        <div class="text-center space-y-2 sm:text-left">
                            <div class="px-3">
                                {{$element->id}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="py-2 px-2 max-w-sm mx-auto bg-white space-y-2 sm:py-2 sm:flex  sm:ml-0 sm:items-center sm:space-y-0 sm:space-x-6">
                        <div class="text-center space-y-2 sm:text-left">
                            <div class="px-3">
                                {{$element->fieldname}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="py-2 px-2 max-w-sm mx-auto bg-white space-y-2 sm:py-2 sm:flex  sm:ml-0 sm:items-center sm:space-y-0 sm:space-x-6">
                        <div class="text-center space-y-2 sm:text-left">
                            <div class="px-3">
                                {{$element->value}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="py-2 px-2 max-w-sm mx-auto bg-white space-y-2 sm:py-2 sm:flex  sm:ml-0 sm:items-center sm:space-y-0 sm:space-x-6">
                        <div class="text-center space-y-2 sm:text-left">
                            <div class="px-3">
                                <img src="{{asset($element->image_url) }}" alt="Info Image" class="img-thumbnail" width="80">
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-right">
                    <x-link-button wire:click="confirmDetail({{ $element->id }})" wire:loading.attr="disabled" class="mr-2">
                        Ver
                    </x-link-button>

                    <x-link-button wire:click="confirmEdition({{ $element->id }})" wire:loading.attr="disabled" class="mr-2">
                        Editar
                    </x-link-button>

                    <x-danger-button wire:click="confirmDeletion({{ $element->id }})" wire:loading.attr="disabled">
                        Eliminar
                    </x-danger-button>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 text-center" colspan="8">
                    No existe ningún elemento
                </th>
            </tr>
            @endif
            </tbody>
        </table>
    </div>

    <x-dialog-modal wire:model="confirmingAddition">
        <x-slot name="title">
            {{ isset($this->element->id) ?  'Editar' : 'Crear' }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="fieldname" value="Nombre de la variable" />
                <x-input id="fieldname" type="text" class="mt-1 block w-full" wire:model="fieldname" />
                <x-input-error for="fieldname" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="value" value="Descripción/Valor" />
                <x-input id="value" type="text" class="mt-1 block w-full" wire:model="value" />
                <x-input-error for="value" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="image" value="Imagen" />
                @if (isset($this->image) || isset($this->element->img_url))
                Vista previa:
                @if(isset($this->image))
                <img src="{{$this->image->temporaryUrl() }}">
                @elseif(isset($this->element->img_url))
                <img src="{{$this->element->image_url }}">
                @endif
                @endif

                <input type="file" class="mt-1 block w-full" id="upload-{{ $uploadIteration }}" wire:model="image">
                <x-input-error for="image" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingAddition', false)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-button class="ml-2" wire:click="save()" wire:loading.attr="disabled">
                {{ isset($this->element->id) ?  'Editar' : 'Crear' }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="confirmingDetail">
        <x-slot name="title">
            Ver
        </x-slot>

        <x-slot name="content">
            @if(isset($this->element->id))
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="fieldname" value="Nombre de la variable" />
                <p>{{$this->element->fieldname}}</p>
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="value" value="Descripción/Valor" />
                <p>{{$this->element->value}}</p>
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="image" value="Imagen" />
                <img src="{{$this->element->image_url }}">
            </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingDetail', false)" wire:loading.attr="disabled">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

    <x-confirmation-modal wire:model="confirmingDeletion">
        <x-slot name="title">
            Eliminar
        </x-slot>

        <x-slot name="content">
            ¿Estás seguro de eliminar este elemento?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingDeletion', false)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="deletion({{ $confirmingDeletion }})" wire:loading.attr="disabled">
                Eliminar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
