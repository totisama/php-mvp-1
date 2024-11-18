<x-site-layout title="Edit article">
  <form action="{{route('user.articles.update', $article)}}" method="post">
    @method('PUT')
    @csrf

    <div class="flex flex-col">
      <label for="title">Title</label>
      <input class="border-2" type="text" name="title" value="{{old('title', $article->title)}}" />
      @error('title') <span class="text-red-600">{{$message}}</span> @enderror
    </div>
    <div class="my-5 flex flex-col">
      <label for="content">Content</label>
      <textarea class="border-2" name="content">{{old('content', $article->content)}}</textarea>
      @error('content') <span class="text-red-600">{{$message}}</span> @enderror
    </div>
    <div>

      <button type="submit" class="bg-gray-300 py-1 px-2 rounded-xl">Update</button>
      <a href="{{route('user.articles.index')}}">Back</a>
    </div>
  </form>
</x-site-layout>