<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Teams;
use App\Models\User;
use crypt;

 
class TeamController extends Controller
{
    public function formTeam(Request $request)
    {
        $rules = [
            'name' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
      
        if ($validator->fails()) {
            return redirect('/')->withErrors($validator);
        }

        //Save the data to the database
        $name = $request->input('name');
        // $data = array('Name' => $name);
        // $json = json_encode($data);
        // Storage::put(time().'.json', $json);


        $user_id = Auth::user()->id;
            $team = new Teams;
            $team->name = $name;
            $team->save();
        // return redirect("/welcome")->withErrors($validator);
        // return redirect('welcome')->route('welcome');
        
        $user = Auth::user();

        $team->belongsToMany(User::class, 'user_team', 'team_id', 'user_id')->attach($user->id);
        return redirect('/');
    }


    

}