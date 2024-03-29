<?php

$var_USUARIO = $_SESSION['usuarioLogin'];

/////////////////////
//CODIGO FUNSUARIO//
///////////////////
$consulta_cd_func_usuario = 
"SELECT func.CD_FUNC, func.NM_FUNC
FROM dbamv.FUNCIONARIO func
LEFT JOIN ABCHAMADOS.portal_cham_config_padrao cp
  ON cp.CD_FUNC = func.CD_FUNC
WHERE func.SN_ATIVO = 'S'
AND UPPER(cp.CD_USUARIO) = UPPER('$var_USUARIO')";

$result_cd_func_usuario = oci_parse($conn_ora, $consulta_cd_func_usuario);							

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_cd_func_usuario);	
$row_cd_func_usuario = oci_fetch_array($result_cd_func_usuario);

/////////////////
//SETOR USUARIO//
/////////////////

$consulta_setor_usuario = 
"SELECT st.CD_SETOR, st.NM_SETOR
FROM SETOR st
INNER JOIN ABCHAMADOS.portal_cham_config_padrao cp
  ON cp.CD_SETOR = st.CD_SETOR
WHERE st.SN_ATIVO = 'S'
AND UPPER(cp.CD_USUARIO) = UPPER('$var_USUARIO')";

$result_setor_usuario = oci_parse($conn_ora, $consulta_setor_usuario);							

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_setor_usuario);	
$row_setor_usuario = oci_fetch_array($result_setor_usuario);

/////////////////////////
//ESPECIALIDADE USUARIO//
/////////////////////////

$consulta_especialidade_usuario =
"SELECT manu.CD_ESPEC, manu.DS_ESPEC
FROM ABCHAMADOS.portal_cham_config_padrao cp
INNER JOIN dbamv.MANU_ESPEC manu
  ON manu.CD_ESPEC = cp.CD_ESPEC
WHERE UPPER(cp.CD_USUARIO) = UPPER('$var_USUARIO')";

$result_especialidade_usuario = oci_parse($conn_ora, $consulta_especialidade_usuario);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_especialidade_usuario);	
$row_especialidade_usuario = oci_fetch_array($result_especialidade_usuario);

///////////////////
//OFICINA USUARIO//
///////////////////
$consulta_oficina_usuario =
"SELECT o.cd_OFICINA, o.ds_OFICINA
FROM ABCHAMADOS.PORTAL_CHAM_CONFIG_PADRAO cp
INNER JOIN dbamv.OFICINA o
  ON cp.CD_OFICINA = o.CD_OFICINA
WHERE UPPER(cp.CD_USUARIO) = UPPER('$var_USUARIO')";

$result_oficina_usuario = oci_parse($conn_ora, $consulta_oficina_usuario);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_oficina_usuario);	
$row_oficina_usuario = oci_fetch_array($result_oficina_usuario);

//////////////////////
//LOCALIDADE USUARIO//
//////////////////////
$consulta_localidade_usuario = 
"SELECT L.CD_LOCALIDADE, L.DS_LOCALIDADE
FROM ABCHAMADOS.PORTAL_CHAM_CONFIG_PADRAO cp
INNER JOIN dbamv.LOCALIDADE L
  ON cp.cd_localidade = L.CD_LOCALIDADE
WHERE UPPER(cp.CD_USUARIO) = UPPER('$var_USUARIO')";

$result_localidade_usuario = oci_parse($conn_ora, $consulta_localidade_usuario);							

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_localidade_usuario);	
$row_localidade_usuario = oci_fetch_array($result_localidade_usuario);


//////////////////////
//MOTIVO OS USUARIO///
//////////////////////
$consulta_mot_serv_usuario = 
"SELECT MOS.CD_MOT_SERV, MOS.DS_MOT_SERV
FROM ABCHAMADOS.PORTAL_CHAM_CONFIG_PADRAO cp
INNER JOIN dbamv.MOT_SERV MOS
 ON cp.CD_MOT_SERV = mos.CD_MOT_SERV
 WHERE UPPER(cp.CD_USUARIO) = UPPER('$var_USUARIO')";

$result_mot_serv_usuario = oci_parse($conn_ora, $consulta_mot_serv_usuario);							

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_mot_serv_usuario);	
$row_mot_serv_usuario = oci_fetch_array($result_mot_serv_usuario);

/////////////////////
//EMAIL USUARIO//
/////////////////////
$consulta_email_usuario =
"SELECT cp.DS_EMAIL_ALTERNATIVO
FROM ABCHAMADOS.PORTAL_CHAM_CONFIG_PADRAO cp
WHERE UPPER(cp.CD_USUARIO) = UPPER('$var_USUARIO')";

$result_email_usuario = oci_parse($conn_ora, $consulta_email_usuario);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_email_usuario);	
$row_email_usuario = oci_fetch_array($result_email_usuario);

  /////////////////
 //RAMAL USUARIO//
/////////////////

$consulta_ramal_usuario =
"SELECT cp.DS_RAMAL
FROM ABCHAMADOS.PORTAL_CHAM_CONFIG_PADRAO cp
WHERE UPPER(cp.CD_USUARIO) = UPPER('$var_USUARIO')";

$result_ramal_usuario = oci_parse($conn_ora, $consulta_ramal_usuario);

//EXECUTANDO A CONSULTA SQL (ORACLE)
oci_execute($result_ramal_usuario);	
$row_ramal_usuario = oci_fetch_array($result_ramal_usuario);


?>