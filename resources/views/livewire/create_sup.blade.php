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

                                <label for="fornama" class="block text-gray-700 text-sm font-bold mb-2">Nama<span style="color: red; ">*</label>

                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fornama" placeholder="Masukkan nama supplier" wire:model="nama">

                                @error('nama') <span class="text-red-500">{{ $message }}</span>@enderror

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">

                                    <label for="forno_tlp" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telepon<span style="color: red; ">*</label>

                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forno_tlp" placeholder="Masukkan no tlp supplier" wire:model="no_tlp">

                                    @error('no_tlp') <span class="text-red-500">{{ $message }}</span>@enderror

                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-start mb-2">
                            <div class="col-6">
                                 <div class="mb-4">

                                    <label for="foralamat_email" class="block text-gray-700 text-sm font-bold mb-2">Email<span style="color: red; ">*</label>

                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="foralamat_email" placeholder="Masukkan email supplier" wire:model="alamat_email">

                                    @error('alamat_email') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">

                                    <label for="foralamat_sup" class="block text-gray-700 text-sm font-bold mb-2">Alamat<span style="color: red; ">*</label>

                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="foralamat_sup" placeholder="Masukkan alamat supplier" wire:model="alamat_sup">

                                    @error('alamat_sup') <span class="text-red-500">{{ $message }}</span>@enderror

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

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