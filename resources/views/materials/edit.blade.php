<x-layout>

    <form action="{{ route('materials.update', $material['id']) }}" method="post" class="max-w-sm mx-auto">
        @csrf
        @method('PUT')
        {{-- judul --}}
        <div class="mb-5">
            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Materi</label>
            <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Routing...."
            autocomplete="off"
            value="{{ $material['judul'] }}"
            required />
        </div>
        {{-- Kursus --}}
        <div class="mb-5">
            <label for="kursus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kursus</label>
            <select id="kursus" name="course_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($courses as $course)
                    <option value="{{ $course['id'] }}"
                    @if($material->course['id'] == $course['id'])
                        {{ 'selected' }}
                    @endif
                    >
                        {{ $course['judul'] }}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- deskripsi --}}
        <div class="mb-5">
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $material['deskripsi'] }}</textarea>
        </div>
        {{-- link_embed --}}
        <div class="mb-5">
          <label for="link_embed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">link_embed</label>
          <input type="text" name="link_embed" id="link_embed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="masukkan link embed"
          autocomplete="off"
          value="{{ $material['link_embed'] }}"
          required />
        </div>

        <a href="{{ url()->previous() }}" class="text-blue-600 text-sm hover:underline ">&laquo; kembali</a>
        <button type="submit" class="float-end text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</x-layout>
