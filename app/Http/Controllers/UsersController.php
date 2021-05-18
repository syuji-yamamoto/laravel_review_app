<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;

class UsersController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $books = Book::where('user_id', $user->id)->get();
        return view('users.show', ['user' => $user, 'books' => $books]);
    }
    
}
