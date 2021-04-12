<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Posts extends Controller
{
    var $users = [1 => "Roma", 2 => "John", 3 => "Bitter", 4 => "Oleg"];
    var $theme = [
        1 => "First post",
        2 => "News",
        3 => "Test",
        4 => "My birthday"
    ];
    var $post = [
        1 => "Hello my name is Roma and this is my first post on this web site",
        2 => "Today`s news is very important for me, so I share it with you",
        3 => "Test post becase I don`t know what to post here.",
        4 => "Happy birthday to me. Cheers!!!"
    ];
    public function index($postId){
        if(!array_key_exists($postId, $this->users)){
          return view('error', ['postId' => $postId]);
        }
        else{
            return view('post', ['user' => $this->users[$postId], 'theme' => $this->theme[$postId], 'post' => $this->post[$postId]]);
        }

    }
    public function showAll(){
        return view('allPosts', ['users' => $this->users, 'theme' => $this->theme, 'post' => $this->post]);
    }
    public function save(){
        array_push(request('name'));
        array_push(request('theme'));
        array_push(request('post'));
        error_log(request('name'));
        // request('theme');
        // request('post');
        redirect('/allPosts');
    }
}
