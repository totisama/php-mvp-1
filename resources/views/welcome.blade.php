<x-site-layout title="Welcome page">
  @foreach ($articles as $article)
    <div class='mt-5'>
    <h2 class="font-bold text-lg">{{ $article->title }}</h2>
    <small class="text-gray-400">{{$article->author_name}} | {{$article->published_at->format('d-m-Y')}}</small>
    <p class="text-sm">{{ $article->summary(100) }}</p>
    </div>
  @endforeach
</x-site-layout>