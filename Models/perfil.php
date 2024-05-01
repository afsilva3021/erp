<?php
$arquivo = $_FILES['foto'];


if($arquivo !== null){
    preg_match("/\.(png|jpg|jpeg){1}$/i",$arquivo["name"],$ext);

    if($ext == true){
        $nome_arquivo = md5(uniqid(time())).".".$ext[1];
        $caminho_arquivo = "../Imagens".$nome_arquivo;
        move_uploaded_file($arquivo['tmp_name'],$caminho_arquivo);


    }
}