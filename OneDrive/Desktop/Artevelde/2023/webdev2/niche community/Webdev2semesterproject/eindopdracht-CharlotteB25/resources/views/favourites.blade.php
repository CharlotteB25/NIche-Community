<x-layout>

<x-sidebar></x-sidebar>

<div class="flex flex-row flex-wrap justify-center ml-80 mt-10">
    <h1 class="capitalize text-[30px] text-gray-00 font-bold mb-5">Favourites</h1>
</div>

<div class="flex flex-row flex-wrap justify-center ml-80 mt-10">
    @foreach ($books as $book)
        <x-favourite-book-card :book="$book"/>
    @endforeach
</div>

</x-layout>