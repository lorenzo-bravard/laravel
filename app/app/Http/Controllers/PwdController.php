<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Password;
use crypt;

 
class PwdController extends Controller
{
    public function form(Request $request)
    {
        $rules = [
            'url' => 'required|string|url',
            'login' => 'required|string',
            'mdp' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('/gestionMdp')->withErrors($validator);
        }

        // Save the data to the database
        $site = $_POST['url'];
        $login = $_POST['login'];
        $mdp = $_POST["mdp"];
        $data = array('URL' => $site,'Login' => $login,'MDP' => $mdp);
        $json = json_encode($data);
        Storage::put(time().'.json', $json);



        $user_id = Auth::user()->id;
            $pwd = new Password;
            $pwd->site = $site;
            $pwd->login = $login;
            $pwd->password = $mdp;
            $pwd->user_id = $user_id;
            $pwd->save();
        // return redirect("/welcome")->withErrors($validator);
        // return redirect('welcome')->route('welcome');
        return redirect('/');
    }

    public function editPassword(Request $request){
    
        $user_id = Auth::user()->id;
        $info = Password::where('user_id', $user_id)->first();
        
        $rules = [
            'mdp' => 'required|string',
        ];
    
        $mdp = $request->input('mdpEdit');
    
        // Assurez-vous que le champ 'mdp' est présent dans la requête avant d'accéder à sa valeur
        if (!$mdp) {
            // Gérez l'erreur ici, redirigez peut-être l'utilisateur avec un message d'erreur
        }
    
        // Mettez à jour chaque attribut individuellement
        $info->password = $mdp;
        $info->save();
    
        return redirect('/list');
    }
    

}