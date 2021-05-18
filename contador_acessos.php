<?php 
//Recebendo nome da pagina
$pagina_acesso = basename($_SERVER['PHP_SELF']);;
$data = date("d/m/Y");
//nome computador WIN
$ComputerName = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//ip WIN
$ip=getenv("REMOTE_ADDR");

if (isset($_SESSION['pagina_acesso'])){
	
	$query = "SELECT * 
	          FROM acessos
			  WHERE pagina ='$pagina_acesso'
			  AND ip = '$ip'
			  AND data = '$data'
			  AND nome_computador = '$ComputerName'
			  ";
			
    $resultado_contador = mysqli_query($conn, $query);
	$linhas = mysqli_num_rows($resultado_contador); 
	
    if ($linhas > 0) {
		
		//Já foi registrado um acesso unico por ip
		$result_contador = "INSERT INTO acessos (pagina, ip, nome_computador, data, quantidade, sn_unico) VALUES ('$pagina_acesso', '$ip', '$ComputerName', '$data', 1 , 'N')";
		$resultado_contador = mysqli_query($conn, $result_contador);
		mysqli_insert_id($conn);
		
	} else {	
	
		//Acesso unico por ip
		$result_contador = "INSERT INTO acessos (pagina, ip, nome_computador, data, quantidade, sn_unico) VALUES ('$pagina_acesso', '$ip', '$ComputerName','$data', 1 , 'S')";
		$resultado_contador = mysqli_query($conn, $result_contador);
		mysqli_insert_id($conn);
	};
};
			
?>