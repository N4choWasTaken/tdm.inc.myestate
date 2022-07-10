@extends('template')

@section('content')
@include('partials._search')

    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
            <div class="mx-4">
                <x-card class="p-10">
                    <div class="flex flex-col items-center justify-center text-center">
                        <img class="w-48 mr-6 mb-6" src="{{$recipe->image ? asset('storage/' . $recipe->image) : asset('/images/no-image.png')}}" alt=""/>

                        <h3 class="text-2xl mb-2">{{$recipe->name}}</h3>
                        <div class="text-xl font-bold mb-4"> </div>
                        
                        <x-recipe-considerations :considerationsCsv="$recipe->considerations"/>
            
                        <div class="text-lg my-4">
                            {{$recipe->user->name}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Guide
                            </h3>
                            <div class="text-lg space-y-6">
                                {{$recipe->guide}}
                                >
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
@endsection