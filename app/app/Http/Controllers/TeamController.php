<?php
 
 namespace App\Http\Controllers;

 use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Validator;
 use Illuminate\Support\Facades\Auth;
 use App\Models\Teams;
 use App\Models\User;

 
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

        $name = $_POST["name"];

        $user_id = Auth::user()->id;
            $team = new Teams;
            $team->name = $name;
            $team->save();
        // return redirect("/welcome")->withErrors($validator);
        // return redirect('welcome')->route('welcome');
        
        $user = Auth::user();
        $user->teams()->save($team);
        // $team->belongsToMany(User::class, 'user_team', 'team_id', 'user_id')->attach($user->id);
        return redirect('/');
    }


    

}