<h1>index</h1>

@foreach ($items as $item)
    <hr>
    <p>{{$item['content']}}</p>
    <a href="{{route('show', ['content_id' => $item['id']])}}">詳細</a>
    <a href="{{route('edit', ['content_id' => $item['id']])}}">編集</a>
@endforeach