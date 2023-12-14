<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use App\Models\Password;
use App\Models\Teams;
use App\Models\User;
use crypt;

 
class ListController extends Controller
{
    public function getInfo(Request $request){
        $user_id = Auth::user()->id;
        $user = Auth::user();

        // Récupérez les équipes auxquelles l'utilisateur appartient directement à partir de la table pivot
        $teams = Teams::join('user_team', 'teams.id', '=', 'user_team.team_id')
            ->where('user_team.user_id', $user_id)
            ->get();


            // $usersNotInSameTeam = User::whereDoesntHave('teams', function ($query) use ($user_id) {
            //     $query->join('teams_user as tu', 'users.id', '=', 'tu.user_id')
            //         ->where('tu.team_id', $user_id);
            // })->get();
    
        
        // Récupérez les informations de mot de passe de l'utilisateur
        $info = Password::where('user_id', $user_id)->get();

        // Vous pouvez faire quelque chose avec les informations récupérées
        // ...

        return view('list', compact('info', 'teams'));

        $info = Password::where('user_id', $user_id)->get();

        

            // dd($info);
        return view('list', compact('info', 'teams', 'usersNotInSameTeam'));

    }
}