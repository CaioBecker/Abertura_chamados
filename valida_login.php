<?php
	session_start();	
	//Incluindo a conexão com banco de dados
	include_once("conexao.php");	
	
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['login'])) && (isset($_POST['senha']))){

		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário		
		//$result_usuario = "SELECT * FROM usuarios WHERE login = '$usuario' && senha = '$senha' LIMIT 1";
		$_SESSION['usuarioLogin'] = $_POST['login'];
		$usuario = strtoupper($_POST['login']);
		$senha = $_POST['senha'];		
		
		$result_usuario = oci_parse($conn_ora, "SELECT abchamados.VALIDA_SENHA_FUNC_CHAMADOS(:usuario,:senha) AS RESP_LOGIN,
												INITCAP(usu.NM_USUARIO) AS USUARIO,                                                     
												(SELECT CASE WHEN pu.CD_USUARIO IS NULL THEN 'N' ELSE 'S' END 
												FROM dbasgu.PAPEL_USUARIOS pu
												WHERE pu.CD_PAPEL = 340
												AND pu.CD_USUARIO = :usuario) AS USU_ADM
												FROM dbasgu.USUARIOS usu
												WHERE usu.CD_USUARIO = :usuario
												AND ROWNUM = 1");
												
		echo '</br>'. $result_usuario. '</br>';
		//$stid = oci_parse($conn_ora, 'INSERT INTO MYTABLE (mid, myd) VALUES(:myid, :mydata)');
		oci_bind_by_name($result_usuario, ':usuario', $usuario);
		oci_bind_by_name($result_usuario, ':senha', $senha);
		
		echo $result_usuario;
		
		oci_execute($result_usuario);
        $resultado = oci_fetch_row($result_usuario);
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){
			
			IF($resultado[0] == 'Login efetuado com sucesso') {
				$_SESSION['usuarioNome'] = $resultado[1];
				
				$_SESSION['usuarioLogin'] = strtoupper($usuario);				
				header("Location: home.php");
			}ELSE{ 
				$_SESSION['loginErro'] = $resultado[0] . '!';
				header("Location: index.php");		
			}
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Ocorreu um erro!";
			header("Location: index.php");
		}
		
	}
?>