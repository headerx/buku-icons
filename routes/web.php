<?php

use HeaderX\BukuIcons\Http\Controllers\ShowIconController;
use Illuminate\Support\Facades\Route;

Route::view(config('buku-icons.route_prefix'), 'buku-icons::blade-icons.index')
    ->name('blade-icons')
    ->middleware(config('buku-icons.middleware'));

Route::get(config('buku-icons.route_prefix') . '/{icon:name}', ShowIconController::class)
    ->name('blade-icon')
    ->middleware(config('buku-icons.middleware'));
