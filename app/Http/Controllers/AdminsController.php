<?php

namespace App\Http\Controllers;
use App\voiture;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //
    public function index(){
        return view ('admins.index')->withVoitures(Voiture::orderBy('created_at','DESC')->paginate(5));
    }
}
