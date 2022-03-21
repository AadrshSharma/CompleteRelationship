<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function index($id){
        $post = Author::with('post')->first($id);
        return $post;

    }
}
