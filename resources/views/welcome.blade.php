<x-site-layout title="Welcome page">
  @foreach ($articles as $article)
    <a href="/articles/{{$article->id}}" class='mt-5'>
    <h2 class="font-bold text-lg">{{ $article->title }}</h2>
    <small class="text-gray-400">
      {{$article->author?->name ?? 'Unknown'}} |
      {{$article->published_at->format('D-M-Y')}}
    </small>
    <div>
      @foreach ($article->categories as $category)
      <span class="bg-gray-200 text-gray-800 px-2 py-1 text-xs rounded-full">{{ $category->title }}</span>
    @endforeach
    </div>
    <p class="text-sm">{{ $article->summary(250) }}</p>
    <ul class="list-disc pl-5">
      @foreach ($article->comments->take(3) as $comment)
      <li>{{ $comment->content }}</li>
    @endforeach
    </ul>
    </a>
  @endforeach
</x-site-layout>