<?php

//////////
//ORACLE//
//////////

//TREINAMENTO

//$dbstr1 ="(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST =192.168.90.231)(PORT = 1521))
//(CONNECT_DATA = (SID = trnmv)))";


////Criar a conexao ORACLE
//if(!@($conn_ora = oci_connect('dbamv','treinamento123',$dbstr1,'AL32UTF8'))){
//	echo "Conexão falhou!";	
//} else { 
	//echo "Conexão OK!";	
//}

//PRODUCAO

$dbstr1 ="(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST =10.200.0.211)(PORT = 1521))
(CONNECT_DATA = (SERVICE_NAME = prdmv)))";


//Criar a conexao ORACLE
if(!@($conn_ora = oci_connect('pocomed','pocomed#0920',$dbstr1,'AL32UTF8'))){
//if(!@($conn_ora = oci_connect('pgrme','TBPKRAG#2021',$dbstr1,'AL32UTF8'))){
	echo "Conexão falhou!";	
} else { 
	//echo "Conexão OK!";	
}


/////////
//MYSQL//
/////////

//$servidor = "localhost";
//$usuario = "root";
//$senha = "#tbpkrag@2021";
//$dbname = "portal_medicamentos";

//Criar a conexao
//$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
