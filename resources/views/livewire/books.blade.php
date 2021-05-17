<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Stok Buku</h2>
</x-slot>

<div class="py-12">
    <div class=" max-w-7xl mx-auto ...">
        <div class='bg-white overflow-hidden shadow-xl sm::rounded-lg px-4 py-4'>
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message')}} </p>
                    </div>
                </div>
            </div>
            @endif

            <button wire:click="create" class="bg-indigo-500 hover:bg-indigo-500 text-white font-bold py-2 px-2 rounded my-2"> Tambah Data</button>
            @if ($isModal)
                @include("livewire.create")
            @endif

            <table class='table-fixed w-full'>
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">ISBN</th>
                        <th class="px-4 py-2">Judul</th>
                        <th class="px-4 py-2">Penulis</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Stok</th>
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $row)
                    <tr>
                        <td class="boder px-4 py-2">{{ $row -> isbn }}</td>
                        <td class="boder px-4 py-2">{{ $row -> judul }}</td>
                        <td class="boder px-4 py-2">{{ $row -> penulis }}</td>
                        <td class="boder px-4 py-2">{{ $row -> kategori }}</td>
                        <td class="boder px-4 py-2">{{ $row -> stok }}</td>
                        <td class="boder px-4 py-2">{{ $row -> harga }}</td>
                        <td class="boder px-4 py-2">
                            <button wire:click="edit({{ $row -> id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $row -> id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="8"> Tidak ada Data </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
