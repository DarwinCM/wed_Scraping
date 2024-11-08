<?php


use App\Livewire\Seting;
use App\Livewire\SetingPag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/sistema/pagina/scrapy', Seting::class)->name('scrapy');
    Route::get('/sistema/pagina/scrapy/pag', SetingPag::class)->name('scrapy.pag');
});

