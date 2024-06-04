@props([
    'options' => "{enableTime: false, noCalendar: false, dateFormat: 'Y-m-d', locale: 'es', altInput: true, altFormat: 'd/F/Y'}",
    ])

@once
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('datepicker', (model) => ({
            value: model,
            init(){
                this.pickr = flatpickr(this.$refs.myDatepicker, {})
                this.$watch('value', function(newValue){
                    this.pickr.setDate(newValue);
                }.bind(this));
            },
            reset(){
                this.value = null;
            }
        }))
    })
</script>
@endpush
@endonce


<div x-data="datepicker(@entangle($attributes->wire('model')))" class="relative">
    <input
        x-ref="myDatepicker"
        x-model="value"
           type="text"
           data-input
           {{ $attributes->merge(['class' => 'datepicker block w-full disabled:bg-gray-200 p-2 border border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5']) }}
    />
</div>


