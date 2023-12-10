<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a href="/create-post">
        <button class="px-8 py-4 bg-sky-600 hover:opacity-80 rounded-xl text-white mb-12">Create a new Post</button>
      </a>
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h1 class="text-2xl mb-8 font-semibold">Posts</h1>
          <div class="grid gap-y-2">
            @foreach($posts as $post)
            <div class="bg-gray-900/50 p-8">
              <div class="mb-8">
                <a href="/post/{{$post->id}}" class="text-xl mb-2 underline">{{$post["title"]}}</a>
                <p class="text-xs mt-2">Author: {{$post->user->name}}</p>
              </div>
              <p class="pl-4">{{$post["content"]}}</p>

              @if(auth()->id() === $post->user_id)
              <div class="flex mt-20 gap-x-4">
                <a href="/edit-post/{{$post->id}}">
                  <button class="px-12 py-4 bg-emerald-600 rounded-md font-semibold hover:opacity-80">
                    Edit
                  </button>
                </a>
                <form action="/delete-post/{{$post->id}}" method="POST">
                  @csrf
                  @method("delete")
                  <button class="px-12 py-4 bg-rose-600 rounded-md font-semibold hover:opacity-80">Delete</button>
                </form>
              </div>
              @endif

            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>