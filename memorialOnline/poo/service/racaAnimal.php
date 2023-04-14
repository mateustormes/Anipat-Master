<?php
include '../importador.php';


$categoriaAnimal = new CategoriaAnimal();
$categoriaAnimal.setId() = $_POST['categoria_animal'];
$racaAnimal = new RacaAnimal($categoriaAnimal, $_POST['descricao'], $_POST['logado']);
$racaAnimal->setFkCategoriaAnimal($_POST['categoria_animal']);
$racaAnimal->setDescricao($_POST['descricao']);
$racaAnimal->setCdUser($_POST['logado']);


$data = [
    'racaAnimal'=> json_encode($racaAnimal)
];
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL ,"http://localhost:8080/racaAnimal" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST, 1 );
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($racaAnimal) ); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

$result = curl_exec($ch);

?>