<?php

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}