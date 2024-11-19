<x-site-layout title="Edit article">

  <form action="{{route('user.articles.update', $article)}}" method="post" class="w-2/3 border border-gray-300 p-4">
    @method('PUT')
    @csrf

    <x-form-text name="title" label="Title" value="{{$article->title}}" />

    <br /><br />

    <label for="content" class="block text-xs font-semibold uppercase">Content</label>
    <textarea name="content"
      class="w-full p-1 rounded-lg border border-gray-200 @error('content') border-red-500 @enderror"
      rows="5">{{old('content', $article->content)}}</textarea>
    @error('content')
    <div class="text-red-500 text-xs">{{$message}}</div> @enderror

    <br /><br />

    <select class="w-full p-1 rounded-lg border border-gray-200 @error('author_id') border-red-500 @enderror"
      name="author_id">
      @foreach (\App\Models\User::all()->pluck('name', 'id') as $key => $name)
      <option value="{{$key}}" {{old('author_id', $article->author_id == $key ? 'selected' : '')}}>{{$name}}</option>
      @endforeach
    </select>

    <br /><br />

    <div class="w-full flex justify-end gap-x-8">
      <a href="{{route('user.articles.index')}}"
        class="text-xs text-gray-700 bg-gray-300 hover:bg-gray-200 px-4 py-2 rounded uppercase">Back</a>
      <button type="submit"
        class="text-xs text-green-700 bg-green-300 hover:bg-green-200 px-4 py-2 rounded uppercase">Save changes</button>
    </div>
  </form>

</x-site-layout>