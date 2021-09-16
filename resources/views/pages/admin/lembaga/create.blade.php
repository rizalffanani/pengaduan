@extends('layouts.admin')

@section('title')
Lembaga Desa
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Forms
    </h2>
     @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }} </li>
        @endforeach
      </ul>
    </div>
    @endif
    <form action="{{ route($actions, @$item->id) }} " method="POST" >
      @csrf
      <input type="hidden" name="id_user" value="{{ Auth::user()->id}}">

      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        @if(@$item)   
          @method('PUT')        
        @endif
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Nama Lembaga</span>
          <input
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            type="text"  value="{{ @$item->nama_lembaga }}" name="nama_lembaga"></input>
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