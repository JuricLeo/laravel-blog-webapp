<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Edit post') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="bg-slate-800">
            <form action="/edit-post/{{$post->id}}" method="POST" class="flex flex-col">
              @csrf
              @method("put")
              <input name="title" type="text" class="text-black md:w-[50%] h-[20vh]" value="{{$post->title}}" />
              <textarea name="content" class="text-black md:w-[50%] h-[20vh] mt-2">
                {{$post->content}}
              </textarea>
              <x-ui.submit-button>
                Update Post
              </x-ui.submit-button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>