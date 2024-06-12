<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    {{ dd($usuario) }}
                    {{ $usuario->name }}
                </h1>

                @if (Auth::user()->seguidos->contains($usuario))

                <form action="{{ route('usuario.dejar', $usuario) }}" class="flex justify-center mt-4 mb-4">
                    <x-primary-button class="bg-red-500 mb-2">No seguir</x-primary-button>
                </form>
                @else
                <form action="{{ route('usuario.seguir', $usuario) }}" class="flex justify-center mt-4 mb-4">
                    <x-primary-button class="bg-green-500 mb-2">Seguir</x-primary-button>
                </form>
                @endif

                {{ dd(Auth::user()->tuits)}}
                @forelse ($usuario->tuits as $tuit)
                <h3 class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-md lg:text-md dark:text-gray-400">

                    <h4>
                        {{$tuit->texto}}
                    </h4>
                    <p>
                        {{ $tuit->created_at }}
                    </p>
                </h3>
            @empty
                <p>No sigues a ningún usuario.</p>
            @endforelse


            </div>
        </div>
    </section>
</x-app-layout>
