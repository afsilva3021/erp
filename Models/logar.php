<?php

    session_start();

    if(empty($_POST) or (empty($_POST['email']) or (empty($_POST['senha'])))) {
        header("Location: ../index.php");
    }

    include("../Controllers/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST["email"];
      $senha = $_POST["senha"];

   
    $query = "SELECT * FROM USR WHERE USR_EMAIL = :email AND USR_PWD = :senha";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row){
        $_SESSION["USR_NOME"] = $row['USR_NOME'];
        $_SESSION["USR_GRUPO"] = $row['USR_GRUPO'];
        $_SESSION["USR_DEPART"] = $row['USR_DEPART'];
        $_SESSION["USR_CARGO"] = $row['USR_CARGO'];
    }
    
    if ($stmt->rowCount() > 0) {
        $_SESSION["email"] = $email;
          header("Location: ../Views/dashboard.php");
        exit();
    } else {
        echo "<script>alert('Email ou Senha Incorretos');</script>";
        echo "<script>location.href='../index.php';</script>";
    }
}
<<<<<<< HEAD

=======
>>>>>>> 0495730c89365309fcb9f6ee59504c5deedb5f85
