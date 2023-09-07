<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $order = $request->input('order_id') ?? 'asc';
        $limit = ADMIN_LIMIT;

        $users = User::query()
            ->select('id', 'name', 'email', 'created_at')
            ->orderBy('id', $order)
            ->paginate($limit);
        $books = Book::query()
        ->selectRaw('user_id, COUNT(id) as books')
        ->groupBy('user_id')
        ->get()
        ->toArray();

        return view('admin.users.index', compact('users', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required','string', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'max:100'],
        ]);

        $name = $validated['name'];
        $email = $validated['email'];
        $password = $validated['password'];

        User::query()->create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        return redirect()->route('admin.users.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required','string', 'max:100'],
            'password' => ['required', 'string', 'max:100'],
        ]);

        $name = $validated['name'];
        $email = $validated['email'];
        $password = $validated['password'];

        $user->updateOrFail([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->deleteOrFail();
        return redirect()->route('admin.users.index');
    }
}
