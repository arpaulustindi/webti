@extends('components.layouts.fe')
@section('content')
<main class="pt-8 pb-16 antialiased bg-white lg:pt-16 lg:pb-24 dark:bg-gray-900">
    <div class="flex justify-between max-w-screen-xl px-4 mx-auto ">
        <article class="w-full max-w-2xl mx-auto format format-sm sm:format-base lg:format-lg format-blue dark:format-invert dark:text-white">
            <header class="mb-4 lg:mb-6 not-format">
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">Tracer Alumni SI</h1>
            </header>
            @livewire('daftar-tracer-alumni')

        </article>
    </div>
  </main>
@endsection
