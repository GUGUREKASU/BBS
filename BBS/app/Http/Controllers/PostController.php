<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BbsNmlPosts;

class PostController extends Controller
{
  public function store(Request $request)
  {
    $rule = [
      'thread_id' => ['required'], // スレッドID
      'content' => ['required', 'string'], // 投稿内容
    ];
    $this->validate($request, $rule);


    $data = $request->all();
    if(empty($data['name'])){
      $data['name'] = '名無し';
    }

    BbsNmlPosts::create($data);

    return redirect()->to('/thread/' . $data['thread_id']);
  }
}
