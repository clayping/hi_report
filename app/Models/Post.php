<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'lat',
        'lng',
        'category',
        'photo_1',
        'photo_2',
        'memo',
        'status',
        'admin_comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image_path);
    }

    public function getImage2UrlAttribute()
    {
        return Storage::url($this->image2_path);
    }

    public function getImagePathAttribute()
    {
        // return 'images/posts/' . $this->image;
        return 'images/posts/' . $this->photo_1;
    }

    public function getImage2PathAttribute()
    {
        // return 'images/posts/' . $this->image;
        return 'images/posts/' . $this->photo_2;
    }
}
