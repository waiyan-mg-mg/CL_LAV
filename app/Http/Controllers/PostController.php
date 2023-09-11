<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        $datas = Post::orderby('created_at', 'DESC')->get()->toArray();
        return view('create', compact('datas'));
    }

    public function createpost(Request $request)
    {
        Post::create($this->combineRequest($request));
        return redirect('/');
    }
    public function deletePost($id)
    {
        Post::where('id', $id)->delete();
        return redirect(route('home'));
    }
    public function readPost($id)
    {
        $singleData = Post::find($id)->toArray();
        return view('read', compact('singleData'));
    }

    public function updatePost($id)
    {
        $new = Post::find($id)->toArray();

        return view('update', compact('new'));
    }

    public function postUpdated(Request $request)
    {
        $accepted_data = Post::find($request['id'])->toArray();
        $modify_array = $this->combineRequest($request);
        Post::find($accepted_data['id'])->update($modify_array);
        return redirect()->route('home');
    }
    private function combineRequest($request)
    {
        return [
            'title' => $request->title,
            'content' => $request->content
        ];
    }
}
