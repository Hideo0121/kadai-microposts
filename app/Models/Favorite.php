<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'micropost_id'];

    /**
     * このお気に入りが属するユーザー。
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * このお気に入りが属する投稿。
     */
    public function micropost()
    {
        return $this->belongsTo(Micropost::class);
    }
}
