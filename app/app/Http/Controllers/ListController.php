<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Password;
use crypt;

 
class ListController extends Controller
{
    public function getInfo(Request $request){
        $user_id = Auth::user()->id;
        $info = Password::where('user_id', $user_id)->get();
            // dd($info);
        return view('list', ["info"=>$info]);

    }
}