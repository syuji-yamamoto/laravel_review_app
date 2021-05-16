<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; # Eloquentを使用するコード
use App\Models\Book; # Eloquentを使用するコード
use App\Http\Requests\BookRequest;
use Validator; # Validatorを使用するコード

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $books = Book::orderBy('id', 'desc')->get();
        return view('book.index', ['books' => $books, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $validated = $request->validated();
        $image = $request->image;
        if ($image) {
            //一意のファイル名を自動生成しつつ保存し、かつファイルパス（$productImagePath）を生成
            //ここでstore()メソッドを使っているが、これは画像データをstorageに保存している
            $image_path = $image->store('public/uploads'); //storage/app/public/uploadsに保存される
        } else {
            $image_path = "";
        }
        $book = new Book;
        $book->title = $request->title;
        $book->contents = $request->contents;
        $book->image = $image_path;
        $book->user_id = auth()->id();
        $book->save();
        return redirect('/')->with($validated);

        // 下記のコメントアウトは画像アップロード機能で試したコード
        // if ( $request->file("image") !== null ){
        //     $filename = $request->file("image")->store("uploads", "public");
        //     if ($filename) {
        //         $book->image = basename($filename);
        //         $book->image_path = basename($filename);
        //         \Log::debug(basename($filename));
        //         \Log::debug("画像セットOK");
        //     }
        // }
        // else{
        //     $book->image = ""; 
        //     \Log::debug("画像はありません");
        // }


        // imageとimage_pathをDBのテーブルに作成して行う画像のアップロード方法
        // やり方が少し古いかもしれない

        // $upload_image = $request->file('image');
        // dd($request->file('image'));
		// if($upload_image) {
		// 	//アップロードされた画像を保存する
		// 	$path = $upload_image->store('images',"public");
		// 	//画像の保存に成功したらDBに記録する
		// 	if($path){
		// 		Book::create([
		// 			"image" => $upload_image->getClientOriginalName(),
		// 			"image_path" => $path
		// 		]);
		// 	}
		// }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        if (\Auth::user()->id === $book->user_id) {
            return view('book.edit', ['book' => $book]);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [
            'title' => $request->title,
            'contents' => $request->contents
        ];
        Book::find($id)->update($update);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $book = Book::find($id);
        if (\Auth::user()->id === $book->user_id) {
            $book->delete();
            return redirect('/');
        }else{
            return redirect()->back();
        }
    }
}
