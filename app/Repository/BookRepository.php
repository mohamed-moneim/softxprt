<?php

namespace App\Repository;

use App\Repository\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookRepository implements BookRepositoryInterface
{

    public function allBooks()
    {
        return Book::latest()->paginate(10);
    }

    public function storeBook($data)
    {
        $Book = new  Book();
        $Book->title = $data->title;
        $Book->author = $data->author;
        return $Book->save();
    }

    public function findBook($id)
    {
        return Book::find($id);
    }

    public function updateBook($data, $id)
    {
        if (Auth::user()->can('admin')){
        $Book = Book::where('id', $id)->first();
        $Book->title = $data->title;
        $Book->author = $data->author;
        $Book->save();
        }
    }

    public function destroyBook($id)
    {
        if (Auth::user()->can('admin')){
        $category = Book::find($id);
        $category->delete();
    }
    }
}
