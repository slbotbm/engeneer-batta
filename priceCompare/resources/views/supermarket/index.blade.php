
<x-app-layout>
  <x-slot name="header">
    <span class="inline">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      Supermarkets
      </h2>
   
  </span>
  </x-slot>
  

  <div class="py-1">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
          <table class="text-center w-full border-collapse">
            <tbody>
              @foreach ($supermarkets as $supermarket)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                  
                  <a href="{{ route('supermarket.show',$supermarket->id) }}">
                    <h3 class="text-xl text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$supermarket->name}}</h3> </a>
                    <p class="text-xs text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$supermarket->introduction[0:20]}}....</p>
                    <p class="text-xs text-left font-bold text-lg text-gray-dark dark:text-gray-200">Location: {{$supermarket->location}}</p>
                    
                    
                 
                  
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>
          @if ($supermarkets->count())
          <nav align="center" class='py-1 mb-1'>
            {{ $supermarkets->links() }}
          </nav>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

