<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function create()
    {
        $datas = Post::select('address', DB::raw('count(address)'))->groupBy('address')->get();
        // $datas = Post::select('address', 'title')->get();
        dd($datas->toArray());
        // $datas = Post::orderby('created_at', 'DESC')->paginate(3);
        return view('create', compact('datas'));
    }

    public function createpost(Request $request)
    {
        $validateRules = [
            'title' => 'required|unique:posts,title',
            'content' => 'required'
        ];
        $errorMessage = [
            'title.required' => "နာမည်လေးထည့်လေ..အော်",
            'title.unique' => "ဒါထည့်ပြီးသားကြီး နောက်တစ်ခုထပ်ထည့်",
            'content.required' => "စာကိုယ်မထည့်ပဲ ဘာသွားလုပ်မှာလဲ..တစ်ကယ်ပဲ"
        ];
        Validator::make($request->all(), $validateRules, $errorMessage)->validate();
        Post::create($this->combineRequest($request));
        return redirect('/')->with(['alertCreate' => 'ပိုစ့်ဖန်တီးပြီးပါပြီ']);
    }
    public function deletePost($id)
    {
        Post::where('id', $id)->delete();
        return redirect(route('home'))->with(['alertDelete' => "ပိုစ့်တစ်ခုဖယ်ထုတ်ခဲ့သည်"]);
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
        return redirect()->route('home')->with(['alertUpdate' => "ပိုစ့်တစ်ခုပြုပြင်ခဲ့သည်"]);
    }
    private function combineRequest($request)
    {
        return [
            'title' => $request->title,
            'content' => $request->content
        ];
    }
}
