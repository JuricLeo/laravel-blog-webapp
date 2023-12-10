<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Post') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="mb-8">
            <h1 class="text-2xl font-semibold">{{$post["title"]}}</h1>
            <p class="text-xs mt-2">Author: {{$post->user->name}}</p>
          </div>
          <p>{{$post["content"]}}</p>
        </div>
      </div>
    </div>
</x-app-layout>