
{{-- to make sure that the component is able to use external class when called on the parent
    compnonet you have to set attributes and merge them --}}
<div 
{{ $attributes->merge([
"class"=>"bg-gray-50 border border-gray-200 rounded p-6"]) }}
>


{{ $slot }}
</div>