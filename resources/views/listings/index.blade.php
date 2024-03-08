{{--
     In blade in don't have to use the php echo to
 display values coming from the router you ma ke use blade 
 double curl braces just like you could with vue js
--}}
@extends('layouts.layout')

@section('content')

@include('partials._hero')
@include('partials._search')



<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>
{{-- To check if the listings is empty --}}
@unless(count($listings)== 0 )

{{--
     Also blade has a dirctives. If you want to make loop over 
    element in in blade instead you make use @foreach directives
    Note:: we also have php directives @php for opening tag and @endphp for closing tag
--}}

<!-- To show each listings that is coming from the view manually -->

 @foreach ($listings as $listing) 
{{-- @dump($listing) --}}
  <x-listing-card :listing="$listing" />
@endforeach

@else 
<p>No Listings found</p>
@endunless
</div>
<div class=" mt-6 p-4">
  {{ $listings->links() }}

</div>
@endsection 