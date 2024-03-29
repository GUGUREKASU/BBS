<a href="{{ url('/')}}">スレッド一覧に戻る</a>
<h1>{{$thread->title}}</h1>

{{-- 新規投稿 --}}
<form method="post" action="{{ url('post')}}">
  {{ csrf_field() }}
  <input type="hidden" name="thread_id" value="{{$thread->id}}"></input>
  <p>
    名前：<input type="text" name="name" value=""></input>
    <input type="submit" value="投稿"></input>
  </p>
  <p>
    内容：<textarea name="content" rows="4" cols="40"></textarea>
  </p>
</form>

{{-- 投稿一覧 --}}
@foreach ($thread->post_list as $post)
{{ $post->created_at->format('Y/m/d H:i:s') }}（{{ $post->name }}）
<div>
  {{-- HTMLタグ無効化してから、改行を<br>変換  --}}
  {!! nl2br(htmlspecialchars($post->content)) !!}
</div>
@endforeach
