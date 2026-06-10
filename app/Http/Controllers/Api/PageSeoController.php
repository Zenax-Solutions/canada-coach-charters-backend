<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PageSeo;

class PageSeoController extends Controller
{
    public function index()
    {
        return response()->json(PageSeo::all());
    }

    public function show(string $page)
    {
        $seo = PageSeo::where('page', $page)->first();

        if (! $seo) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json($seo);
    }
}
