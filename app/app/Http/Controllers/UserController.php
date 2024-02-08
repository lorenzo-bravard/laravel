<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getForm(Request $request)
    {
        // Récupérez les données du formulaire à partir de la requête GET
        $validatedData = $request->validate([
            'site' => 'required|string|max:255',
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);
       
        $formData = [
            'site' => $validatedData['site'],
            'mail' => $validatedData['mail'],
            'password' => $validatedData['password'],
        ];

 
        $jsonData = json_encode($formData);

  
        $fileName = 'formulaire_' . now()->format('YmdHis') . '.json';

  
        Storage::disk('json')->put($fileName, $jsonData);


        return redirect('/inscription')->with('success', 'Données enregistrées avec succès');
    }


}
