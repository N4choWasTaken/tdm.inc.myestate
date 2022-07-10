@props(['considerationsCsv'])
@php
    $considerations = explode(',', $considerationsCsv);

@endphp

<ul class="flex">
    @foreach($considerations as $consideration)
        <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
            <a href="/?consideration={{$consideration}}">{{$consideration}}</a>
        </li>
    @endforeach
</ul>