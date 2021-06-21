<?php

 //CONEXAO
 include 'conexao.php';

 session_start();

//VALIDANDO ENVIO DE FORMULARIO (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //RECEBEDO VARIAVEIS PADRAO
    $var_usuario = $_SESSION['usuarioLogin2'];
    $var_cd_func = $_POST['frm_cd_func'];
    $var_nm_func = $_POST['frm_nm_func']; 
    $var_setor =  $_POST['frm_setor'];
    $var_especialidade = $_POST['frm_especialidade'];
    $var_oficina = $_POST['frm_oficina'];
    $var_localidade = $_POST['frm_localidade'];
    $var_motivo_os = $_POST['frm_motivo_os'];
    $var_tipo_os = $_POST['frm_tipo_os'];
    $var_email = $_POST['email'];
    $var_ramal = $_POST['ramal'];
    //RECEBENDO VARIAVEIS REGISTRO CHAMADO
    //$var_codigo = $_POST['cd_os'];
    $var_descricao = $_POST['ds_servico'];
    $var_data_pedido =  date('d/m/Y H:m:s', strtotime($_POST['dt_pedido']));
    $var_data_encerramento =  date('d/m/Y H:m:s', strtotime($_POST['dt_encerramento']));
    $var_usuario_responsavel = $_SESSION['usuarioLogin2'];
    $var_solicitante = $_POST['input_valor'];
    $var_observacao = $_POST['ds_observacao'];
    $var_cd_servico = $_POST['input_valor_servico'];
    $var_hr_inicial =  date('d/m/Y H:m:s', strtotime($_POST['hr_inicial']));
    $var_hr_final =  date('d/m/Y H:m:s', strtotime($_POST['hr_final']));



    //EXIBINDO VARIAVÉS PADRAO
    echo '</br>USUARIO: '; echo $var_usuario;
    echo '</br>CD_FUNC: '; echo $var_cd_func;
    echo '</br>NM_FUNC: '; echo $var_nm_func;
    echo '</br>CD_SETOR: '; echo $var_setor;
    echo '</br>CD_ESPECIALIDADE: '; echo $var_especialidade;
    echo '</br>CD_OFICINA: '; echo $var_oficina;
    echo '</br>DS_LOCALIDADE:'; echo $var_localidade;
    echo '</br>OFICINA:' ; echo $var_motivo_os;
    echo '</br>CD_TIPO_OS:' ; echo $var_tipo_os;
    echo '</br>EMAIL:' ; echo $var_email;
    echo '</br>RAMAL:' ; echo $var_ramal;
    echo '</br>RAMAL:' ; echo $var_cd_func; 
    //EXIBIR VARIAVEIS REGISTRO CHAMADO
    echo '</br>CODIGO: SERÁ UM NEXTVAL';
    echo '</br>DESCRIÇÂO:'; echo $var_descricao;
    echo '</br>DATA PEDIDO:'; echo $var_data_pedido;
    echo '</br>DATA ENCERRAMENTO:'; echo $var_data_encerramento;
    echo '</br>USUARIO RESPONSAVEL:'; echo $var_usuario_responsavel;
    echo '</br>SOLICITANTE:'; echo $var_solicitante;
    echo '</br>OBSERVAÇÂO:'; echo $var_observacao;
    echo '</br>TIPO DO SERVIÇO:'; echo $var_cd_servico;
    echo '</br>HORA INICIAL:'; echo $var_hr_inicial;
    echo '</br>HORA FINAL:'; echo $var_hr_final;

    ////////////////////
   ///CODIGO SERVICO///
  ////////////////////

  $consulta_cd_servico = 
  "SELECT CD_SERVICO, NM_SERVICO
  FROM dbamv.MANU_SERV ms
  WHERE ms.CD_ITEM_RES = '186'
  AND ms.NM_SERVICO = '$var_cd_servico'";

  $result_cd_servico = oci_parse($conn_ora, $consulta_cd_servico);							

  //EXECUTANDO A CONSULTA SQL (ORACLE)
  oci_execute($result_cd_servico);	
  $row_cd_servico = oci_fetch_array($result_cd_servico);

    echo '</br>CODIGO DO SETOR:'; echo @$row_cd_servico['CD_SERVICO'];

  $cd_tp_servico = $row_cd_servico['CD_SERVICO'];  
   ////////////////////
  ///NOME USUARIO/////
 ////////////////////

  $consulta_nm_usuario = 
  "SELECT DISTINCT usu.nm_usuario, usu.cd_usuario
  FROM dbasgu.USUARIOS usu
  INNER JOIN dbasgu.PAPEL_USUARIOS pu
  ON pu.CD_USUARIO = usu.CD_USUARIO
  WHERE usu.SN_ATIVO = 'S'
  AND USU.CD_USUARIO = UPPER('$var_usuario_responsavel')";

  $result_nm_usuario = oci_parse($conn_ora, $consulta_nm_usuario);							

  //EXECUTANDO A CONSULTA SQL (ORACLE)
  oci_execute($result_nm_usuario);	
  $row_nm_usuario = oci_fetch_array($result_nm_usuario);

    $var_nome = $row_nm_usuario['NM_USUARIO'];
    echo '</br>NOME USUARIO:'; echo $var_nome ;

   ////////////////////
  ///CONSULTA BANCO/// 
 ////////////////////


