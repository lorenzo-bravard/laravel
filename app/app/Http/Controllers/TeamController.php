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

    public function formAddUser(Request $request)
{
    $userName = $request->input('userName');
    $team_id = $request->input('team_id');
    $user = User::where('name', $userName)->first();

    if ($user) {
        // Vérifiez si la relation n'existe pas déjà
        $existingRelation = $user->teams()->where('teams_id', $team_id)->exists();

        if (!$existingRelation) {
            // Ajoutez l'utilisateur à l'équipe
            $user->teams()->attach($team_id);

            // Autre logique si nécessaire
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