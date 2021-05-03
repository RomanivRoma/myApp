<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Posts extends Controller
{
    public function index($postId){
        $tag = \App\Models\Tag::find($postId);
        $post = \App\Models\Post::find($postId);
        if(is_null($post)){
          return view('posts/error', ['postId' => $postId]);
        }
        else{
            return view('posts/post', ['post' => $post]);
        }


    }
    public function showAll(){
        $posts = \App\Models\Post::get();
        $themes = \App\Models\Theme::get();
        return view('posts/allPosts', ['posts' => $posts, 'themes' => $themes]);
    }
    public function sortTags($tag){
        $tagId = \App\Models\Tag::where('name', $tag)->value('id');
        $posts = \App\Models\Post::with('tags')->get();
        return view('posts/tag', ['posts' => $posts, 'tag' => $tag, 'tagId' => $tagId]);
    }
    public function save(Request $request){
        $name = $request->input('name');
        $theme = $request->input('theme');
        $post = $request->input('post');
        $tags = $request->input('tag');
        $themes = \App\Models\Theme::get();
        $user = \App\Models\User::where('name', $name)->value('id');
        if(is_null($user)){
            $newUser = array('name' => $name, 'created_at' => now(), 'updated_at' => now());
            DB::table('users')->insert($newUser);
        }
        $user = \App\Models\User::where('name', $name)->value('id');
        $postId = DB::table('posts')->latest('id')->first();
        $tags = explode(" ", $tags);
        foreach($tags as $tag){
            $tagId = DB::table('tags')->where('name', $tag)->value('id');
            if(is_null($tagId)){
                $newTag = array('name' => $tag);
                DB::table('tags')->insert($newTag);
            }
            $tagId = DB::table('tags')->where('name', $tag)->value('id');
            DB::table('post_tag')->insert(array('post_id' => $postId->id+1, 'tag_id' => $tagId));
        }
        $data = array('user_id' => $user, 'theme' => $theme, 'body' => $post, 'created_at' => now(), 'updated_at' => now());
        DB::table('posts')->insert($data);
        $posts = \App\Models\Post::orderBy('id', 'ASC')->get();;
        return view('posts/allPosts', ['posts' => $posts, 'themes' => $themes]);
    }
}
