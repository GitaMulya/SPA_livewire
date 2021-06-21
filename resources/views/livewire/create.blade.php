<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">

            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>?

        <div class="inline-block align-start bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="row justify-content-start mb-2">
                            <div class="col-6">
                                <div class="mb-4">

                                <label for="forisbn" class="block text-gray-700 text-sm font-bold mb-2">ISBN<span style="color: red; ">*</label>

                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forisbn" placeholder="Masukkan ISBN buku" wire:model="isbn">

                                @error('isbn') <span class="text-red-500">{{ $message }}</span>@enderror

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">

                                    <label for="forjudul" class="block text-gray-700 text-sm font-bold mb-2">Judul<span style="color: red; ">*</label>

                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forjudul" placeholder="Masukkan judul buku" wire:model="judul">

                                    @error('judul') <span class="text-red-500">{{ $message }}</span>@enderror

                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-start mb-2">
                            <div class="col-6">
                                 <div class="mb-4">

                                    <label for="forpenulis" class="block text-gray-700 text-sm font-bold mb-2">Penulis<span style="color: red; ">*</label>

                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forpenulis" placeholder="Masukkan penulis buku" wire:model="penulis">

                                    @error('penulis') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">

                                    <label for="forpenerbit" class="block text-gray-700 text-sm font-bold mb-2">Penerbit<span style="color: red; ">*</label>

                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forpenerbit" placeholder="Masukkan penerbit buku" wire:model="penerbit">

                                    @error('penerbit') <span class="text-red-500">{{ $message }}</span>@enderror

                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-start mb-2">
                            <div class="col-6">
                                <div class="mb-4">
                                    <label for="forkategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori<span style="color: red; ">*</label>
                                    <select class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="kategori_id" id="kategori_id" wire:model="kategori_id">Kategori
                                        <option disabled value>Pilih Kategori Buku</option>
                                         @foreach ($kats as $item)
                                        <option value="{{$item->id}}">{{$item->kategori}}</option>
                                         @endforeach
                                    </select> 
                                    @error('kategori_id') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">
                                    <label for="forsupplier_id" class="block text-gray-700 text-sm font-bold mb-2">Supplier<span style="color: red; ">*</label>
                                    <select class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="supplier_id" id="supplier_id" wire:model="supplier_id">Supplier
                                        <option disabled value>Pilih Supplier Buku</option>
                                         @foreach ($sups as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                         @endforeach
                                    </select> 
                                    @error('supplier_id') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-start mb-2">
                            <div class="col-6">
                                <div class="mb-4">

                                    <label for="forstok" class="block text-gray-700 text-sm font-bold mb-2">Stok<span style="color: red; ">*</label>

                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forstok" placeholder="Masukkan stok buku" wire:model="stok">

                                    @error('stok') <span class="text-red-500">{{ $message }}</span>@enderror

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">

                                    <label for="forharga" class="block text-gray-700 text-sm font-bold mb-2">Harga<span style="color: red; ">*</label>

                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forharga" placeholder="Masukkan harga buku" wire:model="harga">

                                    @error('harga') <span class="text-red-500">{{ $message }}</span>@enderror

                                </div>
                            </div>
                        </div>
                        <div class="mb-4">

                            <label for="forfoto" class="block text-gray-700 text-sm font-bold mb-2">Foto<span style="color: red; ">*</label>

                            <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forfoto" placeholder="Masukkan foto buku" wire:model="foto">

                            @error('foto') <span class="text-red-500">{{ $message }}</span>@enderror

                        </div>
                        <div class="mb-4">

                            <label for="forsinopsis" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi<span style="color: red; ">*</label>

                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forsinopsis" placeholder="Masukkan sinopsis buku" wire:model="sinopsis">

                            @error('sinopsis') <span class="text-red-500">{{ $message }}</span>@enderror

                        </div>

                    </div>

                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-4 sm:flex sm:flex-row-reverse">

                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:ml-3 sm:w-auto">

                        <button wire:click.prevent="store()" type="button" class="bg-blue-500 hover:bg-blue-700 text-sm text-white py-2 px-2 rounded">

                        Simpan

                        </button>

                    </span>

                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                        <button wire:click="closeModal()" type="button" class="bg-red-500 hover:bg-red-700 text-sm text-white py-2 px-3 rounded">

                         Batal

                        </button>

                    </span>

                </div>

            </form>

        </div>

    </div>

</div>