<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Theme;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'theme', 'body'];

    // public function theme(){
    //     return $this->belongsTo(Theme::class);
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    // public function post(){
    //     return $this->belongsToMany(PostTag::class);
    // }
}
