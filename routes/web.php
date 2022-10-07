<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

Route::get('/category/{category}', [PublicController::class, 'categoryShow'])->name('category.show');

Route::get('/announcement/index', [AnnouncementController::class, 'index'])->name('announcement.index');

Route::get('/announcement/{announcement}/show', [AnnouncementController::class, 'show'])->name('announcement.show');

Route::get('/announcement/index', [AnnouncementController::class, 'index'])->name('announcement.index');

Route::get('/about', [PublicController::class, 'about'])->name('about');

Route::get('/richiesta/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//Ricerca annuncio
Route::get('/ricerca/annuncio', [PublicController::class, 'searchAnnouncements'])->name('announcements.search');


Route::middleware(['auth'])->group(function(){
    
    Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
    
    //Richiedi di diventare revisore 
    Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
});

Route::middleware(['is_revisor'])->group(function(){

    // Home Revisore
    Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index')->middleware('is_revisor');

    // Accetta Annuncio
    Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement')->middleware('is_revisor');
    
    // Rifiuta Annuncio
    Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement')->middleware('is_revisor');

    //Resetta Annuncio
    Route::patch('/resetta/annuncio/{announcement}', [RevisorController::class, 'resetAnnouncement'])->name('revisor.reset_announcement')->middleware('is_revisor');

    //Dashboard Revisore
    Route::get('/revisor/announcements-table', [RevisorController::class, 'dashboard'])->name('dashboard')->middleware('is_revisor');
    
    //Rendi un utente revisore
    

    Route::get('announcement/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');


    //Elimina un annuncio

    Route::delete('announcement/{announcement}/delete', [AnnouncementController::class, 'destroy'])->name('announcement.delete');


});



    



































































































Route::post('/lingua/{lang}',[PublicController::class,'setLanguage'])->name('set_language_locale');
