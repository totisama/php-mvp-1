<x-site-layout title="Welcome page">
  @foreach ($articles as $article)
    <div class='mt-5'>
    <h2 class="font-bold text-lg">{{ $article->title }}</h2>
    <small class="text-gray-400">{{$article->author->name}} | {{$article->published_at->format('d-m-Y')}}</small>
    <p class="text-sm">{{ $article->summary(250) }}</p>
    <ul class="list-disc pl-5">
      @foreach ($article->comments as $comment)
      <li>{{ $comment->content }}</li>
    @endforeach
    </ul>
    </div>
  @endforeach
</x-site-layout>