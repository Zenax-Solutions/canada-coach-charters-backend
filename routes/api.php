<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ChatLeadController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\PageSeoController;
use App\Http\Controllers\Api\TourController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public API Routes — consumed by Next.js frontend
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {

    // Blog
    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog/categories', [BlogController::class, 'categories']);
    Route::get('/blog/{slug}', [BlogController::class, 'show']);

    // Tours
    Route::get('/tours', [TourController::class, 'index']);
    Route::get('/tours/categories', [TourController::class, 'categories']);
    Route::get('/tours/{slug}', [TourController::class, 'show']);

    // Tours CRUD (ready for admin CMS integration)
    Route::post('/admin/tours', [TourController::class, 'store']);
    Route::put('/admin/tours/{tour}', [TourController::class, 'update']);
    Route::delete('/admin/tours/{tour}', [TourController::class, 'destroy']);

    Route::post('/admin/tour-categories', [TourController::class, 'storeCategory']);
    Route::put('/admin/tour-categories/{tourCategory}', [TourController::class, 'updateCategory']);
    Route::delete('/admin/tour-categories/{tourCategory}', [TourController::class, 'destroyCategory']);

    // Gallery
    Route::get('/gallery/albums', [GalleryController::class, 'albums']);
    Route::get('/gallery', [GalleryController::class, 'items']);

    // Quote / Contact form submission
    Route::post('/quote', [QuoteController::class, 'store']);

    // Location search for quote forms (Google Places)
    Route::get('/location/search', [LocationController::class, 'search']);

    // Distance calculation from 455 Ferrier St to destination (Google Distance Matrix)
    Route::post('/location/route', [LocationController::class, 'route']);

    // Page SEO settings
    Route::get('/page-seo', [PageSeoController::class, 'index']);
    Route::get('/page-seo/{page}', [PageSeoController::class, 'show']);

    // AI Chat lead capture (separate from quotes)
    Route::post('/chat-lead', [ChatLeadController::class, 'store']);
});
