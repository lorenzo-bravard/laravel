<?php
 
 namespace App\Http\Controllers;

 use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Validator;
 use Illuminate\Support\Facades\Auth;
 use App\Models\Teams;
 use App\Models\User;
 use App\Notifications\TeamNotification;

 
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

    public function formAddUser(Request $request)
{
    $userName = $request->input('userName');
    $team_id = $request->input('team_id');
    $userGlobal = User::all();
    $users = User::where('name', $userName)->first();

    if ($users) {
        // Vérifiez si la relation n'existe pas déjà
        $existingRelation = $users->teams()->where('teams_id', $team_id)->exists();

        if (!$existingRelation) {
            // Ajoutez l'utilisateur à l'équipe
           
            // dd($userGlobal);
            // dd($users);
            // Autre logique si nécessaire
            // $teamMembers = $userGlobal->teams()->where('teams_id', $team_id)->get('user_id');
// $teamMembers = Team::find($team_id)->users()->pluck('id');

        $userTeam = User::whereHas('teams', function ($query) use ($team_id) {
            $query->where('teams_id', $team_id);
        })->get();
        // dd($userTeam);
            // $teamMembers = $userGlobal->teams()->where('teams_id', $team_id)->select('user_id')->get();
            // $teamMembers = Teams::where('id', $team_id);
            // $usersInTeam = $teamMembers->user;
            // dd($teamMembers);

            foreach ($userTeam as $teamMember) {
                
                    $teamMember->notify(new TeamNotification($userTeam, $team_id));
                
            }
            $users->teams()->attach($team_id);
            return redirect('/')->with('success', 'Utilisateur ajouté à l\'équipe avec succès.');
        } else {
            // La relation existe déjà
            return redirect('/')->with('info', 'L\'utilisateur est déjà dans cette équipe.');
        }
    } else {
        return redirect('/')->with('error', 'Utilisateur non trouvé.');
    }
}


    

    public function teamMemory(Request $request)
    {
        $team_id = $request->input('teamId');       
            // dd($team_id);
        return view('addTeam', compact('team_id'));
    }


    

}