@props(['recipe'])

<x-card>
    <div class="flex mb-4">
        <img class="hidden w-48 mr-6 md:block" src="{{$recipe->image ? asset('storage/' . $recipe->image) : asset('/images/no-image.png')}}" alt=""/>
       
        <div>
            <h3 class="text-2xl">
                <a href="/recipes/{{$recipe->id}}">{{$recipe->name}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$recipe->user->name}}</div>
            <x-recipe-considerations :considerationsCsv="$recipe->considerations"/>
            <div class="text-lg mt-4">

            </div>
        </div>
    </div>
</x-card>