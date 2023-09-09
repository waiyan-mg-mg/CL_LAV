<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        $datas = Post::all()->toArray();
        return view('create', compact('datas'));
    }

    public function createpost(Request $request)
    {
        Post::create($this->combineRequest($request));
        return redirect('/');
    }


    private function combineRequest($request)
    {
        return [
            'title' => $request->title,
            'content' => $request->content
        ];
    }
}
