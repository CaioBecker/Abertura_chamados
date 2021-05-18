<?php

/////////
//SETOR//
/////////

$consulta_setor = 
"SELECT st.CD_SETOR, st.NM_SETOR
FROM SETOR st
WHERE st.SN_ATIVO = 'S'
ORDER BY st.NM_SETOR ASC";

$result_setor = oci_parse($conn_ora, $consulta_setor);							

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_setor);	
					
/////////////////
//ESPECIALIDADE//
/////////////////

$consulta_especialidade =
"SELECT me.CD_ESPEC, me.DS_ESPEC
FROM MANU_ESPEC me
ORDER BY me.CD_ESPEC ASC";

$result_especialidade = oci_parse($conn_ora, $consulta_especialidade);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_especialidade);	

//LOCALIDADE
$consulta_localidade =
"SELECT L.CD_LOCALIDADE, L.DS_LOCALIDADE
FROM DBAMV.LOCALIDADE L";

$result_localidade = oci_parse($conn_ora, $consulta_localidade);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_localidade);

//TIPO DA OS
$consulta_tipo_os =
"SELECT TIO.CD_TIPO_OS, TIO.DS_TIPO_OS
FROM DBAMV.TIPO_OS TIO";

$result_tipo_os = oci_parse($conn_ora, $consulta_tipo_os);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_tipo_os);

//MOTIVO DO SERVIÇO
$consulta_mot_serv =
"SELECT MOS.CD_MOT_SERV, MOS.DS_MOT_SERV
FROM DBAMV.MOT_SERV MOS";

$result_mot_serv = oci_parse($conn_ora, $consulta_mot_serv);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_mot_serv);

//OFICINA
$consulta_oficina =
"SELECT OFI.CD_OFICINA, OFI.DS_OFICINA, OFI.DS_EMAIL
FROM DBAMV.OFICINA OFI";

$result_oficina = oci_parse($conn_ora, $consulta_oficina);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_oficina);

//$consulta_insert = "SQL";
//$insere_dados = oci_parse($conn_ora, $consulta_insert);
//oci_execute($insere_dados, OCI_DEFAULT);
?>