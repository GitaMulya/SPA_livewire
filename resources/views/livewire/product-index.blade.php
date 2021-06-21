@section('namaHal', 'Produk')
<section class="content">
    <div class="p-7">
            <div class="bg-white flex items-center rounded-full shadow-xl">
                <input  type="text" wire:model="search" placeholder="Search" class="form-control rounded-l-full w-full py-4 px-6 text-gray-700 leading-tight focus:outline-none" aria-label="Search" aria-describedby="search-addon">
                    <div class="p-4">
                        <button class="bg-indigo-500 hover:bg-indigo-800 text-white rounded-full p-2 focus:outline-none w-12 h-12 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
    </div>
    <div> 
        <div class="container mx-auto flex items-center flex-wrap">
            @foreach ($books as $book)
                <div class="w-full md:w-1/3 xl:w-1/6 p-6 flex flex-col">
                    <a href="#">
                        <img class="hover:grow hover:shadow-lg h-30" src="{{asset('storage/foto')}}/{{$book->foto}}" >
                        <div class="pt-3 flex items-center justify-between">
                            <p class="">{{ $book -> judul }}</p>
                        </div>
                        <p class="pt-1 text-gray-900">Rp {{number_format($book->harga,2,',','.')}}</p>
                    </a>
                            
                    <button wire:click="addToCart({{ $book->id }})" class="bg-indigo-500 hover:bg-indigo-800 text-white font-bold py-2 px-3 rounded my-2"><i class="fas fa-plus ml-0"></i> Keranjang</button>
                        
                </div>
            @endforeach 
        <div>
    </div>  
    {{$books -> links()}}
</section>



    