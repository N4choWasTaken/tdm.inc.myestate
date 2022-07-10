@extends('template')

@section('content')

<x-card class="p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit Recipe
        </h2>
        <p class="mb-4">Edit: {{$recipe->name}}</p>
    </header>

    <form method="POST" action="/recipes/{{$recipe->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">Recipe Name</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{$recipe->name}}"/>
        
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>           
            @enderror

        </div>

        <div class="mb-6">
            <label for="considerations" class="inline-block text-lg mb-2">
                Considerations (Comma Separated)
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="considerations" value="{{$recipe->considerations}}" placeholder="Example: Vegan, Gluten Free, Lactose Free, etc"/>
            
            @error('considerations')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>           
            @enderror

        </div>

        <div class="mb-6">
            <label for="ingredients" class="inline-block text-lg mb-2">
                Ingredients (Comma Separated)
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="ingredients" value="{{$recipe->ingredients}}" placeholder="Example: Tomatoes : 200g, Poulet : 100g, etc"/>
        
            @error('ingredients')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>           
            @enderror

        </div>

        <div class="mb-6">
            <label for="image" class="inline-block text-lg mb-2">
                Image of Food
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image"/>

            <img class="w-48 mr-6 mb-6" src="{{$recipe->image ? asset('storage/' . $recipe->image) : asset('/images/no-image.png')}}" alt=""/>
        
            @error('image')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>           
            @enderror
            
        
        </div>  

        <div class="mb-6">
            <label for="guide" class="inline-block text-lg mb-2">
                Guide
            </label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="guide" value="{{$recipe->guide}}" rows="10" placeholder="Step by step guide"></textarea>
        
            @error('guide')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>           
            @enderror

        </div>

        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Update Recipe
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-card>
@endsection