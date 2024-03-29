<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CropfactorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('cropfactor');
});

Route::get('/cropfactor', [CropfactorController::class, 'index'])->name('cropfactor');

// Example of returning JSON:
// Route::get('/crop', function () {
//     return ['foo' => 'bar'];
// });
