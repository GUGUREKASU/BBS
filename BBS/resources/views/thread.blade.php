{{-- 新規投稿 --}}
<form method="post" action="thread">
  {{ csrf_field() }}
  <p>
    新規スレ：<input type="text" name="title" value=""></input>
    <input type="submit" value="作成"></input>
  </p>

</form>

<h1>スレッド一覧</h1>
@foreach ($threads as $thread)
<div>
  <a href="{{ url('thread/'.$thread->id) }}">
    {{ $thread->title }}
    ({{ count($thread->post_list) }})
    {{ $thread->updated_at->format('Y/m/d H:i:s') }}
  </a>
</div>
@endforeach
