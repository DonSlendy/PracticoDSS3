@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Editar')
@section('content')

<style>
    label {
        width: 100px;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="{{ route('usuarios.actualizar', ['usuario' => $usuario->id]) }}">
            @csrf
            @method('PUT')

            <div class="input-group mb-3">
                <label class="form-label" for="name">Nombre:</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $usuario->name) }}">
            </div>

            <div class="input-group mb-3">
                <label class="form-label" for="lastname">Apellido:</label>
                <input class="form-control" type="text" name="lastname" id="lastname" value="{{ old('lastname', $usuario->lastname) }}">
            </div>

            <div class="input-group mb-3">
                <label class="form-label" for="cargo">Cargo:</label>
                <input class="form-control" type="text" name="cargo" id="cargo" value="{{ old('carago', $usuario->cargo) }}">
            </div>

            <div class="input-group mb-3">
                <label class="form-label" for="salario">Salario:</label>
                <input class="form-control" type="number" name="salario" id="salario" value="{{ old('salario', $usuario->salario) }}">
            </div>

            <div class="input-group mb-3">
                <label class="form-label" for="foto">Foto:</label>
                <input class="form-control" type="text" name="foto" id="foto" value="{{ old('foto', $usuario->foto) }}">
            </div>

            <div class="input-group mb-3">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}">
            </div>

            <div class="input-group mb-3">
                <label class="form-label" for="password">Contraseña:</label>
                <input class="form-control" type="password" name="password" id="password" value="{{ old('password', $usuario->password) }}">
            </div>

            <div align="center">
                <button class="btn btn-primary mb-3" type="submit">Editar Usuario</button>
            </div>

        </form>
    </div>
</div>

@endsection