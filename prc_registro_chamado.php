<?php

 //CONEXAO
 include 'conexao.php';

 session_start();

//VALIDANDO ENVIO DE FORMULARIO (POST)
//if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    $var_codigo = $_POST['cd_os'];
    $var_descricao = $_POST['ds_servico'];
    $var_data_pedido = $_POST['dt_pedido'];
    $var_data_encerramento = $_POST['dt_encerramento'];
    $var_usuario_responsavel = $_SESSION['usuarioLogin2'];
    $var_solicitante = $_POST['input_valor'];
    $var_observacao = $_POST['ds_observacao'];
    $var_cd_servico = $_POST['cd_servico'];
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
    echo '</br>CODIGO:'; echo $var_codigo;
    echo '</br>DESCRIÇÂO:'; echo $var_descricao;
    echo '</br>DATA PEDIDO:'; echo $var_data_pedido;
    echo '</br>DATA ENCERRAMENTO:'; echo $var_data_encerramento;
    echo '</br>USUARIO RESPONSAVEL:'; echo $var_usuario_responsavel;
    echo '</br>SOLICITANTE:'; echo $var_solicitante;
    echo '</br>OBSERVAÇÂO:'; echo $var_observacao;
    echo '</br>CODIGO DE SERVIÇO:'; echo $var_cd_servico;
    echo '</br>HORA INICIAL:'; echo $var_hr_inicial;
    echo '</br>HORA FINAL:'; echo $var_hr_final;
?>
