<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'cover_image'];

    public function items()
    {
        return $this->hasMany(GalleryItem::class)->orderBy('sort_order');
    }
}
