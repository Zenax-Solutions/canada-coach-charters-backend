<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function albums()
    {
        return response()->json(GalleryAlbum::withCount('items')->get());
    }

    public function items(Request $request)
    {
        $items = GalleryItem::with('album')
            ->when($request->album, fn($q) => $q->whereHas('album', fn($q2) => $q2->where('slug', $request->album)))
            ->orderBy('sort_order')
            ->paginate($request->per_page ?? 24);

        return response()->json($items);
    }
}
