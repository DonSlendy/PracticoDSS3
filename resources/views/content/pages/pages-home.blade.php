<?php
// Establecer la conexión a la base de datos
$host = "localhost";
$db_name = "practico3";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db_name);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Consulta SQL para obtener todos los empleados
$query = "SELECT * FROM users ";
$result = $conn->query($query);
?>
@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<h1>Sean bienvenidos</h1>

@role('admin')
<h2>Administrador</h2>

<style>
    button{
        width: 100%;
    }
</style>

<div class="row">
    <div class="col-lg-6">
        <a href="{{ route('crear-usuario') }}">
            <button>Ir al formulario de creación de usuarios</button>
        </a>
    </div>

    <div class="col-lg-6">
        <a href="{{ route('hacer-trabajador') }}">
            <button>Ir al formulario de asignar/editar/modificar trabajadores</button>
        </a>
    </div>
</div>
<br>
<div class="col-lg-12">
    <h3 align="center">CRUD usuarios</h3>
    <table align="center" class="table table-dark table-striped-columns">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Usuario</th>
                <th>Apellido</th>
                <th>Correo Electrónico</th>
                <th>Cargo</th>
                <th>Salario</th>
                <th>Fotografía</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['cargo'] . "</td>";
                    echo "<td>" . $row['salario'] . "</td>";
                    echo "<td><img width='100px' src='" . $row['foto'] . "'></td>";
                    echo "</tr>";
                    //src=" . $row['profile_photo_path'] . "
                }
            } else {
            ?>
                <tr>
                    <th>ID</th>
                    <td>Andrés</td>
                    <td>Ramírez</td>
                    <td>edurami@correo.com</td>
                    <td>Ganadero</td>
                    <td>753.44</td>
                    <td><img width="100px" src="https://w7.pngwing.com/pngs/831/88/png-transparent-user-profile-computer-icons-user-interface-mystique-miscellaneous-user-interface-design-smile.png"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

@endrole

@role('trabajador')
<h2>Trabajador</h2>
<p>Información del trabajador</p>

<table align="center" class="table table-dark table-striped-columns">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre Usuario</th>
            <th>Apellido</th>
            <th>Correo Electrónico</th>
            <th>Cargo</th>
            <th>Salario</th>
            <th>Fotografía</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                @if (Auth::check())
                {{ Auth::user()->id }}
                @else
                John Doe
                @endif
            </td>
            <td>
                @if (Auth::check())
                {{ Auth::user()->name }}
                @else
                John Doe
                @endif
            </td>
            <td>
                @if (Auth::check())
                {{ Auth::user()->lastname }}
                @else
                John Doe
                @endif
            </td>
            <td>
                @if (Auth::check())
                {{ Auth::user()->cargo }}
                @else
                John Doe
                @endif
            </td>
            <td>
                @if (Auth::check())
                {{ Auth::user()->salario }}
                @else
                John Doe
                @endif
            </td>
            <td>
                @if (Auth::check())
                {{ Auth::user()->email }}
                @else
                John Doe
                @endif
            </td>
            <td>
                <img width="150px" src="@if (Auth::check())
                {{ Auth::user()->foto }}
                @else
                John Doe
                @endif">
            </td>
        </tr>
    </tbody>

    @endrole
    @endsection