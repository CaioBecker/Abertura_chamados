<?php

 //CONEXAO
 include 'conexao.php';

 session_start();

//VALIDANDO ENVIO DE FORMULARIO (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //RECEBEDO VARIAVEIS PADRAO
    $var_usuario = $_SESSION['usuarioLogin2']; 
    $var_setor = $_SESSION['setor'];
    $var_especialidade = $_SESSION['especialidade'];
    $var_oficina = $_POST['frm_oficina'];
    $var_localidade = $_POST['frm_localidade'];
    $var_motivo_os = $_POST['frm_motivo_os'];
    $var_tipo_os = $_POST['frm_tipo_os'];
    $var_email = $_SESSION['email'];
    $var_ramal = $_SESSION['ramal'];
    //RECEBENDO VARIAVEIS REGISTRO CHAMADO
    //$var_codigo = $_POST['cd_os'];
    $var_descricao = $_POST['ds_servico'];
    $var_data_pedido = $_POST['dt_pedido'];
    $var_data_encerramento = $_POST['dt_encerramento'];
    $var_usuario_responsavel = $_SESSION['usuarioLogin2'];
    $var_solicitante = $_POST['input_valor'];
    $var_observacao = $_POST['ds_observacao'];
    $var_cd_servico = $_POST['input_valor_servico'];
    $var_hr_inicial = $_POST['hr_inicial'];
    $var_hr_final = $_POST['hr_final'];



    //EXIBINDO VARIAVÉS PADRAO
    echo '</br>USUARIO: '; echo $var_usuario;
    echo '</br>CD_SETOR: '; echo $var_setor;
    echo '</br>CD_ESPECIALIDADE: '; echo $var_especialidade;
    echo '</br>CD_OFICINA: '; echo $var_oficina;
    echo '</br>DS_LOCALIDADE:'; echo $var_localidade;
    echo '</br>OFICINA:' ; echo $var_motivo_os;
    echo '</br>CD_TIPO_OS:' ; echo $var_tipo_os;
    echo '</br>EMAIL:' ; echo $var_email;
    echo '</br>RAMAL:' ; echo $var_ramal;
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

$consulta_tb_os = "INSERT INTO dbamv.SOLICITACAO_OS 
SELECT SEQ_OS.NEXTVAL AS CD_OS, 
SYSDATE AS DT_PEDIDO,
'$var_descricao' as DS_SERVICO, 
'$var_observacao' as DS_OBSERVACAO,
--'$var_data_encerramento' as DT_EXECUCAO,
SYSDATE + 1 AS DT_EXECUCAO,
NULL as DT_PREV_EXEC,
'$var_solicitante' as NM_SOLICITANTE,
'S' as TP_SITUACAO,
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
$valida_chamado = oci_execute($result_tb_os);;  

//VALIDACAO
if (!$valida_chamado) {   

      $erro = oci_error($result_tb_os);																							
      $_SESSION['msgerro'] = htmlentities($erro['message']);
      header('location: registro_chamado.php'); 
      return 0;

  } else {
    
    $_SESSION['msg'] = 'Chamado registrado com sucesso com sucesso!';
       header('location: home.php'); 

  }
}
?>