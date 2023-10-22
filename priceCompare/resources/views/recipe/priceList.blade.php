<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('価格一覧') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
          <table class="text-center w-full border-collapse">
           
                <caption class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-200 border-b border-grey-light dark:border-grey-dark">{{$recipe->name}}</caption>

            <tbody>
            
              @for($i = 0; $i < count($ingredients_array); $i++)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">

                    <h3 class="text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$ingredients_array[$i]["name"];}}  </h3>

                </td>
              </tr>
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                <table class="text-center w-full border-collapse">
                  <tbody>
                    @foreach($supermarkets_array[$i] as $supermarket) 
                    <tr class="hover:bg-gray-lighter">
                    <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600"><h3 class="text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$supermarket["name"]}}</h3>
</td>
                    <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600"><h3 class="text-right font-bold text-lg text-gray-dark dark:text-gray-200">{{$supermarket["pivot"][ "ingredient_supermarket_price"]}}</h3>
</td>
</tr>
@endforeach
</tbody>
</table>  
</td>
</tr>
              @endfor
              
            </tbody>
          </table>

          <form action="{{route('recipe.cheapest',  $recipe_id)}}" method="POST">
              @csrf
              @for($i = 0; $i < count($ingredients_array); $i++)
                <input type="hidden" name="ingredients[]" value="{{$ingredients_array[$i]['id']}}" checked />
              @endfor
              <div class="flex items-left justify-end mt-4">
          <x-primary-button class="ml-3">
              最安価格を計算する
            </x-primary-button>
</div>
          </form>
          <div class="flex items-center justify-end mt-4">
              <a href="{{ url()->previous() }}">
                <x-secondary-button class="ml-3">
                  {{ __('戻る') }}
                </x-primary-button>
              </a>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
