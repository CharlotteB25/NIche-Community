<?php

namespace App\Http\Controllers;

use App\Models\BookUser;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookUserController extends Controller
{
    public function favourites(Request $request)
    {
        $user_id = Auth::id();

        // Retrieve the search query from the request
        $search = $request->input('search');

        // Query the favourite books for the user
        $book_users = BookUser::where('user_id', $user_id)
            ->with(['book' => function ($query) use ($search) {
                if ($search) {
                    $query->where('title', 'like', '%' . $search . '%');
                }
            }])
            ->get();

        // Extract the books from the BookUser relations
        $books = $book_users->pluck('book')->filter();

        return view('favourites', [
            'books' => $books,
            'search' => $search
        ]);
    }
}
