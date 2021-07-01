<?php

 //CONEXAO
 include 'conexao.php';
 $consulta_diferenca_hora="SELECT TO_CHAR(SYSDATE,'DD/MM/YYYY HH24:MI:SS') AS INTERVALO fROM DUAL
   ";

$result_diferenca_hora = oci_parse($conn_ora, $consulta_diferenca_hora);

oci_execute($result_diferenca_hora);

$row_diferenca_hora = oci_fetch_array($result_diferenca_hora);
echo '-----------------------------------------------------------------------';
echo '</br>TOTAL HORAS:'; echo $row_diferenca_hora['INTERVALO'];

?>