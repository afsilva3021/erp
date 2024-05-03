<?php

    session_start();

    if(empty($_POST) or (empty($_POST['email']) or (empty($_POST['senha'])))){
        header("Location: ../index.php");
    }


    include("../Controllers/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST["email"];
     $senha = $_POST["senha"];

    // Verifica as credenciais no banco de dados
    $query = "SELECT * FROM USR WHERE USR_EMAIL = :email AND USR_PWD = :senha";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION["email"] = $email;
        $_SESSION["USR_NOME"] = $stmt->USR_NOME;
        $_SESSION["USR_GRUPO"] = $stmt->USR_GRUPO;
        $_SESSION["USR_DEPART"] = $stmt->USR_DEPART;
        $_SESSION["USR_CARGO"] = $stmt->USR_CARGO;
        header("Location: ../Views/dashboard.php");
        exit();
    } else {
        echo "<script>alert('Email ou Senha Incorretos');</script>";
        echo "<script>location.href='../index.php';</script>";
    }
}

  
//
//    $sql = "SELECT * FROM USR 
//            WHERE USR_EMAIL = '{$email}' 
//            AND USR_PWD = '{$senha}'";
//
//
//    $res = $conn->query($sql) or die($conn->error);
//
//$row = $res->fetch_object();
//
//$qtd = $res->num_rows;

//if($qtd > 0) {;
//    $_SESSION["email"] = $email;
//    $_SESSION["USR_NOME"] = $row->USR_NOME;
//    $_SESSION["USR_GRUPO"] = $row->USR_GRUPO;
//    $_SESSION["USR_DEPART"] = $row->USR_DEPART;
//    $_SESSION["USR_CARGO"] = $row->USR_CARGO;
//    echo "<script>location.href='../Views/dashboard.php';</script>";
//}else {
//   
//     
//}
