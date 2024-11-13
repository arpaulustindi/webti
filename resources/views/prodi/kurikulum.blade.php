@extends('components.layouts.fe')
@section('content')
<!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->

<main class="pt-8 pb-16 antialiased bg-white lg:pt-16 lg:pb-24 dark:bg-gray-900">
    <div class="flex justify-between max-w-screen-xl px-4 mx-auto ">
        <article class="w-full max-w-2xl mx-auto format format-sm sm:format-base lg:format-lg format-blue dark:format-invert dark:text-white">
            <header class="mb-4 lg:mb-6 not-format">
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">Kurikulum Program Studi Sistem Informasi</h1>
            </header>
        </article>
    </div>
  </main>
  <section class="py-3 bg-gray-50 dark:bg-gray-900 sm:py-5">
    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="flex items-center flex-1 space-x-4">
                    <h5>
                        <span class="text-gray-500">Total Mata Kuliah:</span>
                        <span class="dark:text-white">{{ $kurikulums->count()}}</span>
                    </h5>
                    <h5>
                        <span class="text-gray-500">Total SKS Teori:</span>
                        <span class="dark:text-white">{{ $kurikulums->sum('teori')}}</span>
                    </h5>
                    <h5>
                        <span class="text-gray-500">Total SKS Praktek:</span>
                        <span class="dark:text-white">{{ $kurikulums->sum('praktek')}}</span>
                    </h5>
                    <h5>
                        <span class="text-gray-500">Total SKS:</span>
                        <span class="dark:text-white">{{ $kurikulums->sum('teori')+$kurikulums->sum('praktek')}}</span>
                    </h5>
                </div>


            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Semester</th>
                            <th scope="col" class="px-4 py-3">Jenis</th>
                            <th scope="col" class="px-4 py-3">Rumpun</th>
                            <th scope="col" class="px-4 py-3">KODE</th>
                            <th scope="col" class="px-4 py-3">Mata Kuliah</th>


                            <th scope="col" class="px-4 py-3">SKS</th>


                            <th scope="col" class="px-4 py-3">RPS</th>
                            <th scope="col" class="px-4 py-3">Modul</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kurikulums as $kurikulum)
                        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center">
                                    <span class="ml-1 text-gray-500 dark:text-gray-400">{{$kurikulum->semester}}</span>
                                </div>
                            </td>
                            <td class="px-4 py-2">
                                <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{$kurikulum->jenis}}</span>
                            </td>
                            <td class="px-4 py-2">
                                <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{$kurikulum->rumpun}}</span>
                            </td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$kurikulum->kode}}</td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$kurikulum->mata_kuliah}}</td>


                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center">

                                    {{ $kurikulum->teori+$kurikulum->praktek}} ( {{$kurikulum->teori}} - {{$kurikulum->praktek}} )
                                </div>
                            </td>



                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center">
                                    <a href="{{ $kurikulum->rps }}" type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                        Download RPS
                                    </a>
                                </div>
                            </td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center">
                                    <a href="{{ $kurikulum->modul }}" type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                        Download Modul
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </section>


@endsection
