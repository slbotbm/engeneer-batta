<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('Cheapest Ingredients') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
          <table class="text-center w-full border-collapse">
           
                <caption class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-200 border-b border-grey-light dark:border-grey-dark">Recipe</caption>

            <tbody>
            
              @foreach($supermarkets_array as $supermarket)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">

                    <h3 class="text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$supermarket}}  </h3>

                </td>
              </tr>
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                <table class="text-center w-full border-collapse">
                  <tbody>
                    @foreach($final_array[$supermarket] as $ingredient) 
                    
                    <tr class="hover:bg-gray-lighter">
                    <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600"><h3 class="text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$ingredient["ingredient"]["name"]}}</h3>
</td>
                    <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600"><h3 class="text-right font-bold text-lg text-gray-dark dark:text-gray-200">{{$ingredient["price"]}}</h3>
</td>
</tr>
@endforeach
</tbody>
</table>  
</td>
</tr>
              @endforeach
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                    <h3 class = "text-right font-bold text-lg text-gray-dark dark:text-gray-200"> {{$sum}}</h3>
                </td>

              </tr>
              
            </tbody>
          </table>

          
          <div class="flex items-center justify-end mt-4">
              <a href="{{ url()->previous() }}">
                <x-secondary-button class="ml-3">
                  {{ __('Back') }}
                </x-primary-button>
              </a>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
