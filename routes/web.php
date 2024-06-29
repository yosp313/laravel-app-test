<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LoggingMiddleWare;

Route::get('/', function () {
    return view('welcome');
})->middleware(LoggingMiddleWare::class);

Route::get("/hola", function () {
    return "Hola Amigo!";
});

Route::post("/api/notes", [NoteController::class, 'store'])->name("notes.store");
Route::get("/api/notes", [NoteController::class, 'index'])->name("notes.index")->middleware(LoggingMiddleWare::class);
Route::get("/api/notes/{id}", [NoteController::class, 'show'])->name("notes.show");
Route::put("/api/notes/{id}", [NoteController::class, 'update'])->name("notes.update");
Route::delete("/api/notes/{id}", [NoteController::class, 'destroy'])->name("notes.destroy");



Route::get("/api/csrf", function () {
    return response()->json(["csrf_token" => csrf_token()]);
});
