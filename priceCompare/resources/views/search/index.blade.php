<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('検索結果') }}
    </h2>
  </x-slot>
    <div class="py-1">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
  @if($recipes->count()!== 0)

      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
                {{ __('レシピー') }}({{$recipes->count()}})
            </h2>
          <table class="text-center w-full border-collapse">
            <tbody>
              @foreach ($recipes as $recipe)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                  <a href="{{ route('recipe.show',$recipe->id) }}">
                  @if($recipe->ingredients->count()<=10)
                  <h3 class="text-left font-bold text-xs text-gray-green dark:text-gray-200">簡単</h3>
                  @elseif($recipe->ingredients->count()<=20)
                  <h3 class="text-left font-bold text-xs text-gray-green dark:text-gray-200">普通</h3>
                  @else
                  <h3 class="text-left font-bold text-xs text-gray-green dark:text-gray-200">難しい</h3>
                  @endif
                   
                  <h3 class="text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$recipe->name}}</h3>
                  <h3 class="text-left font-bold text-xs text-gray-green dark:text-gray-200">必要な材料の数: {{$recipe->ingredients->count()}}</h3>
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
    
  @endif
  @if($supermarkets->count()!== 0)
  
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
                {{ __('スーパー') }}({{$supermarkets->count()}})
            </h2>
          <table class="text-center w-full border-collapse">
            <tbody>
              @foreach ($supermarkets as $supermarket)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                  <a href="{{ route('supermarket.show',$supermarket->id) }}">
                    <h3 class="text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$supermarket->name}}</h3>
                  </a>
                </td>
              </tr>
              @endforeach
              </tbody>
          </table>
        </div>
      </div>

@endif
@if($ingredients->count()!== 0)

      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
                {{ __('食材') }}({{$ingredients->count()}})
            </h2>
          <table class="text-center w-full border-collapse">
            <tbody>
              @foreach ($ingredients as $ingredient)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                  <a href="{{ route('ingredient.show',$ingredient->id) }}">
                    <h3 class="text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$ingredient->name}}</h3>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  @endif
  @if(!$recipes->count()&&!$supermarkets->count()&&!$ingredients->count())

      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
                {{ __('検索語に一致するものはありませんでした。') }}
            </h2>
@endif
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
</div>
</x-app-layout>