//nextval os
  $consulta_nextval="SELECT SEQ_OS.NEXTVAL AS CD_OS FROM DUAL";

  $result_nextval = oci_parse($conn_ora, $consulta_nextval);							

//EXECUTANDO A CONSULTA SQL (ORACLE) [VALIDANDO AO MESMO TEMPO]
  $nextval = oci_execute($result_nextval);
  $row_nextval = oci_fetch_array($result_nextval);

  $var_nextval = $row_nextval['CD_OS']; 
//nextval serviço
  $consulta_nextval_serv="SELECT SEQ_ITOS.NEXTVAL AS CD_ITSOLICITACAO_OS FROM DUAL";

  $result_nextval_serv = oci_parse($conn_ora, $consulta_nextval_serv);							

//EXECUTANDO A CONSULTA SQL (ORACLE) [VALIDANDO AO MESMO TEMPO]
  $nextval_serv = oci_execute($result_nextval_serv);
  $row_nextval_serv = oci_fetch_array($result_nextval_serv);

  $var_nextval_serv = $row_nextval_serv['CD_ITSOLICITACAO_OS']; 



  //////////////////
 ////////OS////////
//////////////////
  $consulta_tb_os = "INSERT INTO dbamv.SOLICITACAO_OS 
  SELECT $var_nextval AS CD_OS,
  TO_DATE('$var_data_pedido', 'dd/mm/yy hh24:mi:ss') AS DT_PEDIDO,
  '$var_descricao' as DS_SERVICO, 
  '$var_observacao' as DS_OBSERVACAO,
  TO_DATE('$var_data_encerramento', 'dd/mm/yy hh24:mi:ss') AS DT_EXECUCAO,
  NULL as DT_PREV_EXEC,
  '$var_solicitante' as NM_SOLICITANTE,
  'C' as TP_SITUACAO,
  '$var_setor' as CD_SETOR, 
  1 as CD_MULTI_EMPRESA,
  '$var_especialidade' as CD_ESPEC,
  29 as CD_TIPO_OS, 
  '$var_nome' as NM_USUARIO,
  SYSDATE as DT_ULTIMA_ATUALIZACAO, 
  '$var_localidade' as CD_LOCALIDADE, 
  'I' as TP_LOCAL,
  NULL as CD_BEM,
  NULL as TP_MOT_CORRET,
  'S' as SN_SOL_EXTERNA,
  NULL as CD_FORNECEDOR,
  '$var_oficina' as CD_OFICINA,
  'S' as SN_ORDEM_SERVICO_PRINCIPAL,
  NULL as CD_ORDEM_SERVICO_PRINCIPAL,
  '$var_motivo_os' as CD_MOT_SERV,
  NULL as SN_OS_IMPRESSA,
  NULL DT_HORA_IMPRESSAO,
  NULL as CD_OS_INTEGRA,
  NULL as CD_ORDEM_SERVICO_PRINC_INTEGRA,
  NULL as CD_SEQ_INTEGRA,
  NULL as DT_INTEGRA,
  'N' as N_PACIENTE,
  NULL as CD_LEITO,
  NULL as CD_MOV_INT,
  '$var_email' as DS_EMAIL_ALTERNATIVO,
  '$var_ramal' as DS_RAMAL,
  NULL as CD_USUARIO_REPROVA_OS,
  NULL DT_USUARIO_REPROVA_OS,
  TO_DATE(SYSDATE,'dd/mm/yy') DT_ENTREGA, 
  'E' as TP_PRIORIDADE,
  NULL as QT_PRONTUARIOS,
  'N' as SN_RECEBIDA,
  UPPER('$var_usuario_responsavel') as CD_RESPONSAVEL,
  'N' as SN_ETIQUETA_IMPRESSA,
  'N' as SN_EMAIL_ENVIADO,
  NULL as CD_PROGRAMACAO_PLANO,
  'C' as TP_CLASSIFICACAO,
  NULL as DS_SERVICO_GERAL,
  NULL as CD_USUARIO_CADASTRO_SOL_SERV,
  NULL DT_USUARIO_CADASTRO_SOL_SERV,
  UPPER('$var_usuario_responsavel') as CD_USUARIO_CADASTRO_OS,
  NULL DT_USUARIO_CADASTRO_OS,
  NULL as CD_USUARIO_ULTIMA_MODIFICACAO,
  NULL DT_USUARIO_ULTIMA_MODIFICACAO,
  '$var_solicitante' as CD_USUARIO_RECEBE_SOL_SERV,
  NULL DT_USUARIO_RECEBE_SOL_SERV,
  NULL as CD_USUARIO_FECHA_OS,
  NULL DT_USUARIO_FECHA_OS,
  NULL as CD_USUARIO_GERA_OS,
  NULL DT_USUARIO_GERA_OS,
  NULL as DS_CONCLUIDO,
  NULL as CD_PLANO,
  NULL as DS_JUSTIFICA_CANCELAMENTO,
  NULL DT_CANCELAMENTO,
  NULL as CD_USUARIO_CANCELAMENTO,
  NULL as TP_PRIORIDADE_MODIFIC_NO_RECEB
  FROM DUAL";

  echo '</br>' . $consulta_tb_os . '</br>';

  $result_tb_os = oci_parse($conn_ora, $consulta_tb_os);							

  //EXECUTANDO A CONSULTA SQL (ORACLE) [VALIDANDO AO MESMO TEMPO]
   
  $valida_chamado = oci_execute($result_tb_os);

  //$var_total_hora = $var_hr_final - $var_hr_inicial;

  /////////////////////////
 /////////Serviço/////////
