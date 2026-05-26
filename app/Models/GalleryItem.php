<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        'gallery_album_id',
        'title',
        'description',
        'image_path',
        'sort_order',
    ];

    public function album()
    {
        return $this->belongsTo(GalleryAlbum::class);
    }
}
