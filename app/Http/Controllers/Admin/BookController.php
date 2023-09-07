<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BookType;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookStyle;
use App\Models\Style;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
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
            ->select('books.id', 'books.title', 'type', 'users.name', 'books.created_at')
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

        return view('admin.books.index', compact('books', 'styles', 'authors'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $book)
    {
        $book = Book::query()
        ->join('users', 'users.id', '=', 'books.user_id')
        ->findOrFail($book, ['books.id' , 'title', 'users.name as author' ,'type']);

        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = BookType::asArray();
        $styles = Style::query()->oldest('id')->get(['id', 'title']);
        $authors = User::query()->oldest('id')->get(['id', 'name']);

        return view('admin.books.create', compact('types', 'styles', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100' , 'unique:books'],
            'styles_id' => [],
            'type_id' => ['required', 'string', 'max:100'],
            'author_id' => ['required', 'integer', 'max:100'],
        ]);


        $author_id = $validated['author_id'];

        $title = $validated['title'];

        $styles = $validated['styles_id'];

        $type = BookType::getValue($validated['type_id']);

        $book = Book::query()->create([
            'title' => $title,
            'type' => $type,
            'user_id' => $author_id,
        ]);

        $book->getStyles()->attach($styles);

        return redirect()->route('admin.books.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $types = BookType::asArray();
        $styles = Style::query()->oldest('id')->get(['id', 'title']);
        $authors = User::query()->oldest('id')->get(['id', 'name']);

        return view('admin.books.edit', compact('book', 'types', 'styles', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'styles_id' => [],
            'type_id' => ['required', 'string', 'max:100'],
            'author_id' => ['required', 'integer', 'max:100'],
        ]);


        $title = $validated['title'];

        $styles = $validated['styles_id'];

        $type = BookType::getValue($validated['type_id']);

        $author_id = $validated['author_id'];

        $book->updateOrFail([

            'title' => $title,
            'type' => $type,
            'user_id' => $author_id,
        ]);

        $book->getStyles()->sync($styles);

        return redirect()->route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->deleteOrFail();
        return redirect()->route('admin.books.index');
    }
}
