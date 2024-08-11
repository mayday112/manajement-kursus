<x-layout>

    <form action="{{ route('courses.store') }}" method="post" class="max-w-sm mx-auto">
        @csrf
        {{-- Judul --}}
        <div class="mb-5">
            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kursus</label>
            <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Kursus Laravel 15..." autocomplete="off" required />
        </div>
        {{-- Deskripsi --}}
        <div class="mb-5">
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
            {{-- <input type="text" name="deskripsi" id="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lorem ipsum dolor sit amet....." autocomplete="off" required /> --}}
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
        </div>
        {{-- Durasi --}}
        <div class="mb-5">
          <label for="durasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi</label>
          <input type="number" name="durasi" id="durasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="masukkan dalam angka..." min="1" max="100" autocomplete="off" required />
          <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Masukkan angka saja, contoh : 1, 2, atau 3...</p>
          <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Durasi dalam bentuk bulan</p>
        </div>

        <a href="/" class="text-blue-600 text-sm hover:underline ">&laquo; kembali</a>
        <button type="submit" class="float-end text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</x-layout>
