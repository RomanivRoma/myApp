<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;


    protected $fillable = ['name'];

    public function tags(){
        return $this->hasMany(Post::class);
    }
    // public function tag(){
    //     return $this->hasMany(PostTag::class);
    // }
}


//
