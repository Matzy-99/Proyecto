<?php

namespace App\Http\Controllers;

use App\Models\Profile; // Asegúrate de que estás importando el modelo correcto
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        // Encuentra el perfil por su ID
        $profile = Profile::findOrFail($id);

        // Rellena el perfil con los datos del request
        $profile->fill($request->all());

        // Verifica si hay cambios en el perfil
        if ($profile->isDirty()) {
            // Guarda el perfil si hay cambios
            $profile->save();
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function destroy($id)
    {
        // Encuentra el perfil por su ID
        $profile = Profile::findOrFail($id);

        // Elimina el perfil
        $profile->delete();

        return redirect()->back()->with('success', 'Profile deleted successfully.');
    }
}