@extends('components.layouts.fe')
@section('content')
<!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap w-full mb-20">
        <div class="w-full mb-6 lg:w-1/2 lg:mb-0">
          <h1 class="mb-2 text-2xl font-medium text-white sm:text-3xl title-font">Berita Jurusan Teknologi Informatika</h1>
          <div class="w-20 h-1 bg-yellow-500 rounded"></div>
        </div>
        <p class="w-full leading-relaxed text-gray-100 lg:w-1/2">Berita tentang jurusan Teknologi Informatika.</p>
      </div>
      <div class="flex flex-wrap -m-4">
        <div class="p-4 xl:w-1/4 md:w-1/2">
          <div class="p-6 bg-gray-100 rounded-lg">
            <img class="object-cover object-center w-full h-40 mb-6 rounded" src="https://dummyimage.com/720x400" alt="content">
            <h3 class="text-xs font-medium tracking-widest text-yellow-500 title-font">SUBTITLE</h3>
            <h2 class="mb-4 text-lg font-medium text-gray-900 title-font">Chichen Itza</h2>
            <p class="text-base leading-relaxed">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
          </div>
        </div>
        <div class="p-4 xl:w-1/4 md:w-1/2">
          <div class="p-6 bg-gray-100 rounded-lg">
            <img class="object-cover object-center w-full h-40 mb-6 rounded" src="https://dummyimage.com/721x401" alt="content">
            <h3 class="text-xs font-medium tracking-widest text-yellow-500 title-font">SUBTITLE</h3>
            <h2 class="mb-4 text-lg font-medium text-gray-900 title-font">Colosseum Roma</h2>
            <p class="text-base leading-relaxed">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
          </div>
        </div>
        <div class="p-4 xl:w-1/4 md:w-1/2">
          <div class="p-6 bg-gray-100 rounded-lg">
            <img class="object-cover object-center w-full h-40 mb-6 rounded" src="https://dummyimage.com/722x402" alt="content">
            <h3 class="text-xs font-medium tracking-widest text-yellow-500 title-font">SUBTITLE</h3>
            <h2 class="mb-4 text-lg font-medium text-gray-900 title-font">Great Pyramid of Giza</h2>
            <p class="text-base leading-relaxed">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
          </div>
        </div>
        <div class="p-4 xl:w-1/4 md:w-1/2">
          <div class="p-6 bg-gray-100 rounded-lg">
            <img class="object-cover object-center w-full h-40 mb-6 rounded" src="https://dummyimage.com/723x403" alt="content">
            <h3 class="text-xs font-medium tracking-widest text-yellow-500 title-font">SUBTITLE</h3>
            <h2 class="mb-4 text-lg font-medium text-gray-900 title-font">San Francisco</h2>
            <p class="text-base leading-relaxed">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
