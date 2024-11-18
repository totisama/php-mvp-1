<x-site-layout title="Articles list">
  @if(session()->has('success'))
    <div class="bg-green-200 text-green-800 p-2 mb-5">{{ session('success') }}</div>
  @endif

  <a href="{{route('user.articles.create')}}" class="bg-blue-400 px-2 py-1 rounded-xl">Create article</a>
  <ul class="max-w-4xl flex flex-col gap-5 mt-5">
    @foreach ($articles as $article)
    <li>
      {{$article->title}}
      <div class="flex">
      <a href="{{route('user.articles.edit', $article)}}" class="text-sm bg-green-300 px-1 py-2 rounded-xl">
        Edit
      </a>
      <form action="{{route('user.articles.destroy', $article)}}" method="POST">
        @method('DELETE')
        @csrf

        <button type="submit" class="text-sm bg-red-300 px-1 py-2 rounded-xl">Delete</button>
      </form>
      </div>
    </li>
  @endforeach
  </ul>
</x-site-layout>