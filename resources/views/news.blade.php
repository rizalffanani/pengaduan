<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Layanan Pengaduan Desa Argakencana Kecamatan Moilong Kabupaten Banggai Sulawesi Tengah</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="icon" href="{{ asset('img/favicon.svg')}}">
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<body class="leading-normal tracking-normal" style="font-family: 'Montserrat', sans-serif">

  <nav class="flex items-center justify-between flex-wrap bg-blue-200 p-7 px-20">
    <div class="flex items-center flex-shrink-0 text-black mr-6">
      <span class="font-bold tracking-wider text-xl">
        &nbsp Layanan Pengaduan Desa Argakencana</span>
    </div>
    <div class="block lg:hidden">
      <button
        class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <title>Menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
        </svg>
      </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto text-center">
      <div class="text-md lg:flex-grow">
        <a href="/" class="block mt-4 lg:inline-block lg:mt-0 text-black mr-4">
          Home
        </a>
        <a href="#how" class="block mt-4 lg:inline-block lg:mt-0 text-black mr-4">
          Tata Cara
        </a>
        <a href="/berita" class="block mt-4 lg:inline-block lg:mt-0 text-black mr-4">
          Berita
        </a>
      </div>
      <div>
        <button
          class="text-black font-normal rounded-md py-3 border-black px-4 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          <a href="{{ url('login')}}">Masuk</a>
        </button>
        <button
          class="text-blue-500 font-medium rounded-md py-3 px-4 border-2 border-white focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          <a href="{{ url('register')}}">Daftar</a>
        </button>
      </div>
    </div>
  </nav>

  <!-- Header -->


  <!-- How -->
  <div id="how" class="container my-5 mx-auto px-4 md:px-12 ">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">
      <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4 bg-blue-200">
        <article class="overflow-hidden rounded-lg   text-gray-800" >
          <br>
          <img class="object-fill mx-16 transform transition hover:scale-110 duration-300 ease-in-out"
          src="{{ asset('img/heros.png')}}" style="height:150px" />
          <h1 class="font-bold" style="font-size: 200%">Kategori</h1>
          <ul style="list-style-type:circle">
            @forelse ($kat as $row)
            <li>{{ $row->kategori }}</li>
            @empty
            <li></li>
            @endforelse
          </ul>
        </article>
      </div>
      <!-- Column -->
      
      <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-3/4">
        <!-- Article -->
        @forelse ($news as $row)
        <article class="overflow-hidden rounded-lg shadow-lg  text-gray-800">
          <img alt="Tulis" style="width: 22rem;" 
            class="block h-auto w-full mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
            src="{{ Storage::url($row->image) }}" />
          <header class="leading-tight p-2 md:p-4 text-left ">
            <h1 class="font-bold" style="font-size: 200%">{{ $row->judul }}</h1>
            <p>
              <span style="color:indianred;">Kategori : {{ $row->kateg->kategori }}</span>
              <span style="color:skyblue;float: right;">{{ $row->updated_at }}</span>
            </p>
            <p class="text-grey-darker text-sm py-4">
              {{ @$a=\Illuminate\Support\Str::limit($row->artikel, 200, '...') }}
              @if (strlen(strip_tags($row->artikel)) > 200)
                <a href="{{ url('login')}}" style="color:indianred;">Read More!</a>
              @endif
            </p>
          </header>
        </article>
        @empty
        <tr>
          <td colspan="7" class="text-center text-gray-400">
            Tidak Ada Berita
          </td>
        </tr>
        @endforelse
        <!-- END Article -->
      </div>
      
    </div>
  </div>
  <!-- Footer -->
  <footer class="text-center font-medium bg-blue-200 py-5">
    <h4>© 2021 | Desa Argakencana Kecamatan Moilong Kabupaten Banggai Sulawesi Tengah</h4>
  </footer>
  @include('sweetalert::alert')
</body>

</html>