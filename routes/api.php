<?php

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get("/chats/{id}" , ['App\Http\Controllers\ChatController', 'find' ]);
Route::post("/chat/{id}" , ['App\Http\Controllers\ChatController', 'create' ]);
