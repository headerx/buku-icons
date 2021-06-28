<?php

use HeaderX\BukuIcons\Http\Controllers\ShowIconController;
use Illuminate\Support\Facades\Route;

Route::view(config('buku-icons.route_prefix'), 'blade-icons.index')->name('blade-icons');
Route::get(config('buku-icons.route_prefix') . '/{icon}', ShowIconController::class)->name('blade-icon');
