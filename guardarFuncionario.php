<?php
session_start();
include("Includes/sessionSecurity.php");
include("db.php");
session_start();

if (isset($_POST['guardarFuncionario'])) {
    $nombreFuncionario = $_POST['nombreFuncionario'];
    $documentoFuncionario = $_POST['documentoFuncionario'];
    $cargoFuncionario = $_POST['cargoFuncionario'];
    $sedeFuncionario = $_POST['sedeFuncionario'];

    $query = "INSERT INTO funcionarios (documento, nombre, cargo, sede) VALUES ('$documentoFuncionario', '$nombreFuncionario', '$cargoFuncionario', '$sedeFuncionario')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        $_SESSION['message'] = 'Error, verifica los datos ingresados o verifica si el documento ya está ingresado';
        $_SESSION['message_type'] = 'warning';
    } else {
        $_SESSION['message'] = 'Funcionario guardado con éxito';
        $_SESSION['message_type'] = 'success';
         
    }

   header('Location: moduloInfo.php');
   exit();

}


?>