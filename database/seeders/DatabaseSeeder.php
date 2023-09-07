<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdminUser;
use App\Models\Book;
use App\Models\Style;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(RECORD_LIMIT)->create();
        Style::factory(RECORD_LIMIT)->create();
        $books = Book::factory(RECORD_LIMIT)->create();


        //По какой-то прочине если установить $styles = ...-> create(), то переменная будет пустой.
        //При том, что эта схема работет с книгами.
        //Приходится еще раз обращаться в базу, чтобы вытянуть жанры.
        $styles = Style::all();

        foreach ($books as $book) {
            $style_id = $styles->random(rand(0,5))->pluck('id');
            $book->getStyles()->attach($style_id);
        }

        AdminUser::factory(SINGLE_UNIT)->create([
            'email' => "admin@mail.ru",
            'password' => bcrypt('12345678'),
        ]);

    }
}
