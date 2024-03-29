<?php

  /////////////
 ///CD FUNC///
/////////////

$var_cd_func = @$_SESSION['frm_cd_func'];

$consulta_cd_func =
"SELECT * 
FROM dbamv.FUNCIONARIO func
WHERE func.SN_ATIVO = 'S'
ORDER BY func.NM_FUNC ASC";

$result_cd_func = oci_parse($conn_ora, $consulta_cd_func);

oci_execute($result_cd_func);	

  ///////////
 ///SETOR///
///////////

$consulta_setor = 
"SELECT st.CD_SETOR, st.NM_SETOR
FROM SETOR st
WHERE st.SN_ATIVO = 'S'
AND st.NM_SETOR NOT LIKE '%INATIVO%'
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
WHERE me.DS_ESPEC NOT LIKE '%INATIVO%'
ORDER BY me.DS_ESPEC ASC";

$result_especialidade = oci_parse($conn_ora, $consulta_especialidade);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_especialidade);	

//LOCALIDADE
$consulta_localidade =
"SELECT L.CD_LOCALIDADE, L.DS_LOCALIDADE
FROM DBAMV.LOCALIDADE L
WHERE L.DS_LOCALIDADE NOT LIKE '%INATIVO%'
ORDER BY L.DS_LOCALIDADE ASC";

$result_localidade = oci_parse($conn_ora, $consulta_localidade);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_localidade);



//MOTIVO DO SERVIÇO
$consulta_mot_serv =
"SELECT MOS.CD_MOT_SERV, MOS.DS_MOT_SERV
FROM DBAMV.MOT_SERV MOS
WHERE MOS.DS_MOT_SERV NOT LIKE '%INATIVO%'
ORDER BY MOS.DS_MOT_SERV ASC";

$result_mot_serv = oci_parse($conn_ora, $consulta_mot_serv);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_mot_serv);

//OFICINA
$consulta_oficina =
"SELECT OFI.CD_OFICINA, OFI.DS_OFICINA, OFI.DS_EMAIL
FROM DBAMV.OFICINA OFI
WHERE OFI.DS_OFICINA NOT LIKE '%INATIVO%'
ORDER BY OFI.DS_OFICINA ASC";

$result_oficina = oci_parse($conn_ora, $consulta_oficina);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_oficina);

//$consulta_insert = "SQL";
//$insere_dados = oci_parse($conn_ora, $consulta_insert);
//oci_execute($insere_dados, OCI_DEFAULT);
?>