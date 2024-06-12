<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    {{ Auth::user()->name }}
                </h1>

                @forelse ($seguidos as $seguido)
                <h3 class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-md lg:text-md dark:text-gray-400">
                    @forelse ($seguido->tuits as $tuit)
                    <h4>
                        {{ dd($tuit->usuario) }}
                    </h4>
                    <p>
                        {{ $tuit->texto }}
                    </p>
                @empty
                    <span>Este usuario no tiene tuits.</span>
                @endforelse
                </h3>
            @empty
                <p>No sigues a ningún usuario.</p>
            @endforelse


            </div>
        </div>
    </section>
</x-app-layout>