/////////////////////////

$consulta_tb_serv="INSERT INTO itsolicitacao_os
SELECT
$var_nextval_serv AS CD_ITSOLICITACAO_OS,
TO_DATE('$var_hr_final', 'dd/mm/yy hh24:mi:ss') AS HR_FINAL,
TO_DATE('$var_hr_inicial', 'dd/mm/yy hh24:mi:ss') AS HR_INICIO,
NULL AS VL_TEMPO_GASTO,
$var_nextval AS CD_OS,
$var_cd_func AS CD_FUNC,
$cd_tp_servico AS CD_SERVICO,
NULL AS VL_TEMPO_GASTO_MIN,
NULL AS DS_SERVICO,
'S' AS SN_CHECK_LIST,
NULL AS VL_REAL,
NULL AS CD_BEM,
NULL AS VL_REFERENCIA,
NULL AS CD_LEITURA,
NULL AS VL_HORA,
NULL AS VL_HORA_EXTRA,
NULL AS VL_EXTRA,
NULL AS VL_EXTRA_MIN,
NULL AS DS_FUNCIONARIO,
NULL AS CD_ITSOLICITACAO_OS_INTEGRA,
NULL AS CD_SEQ_INTEGRA,
NULL AS DT_INTEGRA,
NULL AS CD_ITSOLICITACAO_OS_FILHA,
NULL AS CD_TIPO_PROCEDIMENTO_PLANO  
FROM DUAL
";
echo "--------------------------------------------------------------------------------------------------</br>";
echo $consulta_tb_serv;

$result_tb_serv = oci_parse($conn_ora, $consulta_tb_serv);							

//EXECUTANDO A CONSULTA SQL (ORACLE) [VALIDANDO AO MESMO TEMPO]
 
$valida_servico = oci_execute($result_tb_serv);

/////////////
  //VALIDACAO
  if (!$valida_chamado && !$valida_servico) {   

    $erro = oci_error($result_tb_os);																							
    $_SESSION['msgerro'] = htmlentities($erro['message']);
    //header('location: registro_chamado.php'); 
    return 0;

  }else {

    $_SESSION['msg'] = 'Chamado registrado com sucesso com sucesso!';
    //header('location: home.php'); 

  }
}
?>