<x-layout>

<x-sidebar></x-sidebar>

<div class="flex flex-col items-center mt-10">
    <h1 class="flex items-center capitalize text-[32px] text-gray-700 font-bold ml-40">Books</h1>
    <div class="flex flex-row flex-wrap justify-center ml-72 mr-5">
        <!-- want to make the whole box clickable for the link -->
        @foreach ($books as $book)
            <x-book-card :book="$book"/>
        @endforeach
    </div>
    <div class="mt-5">{{ $books->links() }}</div>
</div>

</x-layout>
