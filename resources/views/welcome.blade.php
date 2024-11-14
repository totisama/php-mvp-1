<x-site-layout title="Welcome page">
  hello class
  @foreach ($articles as $article)
    <div>
    <h2>{{ $article->title }}</h2>
    <small>{{$article->author_name}} | {{\Carbon\Carbon::parse($article->published_at)->toDateString()}}</small>
    <p>{{ $article->content }}</p>
    </div>
  @endforeach
</x-site-layout>