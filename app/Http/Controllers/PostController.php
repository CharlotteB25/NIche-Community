<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Book;

class PostController extends Controller
{

    public function store(Request $request, Book $book)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new post
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->book_id = $book->id; // Associate the post with the book
        $post->user_id = auth()->id(); // Associate the post with the user
        $post->save();

        // Redirect back to the book detail page
        return redirect()->route('books.show', $book->slug)->with('success', 'Post created successfully.');
    }
}
