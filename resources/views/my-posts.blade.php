<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('My Posts') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h1 class="text-2xl mb-8 font-semibold">My Posts</h1>
          <div class="grid gap-y-2">
            @forelse(auth()->user()->userPosts as $post)
            <div class="bg-gray-900/50 p-8">
              <h3 class="text-xl mb-2">{{$post["title"]}}, {{$post["user_id"]}}</h3>
              <p class="pl-4">{{$post["content"]}}</p>
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
            </div>
            @empty
            <p>No posts found.</p>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>