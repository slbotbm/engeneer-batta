<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('Index') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
          <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-200 border-b border-grey-light dark:border-grey-dark">index</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($recipes as $recipe)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                  <a href="{{ route('recipe.show',$recipe->id) }}">
                    <h3 class="text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$recipe->name}}</h3>
                  @if($recipe->ingredients->count()<=10)
                    <h3 class="text-left font-bold text-xs text-gray-green dark:text-gray-200">Number of ingredients needed: {{$recipe->ingredients->count()}} | Easy</h3>
                  @elseif($recipe->ingredients->count()<=20)
                  <h3 class="text-left font-bold text-xs text-gray-green dark:text-gray-200">Number of ingredients needed: {{$recipe->ingredients->count()}} | Medium</h3>
                  @else
                  <h3 class="text-left font-bold text-xs text-gray-green dark:text-gray-200">Number of ingredients needed: {{$recipe->ingredients->count()}} | Difficult</h3>
                  @endif
                  </a>
                  <div class="flex">
                  </div>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>