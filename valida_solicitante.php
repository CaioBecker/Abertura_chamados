<?php

//ACESSO RESTRITO
//include 'acesso_restrito.php';

//CONEXAO
include 'conexao.php';

$var_new_cd_usuario  = @$_POST['input_valor'];

////////////////////////////////
//JUSTIFICATIVAS PENDENTES PGR//
////////////////////////////////

if(isset($_POST['input_valor'])){ 
    $oracle = "SELECT COUNT(*) AS QTD
    FROM dbasgu.USUARIOS usu
    WHERE usu.CD_USUARIO = UPPER('$var_new_cd_usuario')";

    $res_oracle = oci_parse($conn_ora, $oracle);	

    oci_execute($res_oracle);  

    $row_qtd = oci_fetch_array($res_oracle);

    $var_qtd = $row_qtd['QTD'];

}

?>