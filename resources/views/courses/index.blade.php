<x-layout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption class="p-5  text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <span class="text-gray-700 bg-gray-300 rounded px-2">Kursus</span>
                <a href="{{ route('materials.index') }}" class="hover:underline hover:text-blue-600">Materi</a>
                <p class="my-5 text-sm font-normal text-gray-500 float-end dark:text-gray-400">
                    <a href="{{ route('courses.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">tambah ++</a>
                </p>
                <div class="mt-20">
                    {{ $datas->links() }}
                </div>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Kursus
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Durasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ke materi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $data['judul'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ Str::limit($data['deskripsi'], 50) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data['durasi'] . ' bulan' }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('courses.show', $data['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ke materi {{ $data['judul'] }}</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            {{-- <a href="{{ route('courses.destroy', $data['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick=' return confirm("Apakah anda Yakin?")'>Hapus</a> --}}
                            <form class="block w-full" onsubmit=' return confirm("Apakah anda Yakin?")' action="{{ route('courses.destroy', $data['id']) }}" method="POST">
                                <a href="{{ route('courses.edit', $data['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" >Edit</a>
                                @csrf
                                @method('DELETE')
                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td>
                        <div class="py-5 px-3">
                            <h3 class="text-gray-700 font-semibold text-2xl">Kursus kosong</h3>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if (isset($message))
        {{ $message }}
    @endif
</x-layout>
