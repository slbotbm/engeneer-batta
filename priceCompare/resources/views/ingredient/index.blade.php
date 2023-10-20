<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      Ingredient
      </h2>
  </x-slot>
  

  <div class="py-1">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
          <table class="text-center w-full border-collapse">
            <tbody>
              @foreach ($ingredients as $ingredient)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                  
                  <a href="{{ route('ingredient.show',$ingredient->id) }}">
                    <h3 class="text-xl text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$ingredient->name}}</h3> </a>
                    <p class="text-xs text-left font-bold text-lg text-gray-dark dark:text-gray-500">{{$ingredient->price}}</p>
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>
          {{$ingredients->links()}}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

