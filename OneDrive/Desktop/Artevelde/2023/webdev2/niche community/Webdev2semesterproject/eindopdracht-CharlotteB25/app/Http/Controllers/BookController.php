<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\QueryBuilders\BookQueryBuilder;
use Illuminate\Support\Facades\DB;
use App\Models\BookUser;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

    public function index()
    {

        $search = request('search');

        $querybuilder = new BookQueryBuilder();


        if($search) {
            $querybuilder->whereContentLike($search);
        }

        $books = $querybuilder->get(20);
        
        return view('index', [
        'books' => $books
        ]);
}
    

public function profile(BookUser $user_id)
{
    return view('profile', [

        'user' => $user_id
    ]);
}


public function show(Book $book)
{
    $book = Book::with('posts')->find($book->id);

    $buttonData = $this->showButton($book);

    $addToFavourites = ['addToFavourites' => true];
    $removeFromFavourites = ['removeFromFavourites' => true];

    return view('detail', [
        'book' => $book,
        'isFavourite' => $buttonData['isFavourite'],
        'addToFavourites' => $addToFavourites['addToFavourites'],
        'removeFromFavourites' => $removeFromFavourites['removeFromFavourites']
    ]);
}


public function addToFavourites(Request $request, Book $book)
{
    $user = Auth::user();

    // Check if the book is already in the user's favourites
    $existingBookUser = BookUser::where('user_id', $user->id)
                                ->where('book_id', $book->id)
                                ->first();

    if ($existingBookUser) {
        return back()->with('error', 'Book is already in your favourites!');
    }

    $bookUser = new BookUser();
    $bookUser->user_id = $user->id;
    $bookUser->book_id = $book->id;
    $bookUser->save();
    return back()->with('success', 'Book added to favourites!');
}

public function removeFromFavourites(Request $request, Book $book)
{
    $user = Auth::user();

    $bookUser = BookUser::where('user_id', $user->id)
                        ->where('book_id', $book->id)
                        ->first();

    if (!$bookUser) {
        return back()->with('error', 'Book is not in your favourites!');
    }

    $bookUser->delete();
    return back()->with('success', 'Book removed from favourites!');
}

public function showButton(Book $book)
{
    $user = Auth::user();
    $isFavourite = BookUser::where('user_id', $user->id)
                            ->where('book_id', $book->id)
                            ->exists();

    return view('detail', ['book' => $book, 'isFavourite' => $isFavourite]);
}

}