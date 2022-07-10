@extends('template')

@section('content')

<x-card class="p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Create a Estate
        </h2>
        <p class="mb-4">Post a estate to share with the world</p>
    </header>

    <form method="POST" action="/recipes" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">Estate Name</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}"/>
        
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>           
            @enderror

        </div>

        <div class="mb-6">
            <label for="location" class="inline-block text-lg mb-2">
                Location
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" value="{{old('location')}}" placeholder="Example: Zürich"/>
            
            @error('location')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>           
            @enderror

        </div>

        <div class="mb-6">
            <label for="price" class="inline-block text-lg mb-2">
                Price
            </label>
            <input type="number" class="border border-gray-200 rounded p-2 w-full" name="price" value="{{old('price')}}" placeholder="Example: 100000"/>
        
            @error('price')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>           
            @enderror

        </div>

        <div class="mb-6">
            <label for="image" class="inline-block text-lg mb-2">
                Image of Estate
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image"/>
        
            @error('image')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>           
            @enderror
        
        </div>  

        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">
                Description
            </label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" value="{{old('description')}}" rows="10" placeholder="Description"></textarea>
        
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>           
            @enderror

        </div>

        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Create Estate
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-card>
@endsection