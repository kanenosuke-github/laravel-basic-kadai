<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        $posts = DB::table('posts')->get();

        return view('posts.index',compact('posts'));//view名を指定
    }

    public function show($id) {
        $post = Post::find($id);

        if(!$post){
            abort(404,'Post not found');
        }
    
        return view('posts.show',compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        // バリデーションを設定する
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required|max:200'
        ]);

        // フォームの入力内容をもとに、テーブルにデータを追加する
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        // リダイレクトさせる
        return redirect("/posts/{$post->id}");
    }      
}


