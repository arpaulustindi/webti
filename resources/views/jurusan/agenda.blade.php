@extends('components.layouts.fe')
@section('content')
<!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->

<section class="antialiased bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-4xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
                Agenda
            </h2>


        </div>

        <div class="flow-root max-w-3xl mx-auto mt-8 sm:mt-12 lg:mt-16">
            <div class="-my-4 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($activeAgendas as $agenda)
                <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                    <p class="w-32 text-lg font-normal text-gray-500 sm:text-right dark:text-gray-400 shrink-0">
                        {{$agenda->mulai}}
                    </p>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{$agenda->judul}}
                    </h3>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</section>

@endsection
