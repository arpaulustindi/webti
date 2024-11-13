@extends('components.layouts.fe')
@section('content')

  <section class="bg-white dark:bg-gray-900">
    <div class="items-center max-w-screen-xl gap-8 px-4 py-8 mx-auto xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
        <img class="w-full dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/cta/cta-dashboard-mockup.svg" alt="dashboard image">
        <img class="hidden w-full dark:block" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/cta/cta-dashboard-mockup-dark.svg" alt="dashboard image">
        <div class="mt-4 font-light text-gray-500 md:mt-0 md:text-lg dark:text-gray-400">
            <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">Sambutan Ketua Jurusan</h2>
            {!! $sambutan->sambutan !!}
        </div>
    </div>
</section>

@endsection
