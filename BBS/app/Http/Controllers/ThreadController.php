<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BbsNmlTreads;

class ThreadController extends Controller
{
  // スレ一覧
  public function index()
  {
    // touchesプロパティにより、新規発言順に並べる
    $threads = BbsNmlTreads::orderBy('updated_at', 'desc')->get();
    return view('thread', compact('threads'));
  }

  // スレッドIDから投稿一覧を表示
  public function show($id)
  {
    $thread = BbsNmlTreads::findOrFail($id);
    return view('post', compact('thread'));
  }
  // 新規スレ生成
  public function store(Request $request)
  {
    $rule = [
      'title' => ['required', 'string'], // スレ名
    ];
    $this->validate($request, $rule);

    $data = $request->all();
    BbsNmlTreads::create($data);

    return redirect()->to('/thread/');
  }
}
