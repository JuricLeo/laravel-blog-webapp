<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function showPost(Post $post)
  {
    return view("post", ["post" => $post]);
  }

  public function showEdit(Post $post)
  {
    if (auth()->user()->id !== $post["user_id"]) {
      return redirect("/dashboard");
    }

    return view("edit-post", ["post" => $post]);
  }

  public function updatePost(Post $post, Request $request)
  {
    $incomingFields = $request->validate([
      "title" => "required",
      "content" => "required",
    ]);

    $incomingFields["title"] = strip_tags($incomingFields["title"]);
    $incomingFields["content"] = strip_tags($incomingFields["content"]);

    $post->update($incomingFields);
    return redirect("/dashboard");
  }

  public function deletePost(Post $post)
  {
    if (auth()->user()->id === $post["user_id"]) {
      $post->delete();
    }

    return redirect("/dashboard");
  }

  public function createPost(Request $request)
  {
    $incomingFields = $request->validate([
      "title" => "required",
      "content" => "required"
    ]);

    $incomingFields["title"] = strip_tags($incomingFields["title"]);
    $incomingFields["content"] = strip_tags($incomingFields["content"]);
    $incomingFields["user_id"] = auth()->id();
    Post::create($incomingFields);
    return redirect("/dashboard");
  }
}
