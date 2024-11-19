<x-site-layout title="Create article">
  <form action="{{route('user.articles.store')}}" method="post" class="w-2/3 border border-gray-300 p-4">
    @csrf

    <x-form-text name="title" label="Title" />

    <div class="my-5 flex flex-col">
      <label class="block text-xs font-semibold uppercase" for="content">Content</label>
      <textarea class="w-2/3 p-1 rounded-lg border border-gray-200 @error('title') border-red-500 @enderror"
        name="content">{{old('content')}}</textarea>
      @error('content') <span class="text-red-600">{{$message}}</span> @enderror
    </div>

    <div class="w-full flex justify-end gap-x-8">
      <button type="submit"
        class="text-xs text-green-700 bg-green-300 hover:bg-green-200 px-4 py-2 rounded uppercase">Create</button>
      <a class="text-xs text-gray-700 bg-gray-300 hover:bg-gray-200 px-4 py-2 rounded uppercase"
        href="{{route('user.articles.index')}}">Back</a>
    </div>
  </form>
</x-site-layout>