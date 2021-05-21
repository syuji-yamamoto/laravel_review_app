<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\User;
use App\Models\Book;
use Validator;

class CommentsController extends Controller
{
    /**
     * バリデーション、登録データの整形など
     */
    public function store(CommentRequest $request)
    {
        $savedata = [
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'comment' => $request->comment,
        ];

        $comment = new Comment;
        $comment->fill($savedata)->save();

        return redirect()->route('book.show', [$savedata['book_id']]);
    }

    public function ajaxComment(Request $request)
    {
        $comment = new Comment;
        $comment->user_id = auth()->id();
        $comment->book_id = $request->book_id;
        $comment->comment = $request->comment;
        $comment->save();

        $result = $request->all();
        return $result;
    }
}
