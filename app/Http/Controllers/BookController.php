<?php

namespace App\Http\Controllers;

use App\Enums\BookType;
use App\Models\Book;
use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {

        $limit = BOOKS_LIMIT;
        $user_id = Auth::id();

        $books = Book::query()
            ->select('books.id', 'books.title', 'type', 'user_id')
            ->where('user_id', $user_id)
            ->latest('id')
            ->paginate($limit);

        return view('user.books.index', compact('books'));
    }

    public function show(Request $request, Book $book)
    {

        return view('user.books.show', compact('book'));
    }

    public function create()
    {
        $types = BookType::asArray();
        $styles = Style::query()->oldest('id')->get(['id', 'title']);

        return view('user.books.create', compact('types', 'styles'));
    }

    public function store(Request $request)
    {


        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100', 'unique:books'],
            'styles_id' => [],
            'type_id' => ['required', 'string', 'max:100'],
        ]);

        $user_id = Auth::id();

        $title = $validated['title'];

        $styles = $validated['styles_id'];

        $type = BookType::getValue($validated['type_id']);

        $book = Book::query()->create([
            'title' => $title,
            'type' => $type,
            'user_id' => $user_id,
        ]);

        $book->getStyles()->attach($styles);

        return redirect()->route('user.books');
    }

    public function edit(Request $request, Book $book)
    {

        $types = BookType::asArray();
        $styles = Style::query()->oldest('id')->get(['id', 'title']);

        return view('user.books.edit', compact('book', 'types', 'styles'));
    }

    public function update(Request $request, Book $book)
    {

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'styles_id' => [],
            'type_id' => ['required', 'string', 'max:100'],
        ]);


        $title = $validated['title'];

        $styles = $validated['styles_id'];

        $type = BookType::getValue($validated['type_id']);

        $book->updateOrFail([

            'title' => $title,
            'type' => $type,
        ]);

        $book->getStyles()->sync($styles);

        return redirect()->route('user.books.show', $book->id);
    }

    public function delete(Book $book)
    {
        $book->deleteOrFail();
        return redirect()->route('user.books');
    }
}
