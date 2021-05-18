<?php

 //CONEXAO
 include 'conexao.php';

//VALIDANDO ENVIO DE FORMULARIO (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //RECEBEDO VARIAVEIS 
    $var_usuario = 'AMONTENEGRO'; 
    $var_setor = $_POST['frm_setor'];
    $var_especialidade = $_POST['frm_especialidade'];
    $var_oficina = $_POST['frm_oficina'];
    $var_localidade = $_POST['frm_localidade'];
    $var_motivo_os = $_POST['frm_motivo_os'];
    $var_tipo_os = $_POST['frm_tipo_os'];
    $var_email = $_POST['frm_email'];
    $var_ramal = $_POST['frm_ramal'];
    

    //EXIBINDO VARIAVÉS
    echo '</br>USUARIO: '; echo $var_usuario;
    echo '</br>CD_SETOR: '; echo $var_setor;
    echo '</br>CD_ESPECIALIDADE: '; echo $var_especialidade;
    echo '</br>CD_OFICINA: '; echo $var_oficina;
    echo '</br>DS_LOCALIDADE:'; echo $var_localidade;
    echo '</br>OFICINA:' ; echo $var_motivo_os;
    echo '</br>CD_TIPO_OS:' ; echo $var_tipo_os;
    echo '</br>EMAIL:' ; echo $var_email;
    echo '</br>RAMAL:' ; echo $var_ramal;


    $deleta_config_padrao = "DELETE FROM PORTAL_CHAM_CONFIG_PADRAO WHERE UPPER(CD_USUARIO) = '$var_usuario'";
    
    //EXECUTANDO NO  BANCO
    $result_deleta = oci_parse($conn_ora, $deleta_config_padrao);

    //EXECUTANDO A CONSULTA SQL (ORACLE)
    oci_execute($result_deleta);  
   
   
   $inserir_config_padrao = "INSERT INTO PORTAL_CHAM_CONFIG_PADRAO
                            (CD_USUARIO, CD_SETOR, CD_ESPEC, CD_TIPO_OS, CD_LOCALIDADE,
                            CD_MOT_SERV, CD_SERVICO, DS_EMAIL_ALTERNATIVO, DS_RAMAL)
                            VALUES (UPPER('$var_usuario'),'$var_setor','$var_especialidade','$var_oficina',
                                    '$var_localidade','$var_motivo_os','$var_tipo_os','$var_email','$var_ramal')";
    
    echo '<br>';

    echo $inserir_config_padrao;


    //EXECUTANDO NO  BANCO
    $result_config_padrao = oci_parse($conn_ora, $inserir_config_padrao);

    //EXECUTANDO A CONSULTA SQL (ORACLE)
    oci_execute($result_config_padrao);

    header("location: config_padrao.php");



}


        

         ?>


