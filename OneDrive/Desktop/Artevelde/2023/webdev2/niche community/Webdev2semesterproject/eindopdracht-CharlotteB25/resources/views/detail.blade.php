<x-layout>
    <x-sidebar></x-sidebar>
    <div class="flex flex-col relative flex-wrap justify-center ml-80 mt-10">

        <h1 class="flex items-center capitalize text-[30px] text-gray-800 font-bold text-center w-full">{{ $book->title }}</h1>

        <div class="flex items-start mt-5">
            <img class="flex rounded w-80 mr-5" src="{{ $book->image_url }}" alt="{{ $book->title }}">

            <div class="ml-10 mr-20 flex flex-col text-gray-800">
                <p>{{ $book->description }}</p>

                <!-- Write a Post form positioned under the description -->
                <div class="max-w-2xl mt-4 bg-white rounded shadow-md p-6 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Write a Post About This Book</h2>

                    <form action="{{ route('posts.store', ['book' => $book->slug]) }}" method="POST" class="mb-6">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-semibold mb-2">Title:</label>
                            <input type="text" name="title" id="title" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 font-semibold mb-2">Content:</label>
                            <textarea name="content" id="content" rows="6" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200">Create Post</button>
                    </form>
                </div>
            </div>
            <div class="flex justify-center mr-20">
            <form action="{{ $isFavourite ? route('books.removeFromFavourites', $book) : route('books.addToFavourites', $book) }}" method="POST">
                @csrf
                <button class="flex py-2 px-4 rounded focus:outline-none focus:shadow-outline
                    {{ $isFavourite ? 'bg-red-500 hover:bg-red-700' : 'bg-blue-500 hover:bg-blue-700' }} text-white font-bold"
                    type="submit">
                    {{ $isFavourite ? 'Remove from Favourites' : 'Add to Favourites' }}
                </button>
            </form>
        </div>
        </div>

        <!-- Favourites Button positioned next to the Write a Post form -->
       

        <!-- Display existing posts -->
        <div class="max-w-2xl mx-auto space-y-6 mt-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Posts</h1>

            @foreach ($book->posts as $post)
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-md text-gray-600">
                    <x-postItem :post="$post" />

                    <!-- Comments section -->
                    <div class="mt-6">
                        <h2 class="text-lg font-semibold text-gray-700">Comments:</h2>
                        <div class="space-y-4 mt-2 ml-4">
                            @foreach ($post->comments as $comment)
                                <div class="border border-gray-300 rounded-lg p-3 bg-gray-50">
                                    <p>{{ $comment->content }}</p>
                                </div>
                            @endforeach
                        </div>

                        <!-- Add comment -->
                        <div class="mt-6">
                            <h2 class="text-lg font-semibold text-gray-700">Add a Comment</h2>
                            <form action="{{ route('comments.store', ['book' => $book->slug, 'post' => $post->id]) }}" method="POST" class="mt-3">
                                @csrf
                                <textarea name="content" id="content" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 mb-4"></textarea>
                                <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">Add Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
