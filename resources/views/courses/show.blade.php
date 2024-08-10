<x-layout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <p class="my-1 text-sm font-normal text-gray-500  dark:text-gray-400">
                    <a href="{{ route('courses.index') }}" class="text-blue-600 text-sm hover:underline ">&laquo; kembali ke course</a>
                </p>
                Materi : {{ $course['judul'] }}
                <p class="text-base font-semibold mt-1 text-gray-500">
                    {{ $course['deskripsi'] }}
                </p>
                <div class="mt-3">
                    {{ $datas->links() }}
                </div>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Materi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        link
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
                            {{ Str::limit($data['deskripsi'],50) }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ $data['link'] }}" class="text-sm text-blue-600 hover:underline" target="_blank">{{ Str::limit($data['link'],20) }}</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <form class="block w-full" onsubmit=' return confirm("Apakah anda Yakin?")' action="{{ route('materials.destroy', $data['id']) }}" method="POST">
                                <a href="{{ route('materials.edit', $data['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" >Edit</a>
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
