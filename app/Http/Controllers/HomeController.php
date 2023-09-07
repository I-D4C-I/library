<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookStyle;
use App\Models\Style;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'style' => ['nullable', 'string', 'max:100'],
            'author' => ['nullable', 'integer', 'max:100'],
        ]);

        $search = $validated['search'] ?? '';
        $style = $validated['style'] ?? '';
        $author = $validated['author'] ?? '';

        $limit = ADMIN_LIMIT;

        $books_ids = [];
        if (!empty($style)) {
            $books_ids = BookStyle::query()
                ->join('styles', 'style_id', '=', 'styles.id')
                ->where('style_id', $style)
                ->get('book_id')
                ->toArray();
        }

        $books = Book::query()
            ->join('users', 'users.id', '=', 'books.user_id')
            ->select('books.id', 'books.title', 'type', 'users.name')
            ->where('books.title', 'like', "%{$search}%")
            ->when($author, function ($query) use ($author) {
                return $query->where('user_id', "{$author}");
            })
            ->when($style, function ($query) use ($books_ids) {
                return $query->whereIn('books.id', $books_ids);
            })
            ->latest('id')
            ->paginate($limit);

        $styles = Style::getStyles();
        $authors = User::getAuthors();

        return view('home.index', compact('books', 'styles', 'authors'));
    }

    public function show(Request $request, $book) {

        $book = Book::query()
        ->join('users', 'users.id', '=', 'books.user_id')
        ->findOrFail($book, ['books.id' , 'title', 'users.name as name' ,'type']);

        return view('home.show', compact('book'));
    }
}
