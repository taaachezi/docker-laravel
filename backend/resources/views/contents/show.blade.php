<h1>show</h1>

<p>投稿id: {{$item["id"]}}</p>
<p>投稿内容: {{$item['content']}}</p>
<p>投稿時間: {{$item['created_at']}}</p>
<a href="{{route('edit', ['content_id' => $item['id']])}}">編集</a>
<form action="{{route('delete')}}" method="post">
	@csrf
	<input type="hidden" name="id" value="{{$item['id']}}">
	<input type="submit" value="削除">
</form>