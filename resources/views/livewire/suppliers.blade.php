@section('title', 'Supplier Buku')

@section('namaHal', 'Supplier Buku')
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

               

                <div class="row justify-content-between pt-2">
                    <div class="col-4">
                        <button wire:click="create" class="bg-indigo-500 hover:bg-indigo-800 text-white font-bold py-2 px-3 rounded my-2">Tambah Data <i class="fas fa-plus ml-2"></i></button>
                        @if ($isModal)
                            @include("livewire.create_sup")
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
                                <th class="px-4 py-2">Nama</th>
                                <th class="px-4 py-2">No Telepon</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Alamat</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @forelse($suppliers as $row)
                            <tr class="bg-gray-50 hover:bg-gray-200 border-b border-gray-200"> 
                                <td class="boder px-4 py-2">{{ $row -> nama}}</td>
                                <td class="boder px-4 py-2">{{ $row -> no_tlp}}</td>
                                <td class="boder px-4 py-2">{{ $row -> alamat_email}}</td>
                                <td class="boder px-4 py-2">{{ $row -> alamat_sup}}</td>
                                <td class="boder px-4 py-2">
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
                        {{$suppliers -> links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
</div>
