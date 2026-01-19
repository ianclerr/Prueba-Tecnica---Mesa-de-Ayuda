<?php

// ProfileController import removed
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Tickets\Index as TicketsIndex;
use App\Livewire\Tickets\Create as TicketsCreate;
use App\Livewire\Tickets\Edit as TicketsEdit;
use App\Livewire\Tickets\Show as TicketsShow;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    
    // Ticket Routes
    Route::get('/tickets', TicketsIndex::class)->name('tickets.index');
    Route::get('/tickets/create', TicketsCreate::class)->name('tickets.create');
    Route::get('/tickets/{ticket}/edit', TicketsEdit::class)->name('tickets.edit');
    Route::get('/tickets/{ticket}', TicketsShow::class)->name('tickets.show');
});

// Profile routes removed as per request

require __DIR__.'/auth.php';
