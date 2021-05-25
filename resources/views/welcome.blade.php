{{-- llamamos al componente de la pantalla principal --}}
<x-app-layout>

{{--     <x-slot name="header">
        Este seria el slot header si lo quisiera
    </x-slot>
 --}}

    <div class="container mx-auto px-4 bg-gray-300">
        <section class="pt-8 px-4">
            <div class="flex flex-wrap -mx-4">
                @foreach ($files as $file)
                    <div class="md:w-1/3 px-4 mb-3">
                        <img class="rounded shadow-md" src="{{ Storage::url( $file->url) }}" alt="">
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    {{ $files->links() }}

</x-app-layout>


{{--     <div class="container mx-auto px-4"> 
                
      <section class="py-8 px-4">
        <div class="flex flex-wrap -mx-4">
          <div class="hidden md:block md:w-1/2 px-4">
            <div class="h-full w-full bg-cover rounded shadow-md" style="background-image: url('https://source.unsplash.com/random/1280x720')"></div>
          </div>
          <div class="md:w-1/2 h-auto px-4">
            <div class="mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
            <div><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          </div>
        </div>
      </section>
                
      <section class="py-8 px-4">
        <div class="flex flex-wrap -mx-4">
          <div class="md:w-1/2 px-4 mb-8 md:mb-0"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/2 px-4 mb-8 md:mb-0"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
        </div>
      </section>
                
      <section class="pt-8 px-4">
        <div class="flex flex-wrap -mx-4">
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
        </div>
      </section>
                
      <section class="py-8 px-4">
        <div class="flex flex-wrap -mx-4 -mb-8">
          <div class="md:w-1/4 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/4 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/4 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/4 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/4 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/4 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/4 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/4 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
        </div>
      </section>
    </div>
 --}}