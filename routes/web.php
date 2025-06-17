<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentController;

use Illuminate\Support\Facades\Route;





Route::get("/category", [CategoryController::class, "index"])->name("category.index");

Route::get("/student", [StudentController::class, "index"])->name("student.index");
Route::get("/student/{student}", [StudentController::class, "show"])->name("student.show");

Route::post("/student/store", [StudentController::class, "store"])->name("student.store");
Route::put("student/update/{student}" , [StudentController::class , "update"])->name("student.update");
Route::delete("/student/destroy/{student}" , [StudentController::class , "destroy" ])->name('student.destroy');
