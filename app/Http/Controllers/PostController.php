<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function create()
    {
        // $datas = Post::paginate(4);
        $datas = Post::when(request('search'), function () {
            return  Post::orwhere('title', 'like', '%' . request('search') . '%')
                ->orwhere('content', 'like', '%' . request('search') . '%');
        })->orderby('updated_at', 'desc')->paginate(4);
        return view('create', compact('datas'));
    }

    public function createpost(Request $request)
    {

        $validateRules = [
            'title' => 'required|unique:posts,title',
            'content' => 'required',
            'address' => 'required',
            'price' => 'required',
            'rating' => 'required',
            'image_url' =>  'mimes:png,jpg,jpeg'
        ];
        $errorMessage = [
            'title.required' => "နာမည်လေးထည့်လေ..အော်",
            'title.unique' => "ဒါထည့်ပြီးသားကြီး နောက်တစ်ခုထပ်ထည့်",
            'content.required' => "စာကိုယ်မထည့်ပဲ ဘာသွားလုပ်မှာလဲ..တစ်ကယ်ပဲ",
            'address.required' => "မြို့လိပ်စာလေးထည့်ပါဦး",
            'price.required' => "အမောက်လေးထည့်ပါဦး",
            'rating.required' => "အမှတ်လေးပေးပါ",
            'image_url.mimes' => "png,jpg,jpeg ပဲထည့်ပါဟ"
        ];
        Validator::make($request->all(), $validateRules, $errorMessage)->validate();
        $fileName = '';
        if ($request->hasFile('image_url')) {
            $fileName = uniqid() . $request->file('image_url')->getClientOriginalName();
            $request->file('image_url')->storeAs('public', $fileName);
        }
        Post::create($this->combineRequest($request, $fileName));
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
        $fileName = '';
        $oldImgPath = Post::find($request['id'])->toArray()['image_url'];
        if ($request->hasFile('image_url')) {
            $fileName = uniqid() . $request->file('image_url')->getClientOriginalName();
            $request->file('image_url')->storeAs('public', $fileName);
            Storage::delete('public/' . $oldImgPath);
        } else {
            $fileName = $oldImgPath;
        }
        $accepted_data = Post::find($request['id'])->toArray();
        $modify_array = $this->combineRequest($request, $fileName);
        Post::find($accepted_data['id'])->update($modify_array);
        return redirect()->route('home')->with(['alertUpdate' => "ပိုစ့်တစ်ခုပြုပြင်ခဲ့သည်"]);
    }
    private function combineRequest($request, $fileName = null)
    {

        return [
            'title' => $request->title,
            'content' => $request->content,
            'address' => $request->address,
            'price' => $request->price,
            'rating' => $request->rating,
            'image_url' =>  $fileName
        ];
    }
}
