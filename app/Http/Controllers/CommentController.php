<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, Book $book, Post $post)
    {
        // Validate the request
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        // Create a new comment
        $comment = new Comment();
        $comment->content = $validatedData['content'];
        
        $comment->post_id = $post->id; // Associate the post with the book
        $comment->user_id = auth()->id(); // Associate the post with the user
        $comment->save();

        // Redirect back to the book detail page
        return redirect()->route('books.show', $book->slug)->with('success', 'Comment created successfully.');
    }
}
