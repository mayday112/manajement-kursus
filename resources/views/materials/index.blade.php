<x-layout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <span class="text-gray-700 bg-gray-300 rounded px-2">Materi</span>
                <a href="{{ route('courses.index') }}" class="hover:underline hover:text-blue-600 ">Kursus</a>
                <p class="my-5 text-sm font-normal text-gray-500  dark:text-gray-400">
                    <a href="{{ route('materials.create') }}" class="text-white float-end bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">tambah ++</a>
                </p>
                <div class="mt-20">
                    {{ $materials->links() }}
                </div>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Materi
                    </th>
                    <th>
                        Nama Kursus
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        link_embed
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($materials as $material)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $material['judul'] }}
                        </th>
                        <th>
                            {{ $material->course->judul }}
                        </th>
                        <td class="px-6 py-4">
                            {{ Str::limit($material['deskripsi'],50) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ Str::limit($material['link_embed'],20) }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <form class="block w-full" onsubmit=' return confirm("Apakah anda Yakin?")' action="{{ route('materials.destroy', $material['id']) }}" method="POST">
                                <a href="{{ route('materials.edit', $material['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" >Edit</a>
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
                            <h3 class="text-gray-700 font-semibold text-2xl">Kursus kosong....</h3>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</x-layout>
