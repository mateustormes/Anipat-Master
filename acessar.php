<?php
include 'configuracoes.php';


	$email = $_POST['email'];
	$senha = $_POST['senha'];

	// Iniciamos a função do CURL:
	// $ch = curl_init($configConexao.'usuarioLogin');

	$data_array =  array(
		'email' => $email,
		'senha' => $senha
	 );


	$url = $configConexao.'usuarioLogin/'.$email.'/'.$senha;
	
	$get_data = pullAPI('GET', $url, json_encode($data_array));
	$result = json_decode($get_data, true);


	if($result){
		echo $result['id'];

		session_start();
		$_SESSION['id'] = $result['id'];
		$_SESSION['nome']   = $result['nome'];
		$_SESSION['nivel_acesso'] = $result['fk_nivel_acesso'];

		exit(header("location: memorialOnline/main/index.php"));
	}
?>