<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PageController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function list(){
        return view('list');
    }
    public function form(){
        return view('form');
    }
    public function team(){
        return view('team');
    }
    public function addTeam(){
        return view('addTeam');
    }
    public function editPwd(){
        return view('editPwd');
    }
    public function login(){
        return view('welcome1');
    }
    public function web(){
        return view('welcome1');
    }
    public function dashboard(){
        return view('dashboard');
    }


}
