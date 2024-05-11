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
$query = "SELECT users.* FROM users 
JOIN model_has_roles ON users.id = model_has_roles.model_id 
WHERE model_has_roles.role_id = 6 ;";
$result = $conn->query($query);
?>

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
        <form method="POST" action="{{route('guardar-trabajador')}}">
            @csrf
            <div class="input-group mb-3">
                <label class="form-label" for="model_id">ID:</label>
                <input class="form-control" type="number" name="model_id" id="model_id">
            </div>

            <div align="center">
                <button class="btn btn-primary mb-3" type="submit">Ascender a trabajador</button>
            </div>

        </form>
    </div>
</div>
<br>
<div class="col-lg-12">
    <h3 align="center">Trabajadores existentes: </h3>
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
                <th>Operaciones</th>
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
                    echo "<td>";
                    echo "<a href='" . route('usuarios.editar', ['usuario' => $row['id']]) . "'>Editar usuario</a><br>";
                    echo "<form method='POST' action='" . route('usuarios.eliminar', ['usuario' => $row['id']]) . "' onsubmit=\"return confirm('¿Estás seguro de que deseas eliminar este usuario?');\">";
                    echo csrf_field();
                    echo method_field('DELETE');
                    echo "<button type='submit'>Eliminar usuario</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                    //src=" . $row['profile_photo_path'] . "
                }
            } else {
            ?>
                <tr>
                    <th>##</th>
                    <td>No </td>
                    <td>tienes</td>
                    <td>trabajadores</td>
                    <td>guardados</td>
                    <td>aquí</td>
                    <td><img width="100px" src="https://w7.pngwing.com/pngs/831/88/png-transparent-user-profile-computer-icons-user-interface-mystique-miscellaneous-user-interface-design-smile.png"></td>
                    <td>
                        <button>Editar</button><br>
                        <button>Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
@endsection