<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\ModelHasRol;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // Método para mostrar el formulario de creación de usuario
    public function create()
    {
        return view('content.pages.create'); // Esto asume que tienes una vista llamada 'create.blade.php' en la carpeta 'resources/views/usuarios'
    }

    public function store(Request $request)
    {
        $newUser = new User();

        $encryptedPassword = Hash::make($request->password);

        $newUser->name = $request->name;
        $newUser->lastname = $request->lastname;
        $newUser->cargo = $request->cargo;
        $newUser->salario = $request->salario;
        $newUser->foto = $request->foto;
        $newUser->email = $request->email;
        $newUser->password = $encryptedPassword;

        $newUser->save();

        return redirect()->route("pages-home");
    }

    public function edit(User $usuario)
    {
        return view('content.pages.editar', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        // Validar los datos del formulario...

        $usuario->update($request->all());

        return redirect()->route("pages-home");
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route("pages-home")->with('success', 'Usuario eliminado exitosamente.');
    }
}
