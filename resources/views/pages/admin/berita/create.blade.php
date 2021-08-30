@extends('layouts.admin')

@section('title')
Berita Baru
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Forms
      <?php print_r(@$item->judul)?>
    </h2>



    <form action="{{ route($actions, @$item->id) }} " method="POST" enctype="multipart/form-data">
      @csrf
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        @if(@$item)         
          <input type="hidden" name="id" value="{{ @$item->id }}">   
        @endif
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Judul</span>
          <input
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            type="text"  value="{{ @$item->judul }}" name="judul"></input>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Kategori</span>
          <select
            class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            name="kategori">
            <option value="">Pilih..</option>
            @foreach($items as $row)
              <option value="{{ $row->id }}" {{ @$row->id === @$item->id_kategori ? "selected" : "" }}>{{ $row->kategori }}</option>
            @endforeach
          </select>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Artikel</span>
          <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
           name="artikel">{{ @$item->artikel }}</textarea>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Status</span>
          <select
            class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            name="status">
            <option value="Y" {{ @$item->status === "Y" ? "selected" : "" }} >Aktif</option>
            <option value="N" {{ @$item->status === "N" ? "selected" : "" }} >Draf</option>
          </select>
        </label>


        <button type="submit"
          class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Simpan
        </button>
      </div>
    </form>
  </div>
</main>
@endsection