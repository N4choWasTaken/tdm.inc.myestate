@extends('template')

@section('content')
@include('partials._hero');
@include('partials._search')

<div class="gap-4 space-y-4 md:space-y-0 mx-4 px-4 w-screen scale-x-75">

    @unless(count($estates) == 0)

    @foreach($estates as $estate)
        <x-recipe-card :estate='$estate' />
    @endforeach

    @else
        <p>No estates found</p>
    @endunless
</div>


<div class="mt-6 p-4">
    {{$estates->links()}}
</div>
@endsection