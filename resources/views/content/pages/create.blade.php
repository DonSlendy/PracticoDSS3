@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Agregar')
@section('content')

<style>
    label {
        width: 100px;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="{{route('guardar-usuario')}}">
            @csrf
            <div class="input-group mb-3">
                <label class="form-label" for="name">Nombre:</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>

            <div class="input-group mb-3">
                <label class="form-label" for="lastname">Apellido:</label>
                <input class="form-control" type="text" name="lastname" id="lastname">
            </div>

            <div class="input-group mb-3">
                <label class="form-label" for="cargo">Cargo:</label>
                <input class="form-control" type="text" name="cargo" id="cargo">
            </div>

            <div class="input-group mb-3">
                <label class="form-label" for="salario">Salario:</label>
                <input class="form-control" type="number" name="salario" id="salario">
            </div>

            <div class="input-group mb-3">
                <label class="form-label" for="foto">Foto:</label>
                <input class="form-control" type="text" name="foto" id="foto">
            </div>

            <div class="input-group mb-3">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email">
            </div>

            <div class="input-group mb-3">
                <label class="form-label" for="password">Contraseña:</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>

            <div align="center">
                <button class="btn btn-primary mb-3" type="submit">Crear Usuario</button>
            </div>

        </form>
    </div>
</div>
@endsection