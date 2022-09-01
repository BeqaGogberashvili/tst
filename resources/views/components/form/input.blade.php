@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}" required class="border border-[#292828] bg-[#474646] text-white p-2 w-[350px] outline-0 rounded-sm"/>
    <x-form.error name="{{ $name }}" />
</x-form.field>