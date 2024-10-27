@props(['book'])
<div class="flex flex-col basis-1/6 border-gray-500 rounded border-2 m-5 p-5 ">
    <a href="/books/{{ $book->slug }}" class="flex flex-col h-full">
        <p class="flex items-center capitalize text-[18px] text-gray-700 font-bold">{{ $book->title }}</p>
        <p class="flex pb-2 mt-1 text-[12px] text-gray-700">{{ $book->author }}</p> <!-- Updated margin-top to 1 for a 5px gap -->
        <img class="flex rounded justify-center mt-auto" src="{{ $book->image_url }}" alt="{{ $book->title }}">
    </a>
</div>
