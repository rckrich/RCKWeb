@props([
'disabled' => false,
'options' => [],
'selectedOption' => '',
])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    <option value=""></option>
    @foreach($options as $element)
    <option value="{{ $element->id }}">{{ $element->name }}</option>
    @endforeach
</select>
