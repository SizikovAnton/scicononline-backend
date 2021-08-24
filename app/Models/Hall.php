<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'video_url'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
