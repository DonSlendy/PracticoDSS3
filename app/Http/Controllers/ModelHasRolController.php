<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelHasRoles;


class ModelHasRolController extends Controller
{
    public function hacerTrabajador()
    {
        return view('content.pages.trabajador');
    }

    public function store(Request $request)
    {
        $newPermission = new ModelHasRoles();

        $newPermission->role_id = 6;
        $newPermission->model_type = "App\\Models\\User";
        $newPermission->model_id = $request->model_id;

        $newPermission->save();

        return redirect()->route("pages-home");
    }
}
