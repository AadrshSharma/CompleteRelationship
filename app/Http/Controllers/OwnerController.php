<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //
    public function index($id){
        $owner = Mechanic::find($id)->owner;
        return $owner;
    }
}
