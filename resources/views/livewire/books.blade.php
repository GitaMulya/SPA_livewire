@section('title', 'Stok Buku')

@section('namaHal', 'Stok Buku')
<section class="content">
    <div class="py-2">
        <div class=" max-w-7xl mx-auto ...">
            <div class='bg-white overflow-hidden shadow-xl sm::rounded-lg px-4 py-4'>
                @if (session()->has('message'))
                <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md my-3">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message')}} </p>
                        </div>
                    </div>
                </div>
                    <!-- <div id="flash" data-flash="{{ session('message') }}"></div> -->
                @endif

                <div class="row justify-content-between">
                    <div class="col-4">
                        <button wire:click="create" class="bg-indigo-500 hover:bg-indigo-800 text-white font-bold py-2 px-3 rounded my-2">Tambah Data <i class="fas fa-plus ml-2"></i></button>
                        @if ($isModal)
                            @include("livewire.create")
                        @endif
                    </div>
                    <div class="col-4">
                        <div class="input-group col-md-4 py-2">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" wire:model="search">
                        <span class="py-0 input-group-text border-0 bg-indigo-500" id="search-addon">
                            <button class="btn bg-indigo-500" type="button">
                                <i class="fa fa-search" style="color:white"></i>
                            </button>
                        </span>
                        </div>
                    </div>
                </div>

                <div class="py-3 w-full">
                    <div class="shadow overflow-hidden rounded border-b border-gray-200">
                        <table class="table table-striped min-w-full">
                            <thead class="bg-indigo-500 text-white">
                                <tr>
                                    <th class="px-3 py-2">ISBN</th>
                                    <th class="px-2 py-2">Judul</th>
                                    <th class="px-2 py-2">Penulis</th>
                                    <!-- <th class="px-2 py-2">Kategori</th> -->
                                    <!-- <th class="px-2 py-2">Supplier</th> -->
                                    <th class="px-2 py-2">Stok</th>
                                    <th class="px-2 py-2">Harga</th>
                                    <th class="px-4 py-2">Foto</th>
                                    <th class="px-5 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse($books as $row)
                                <tr class="bg-gray-50 hover:bg-gray-200 border-b border-gray-200"> 
                                    <td class="boder px-3 py-2">{{ $row -> isbn }}</td>
                                    <td class="boder px-2 py-2">{{ $row -> judul }}</td>
                                    <td class="boder px-2 py-2">{{ $row -> penulis }}</td>
                                    <!-- <td class="boder px-2 py-2">{{ $row -> kategori->kategori}}</td> -->
                                    <!-- <td class="boder px-2 py-2">{{ $row -> supplier->nama}}</td> -->
                                    <td class="boder px-2 py-2">{{ $row -> stok }}</td>
                                    <td class="boder px-2 py-2">{{ $row -> harga }}</td>
                                    <td class="boder px-2 py-2" style="text-align:center;">
                                       <img src="{{asset('storage/foto')}}/{{$row->foto}}" width="90px"></td>
                                    <td class="boder px-2 py-2">
                                        <button wire:click="edit({{ $row -> id}})" class="bg-blue-500 hover:bg-blue-700 text-sm text-white py-2 px-3 rounded">Edit</button>
                                        <button wire:click="delete({{ $row -> id}})" class="bg-red-500 hover:bg-red-700 text-sm text-white py-2 px-2 rounded">Hapus</button>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td class="border px-4 py-2 text-center" colspan="8"> Tidak ada Data </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{$books -> links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>