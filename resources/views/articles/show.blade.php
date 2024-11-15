<x-site-layout title="{{$article->title}}">
  <div class="max-w-4xl flex flex-col gap-5">
    <a class="bg-gray-300 w-fit px-2 py-1 rounded-lg font-bold transition duration-300 hover:scale-110"
      href="{{route('welcome')}}">Back</a>
    <p class="text-xl">
      {{$article->content}}
    </p>
  </div>
</x-site-layout>