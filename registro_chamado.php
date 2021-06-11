<?php 
    session_start();
    include 'cabecalho.php';
    include 'conexao.php';
     //////////////////
    ///////SQL////////
   //////////////////
    include 'config_padrao_sql.php';
    include 'config_padrao_usuario_sql.php';

?>

<h11><i class="fas fa-user-alt"></i> Registro de Chamados</h11>
<h27> <a href="home.php" style="color: #444444; text-decoration: none;"> <i class="fa fa-reply" aria-hidden="true"></i> Voltar </a> </h27>

</br>

 <!--MENSAGENS-->
 <?php
        include 'js/mensagens.php';
        include 'js/mensagens_usuario.php';
?>

<form method="post" action="prc_registro_chamado.php">
    <div class="div_br"></div>
    <div class="div_br"></div>
    <!-------------------CHAMADOS------------------------------------------->
    <div class="fnd_azul">
        Chamado
    </div>
    <div class="div_br"></div>
        <div class="form-row">
            <!-------DESCRIÇÃO---------------->
            <div class="col-md-12">
                Descrição:
                <input class="form-control" type="text" name="ds_servico" id="id_ds_servico" required>
            </div>
            <!--------DATA PEDIDO-------------->
            <div class="col-md-3">
                Data Pedido:
                <input class="form-control" type="datetime-local" name="dt_pedido" id="id_data_pedido" onblur="valida_data()" required>
            </div>
            <!--------DATA ENCERRAMENTO-------->
            <div class="col-md-3">
                Data encerramento:
                <input class="form-control" type="datetime-local" name="dt_encerramento" id="id_data_encerramento" onblur="valida_data()" required>
            </div>
            <!--------MOTIVO DO SERVICO-------->
            <div class="form-group col-md-4">
                Motivo da OS
                <select name="frm_motivo_os" class="form-control">
                <?php      
                
                    $var_real_cd_tipo_os = $row_tipo_os_usuario['CD_TIPO_OS'];
                     
                     $consulta_mot_serv_real = "SELECT MOS.CD_MOT_SERV, MOS.DS_MOT_SERV
                                                FROM dbamv.MOT_SERV MOS
                                                WHERE MOS.CD_TIPO_OS = $var_real_cd_tipo_os";
 
                     echo $consulta_mot_serv_real;
 
                     $result_mot_serv_real = oci_parse($conn_ora, $consulta_mot_serv_real);							
 
                     //EXECUTANDO A CONSULTA SQL (ORACLE)
                     oci_execute($result_mot_serv_real);	
 
                    while($row_mot_serv_real = oci_fetch_array($result_mot_serv_real)){	
                        echo  '<option value="'. $row_mot_serv_real['CD_MOT_SERV'] . '">' . $row_mot_serv_real['DS_MOT_SERV'] . '</option>';
                    }
                ?>
                </select>
            </div>

        </div>
        <div class="form-row">
            <!--------FUNCIONARIO RESPONSAVEL-->
            <div class="col-md-3">
                Funcionario Responsavel:
                <input class="form-control" type="text" name="cd_responsavel" id="id_cd_responsavel" value="<?php echo @$_SESSION['usuarioLogin2'];?>" disabled>
            </div>

            <div class="col-md-3">
                Solicitante:
                    <!--auto complete funcionario responsavel-->
                    <?php 

                        //CLASSE BOTAO
                        //$classe_botao = 'fas fa-plus'; //ADICIONAR
                        $classe_botao = 'fas fa-search'; //PESQUISAR

                        //ACAO BOTAO
                        $pagina_acao = 'permissoes.php';

                        //PLACEHOLDER BOTAO
                        if (!empty($filtro_cd_matricula)){
                            $placeholder_botao = $filtro_cd_matricula;
                        }else{
                            $placeholder_botao= 'LOGIN';
                        }

                        //CONSULTA_LISTA
                        $consulta_lista = "SELECT DISTINCT usu.*
                                        FROM dbasgu.USUARIOS usu
                                        INNER JOIN dbasgu.PAPEL_USUARIOS pu
                                            ON pu.CD_USUARIO = usu.CD_USUARIO
                                        WHERE usu.SN_ATIVO = 'S'";

                        $result_lista = oci_parse($conn_ora, $consulta_lista);																									

                        //EXECUTANDO A CONSULTA SQL (ORACLE)
                        oci_execute($result_lista);            

                    ?>

                    <script>

                        //LISTA
                        var countries = [     
                        <?php
                            while($row_lista = oci_fetch_array($result_lista)){	
                                echo '"'. $row_lista['CD_USUARIO'] .'"'.',';                
                            }
                        ?>
                        ];

                    </script>

                    <?php
                        //AUTOCOMPLETE
                        include 'autocomplete.php';

                    ?>
                                    
                    <!--FIM CAIXA AUTOCOMPLETE-->     
            </div>
            <!--------OBSERVAÇÃO--------------->
            <div class="col-md-6">
                Observação:
                <input class="form-control" type="text" name="ds_observacao" id="id_ds_observacao"required>
            </div>
        </div>
    <!--------------------------------------------------SERVIÇO---------------------------------------------->
        <div class="div_br"></div>
        <div class="div_br"></div>
        <div class="fnd_azul">
            Serviço
        </div>
        <div class="div_br"></div>
        <div class="div_br"></div>

        <div class="form-row">
            <!--------TIPO DE SERVIÇO---------->
            <div class="col-md-3">
                Tipo do Serviço:
                <!--auto complete serviço-->
                <?php 
                
                        //CLASSE BOTAO
                        //$classe_botao = 'fas fa-plus'; //ADICIONAR
                        $classe_botao = 'fas fa-search'; //PESQUISAR

                        //ACAO BOTAO
                        $pagina_acao = 'permissoes.php';

                        //PLACEHOLDER BOTAO
                        if (!empty($filtro_filtro_cd_servico)){
                            $placeholder_botao_servico = $filtro_cd_servico;
                        }else{
                            $placeholder_botao_servico= 'SERVIÇO';
                        }

                        //CONSULTA_LISTA
                        $consulta_lista_servico = "SELECT *
                                                FROM dbamv.MANU_SERV ms
                                                WHERE ms.CD_ITEM_RES = 186";

                        $result_lista_servico = oci_parse($conn_ora, $consulta_lista_servico);																									

                        //EXECUTANDO A CONSULTA SQL (ORACLE)
                        oci_execute($result_lista_servico);            

                    ?>

                    <script>

                        //LISTA
                        var countries_servico = [     
                        <?php
                            while($row_lista_servico = oci_fetch_array($result_lista_servico)){	
                                echo '"'. $row_lista_servico['NM_SERVICO'] .'"'.',';                
                            }
                        ?>
                        ];

                    </script>

                    <?php
                        //AUTOCOMPLETE
                        include 'autocomplete_servico.php';

                    ?>
                    <!--FIM CAIXA AUTOCOMPLETE-->  
            </div>
            <!--------HORA INICIAL------------->
            <div class="col-md-3">
                Hora inicial:
                <input class="form-control" type="datetime-local" name="hr_inicial" id="id_data_menor"
                onblur="foca_data_maior()" required>
            </div>
            <!--------HORA FNAL---------------->
            <div class="col-md-3">
                Hora final:
                <input class="form-control" type="datetime-local" name="hr_final" id="id_data_maior" 
                min="1997-01-01"  max="2999-12-31" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}"
                onblur="valida_data()" required>
            </div>

        </div>
    <!------------------------CONFIGURAÇÃO PADRÃO-------------------------------------------------------------->
    <div class="div_br"></div>
    <div class="div_br"></div>
    <div class="fnd_azul">
    Configuração Padrão
    </div>
    <div class="div_br"></div>
    <div class="div_br"></div>

        <!--PRIMEIRA LINHA-->
    <div class="form-row">

            <!--USUARIO-->
            <div class="form-group col-md-4">
                <label>Usuário</label>
                <input type="text" value="<?php echo @$_SESSION['usuarioLogin2'];?>" class="form-control" name="frm_usuario" disabled>
            </div>

                    
            <!--SETOR-->
            <div class="form-group col-md-4">
                <label>Setor</label>


                <!--HIDDEN-->
                <input type="hidden" value="<?php echo $row_setor_usuario['CD_SETOR'];?>" class="form-control" name="frm_setor">

                <select name="frm_setor_show" class="form-control" disabled>
                    
                <!--IF USUARIO-->
                <?php
                    //SE JA EXISTIR SETOR CADASTRADO PARA O USUARIO LOGADO
                    if(isset($row_setor_usuario['CD_SETOR'])){
                    //EXIBA ELE
                    echo  '<option value="'. $row_setor_usuario['CD_SETOR'] . '">' . $row_setor_usuario['NM_SETOR']. '</option>';
                    } else {
                    //SENAO SOLICITA QUE SE SELECIONE UM VALOR
                    echo "<option value=''>SELECIONE UM VALOR</option>";
                    }

                ?>

                <!--TRAS TODOS OS SETORES ATIVOS-->
                <?php
                    //EXIBE TODAS AS OPCOES
                    while($row_setor = oci_fetch_array($result_setor)){	

                        echo  '<option value="'. $row_setor['CD_SETOR'] . '">' . $row_setor['NM_SETOR']. '</option>';
                                
                    }
                ?>
                </select>
            </div>

            <!--ESPECIALIDADE-->
            <div class="form-group col-md-4">
                <label>Especialidade</label>

                <!--HIDDEN-->
                <input type="hidden" value="<?php echo $row_especialidade_usuario['CD_ESPEC'];?>" class="form-control" name="frm_especialidade">



                <select name="frm_especialidade_show" class="form-control" disabled>
                <?php
                    //SE JA EXISTIR ESPECIALIDADE CADASTRADO PARA O USUARIO LOGADO
                    if(isset($row_especialidade_usuario['CD_ESPEC'])){
                        //EXIBA ELE
                        echo  '<option value="'. $row_especialidade_usuario['CD_ESPEC'] . '">' . $row_especialidade_usuario['DS_ESPEC']. '</option>';
                    } else {
                        //SENAO SOLICITA QUE SE SELECIONE UM VALOR
                        echo "<option value=''>SELECIONE UM VALOR</option>";
                    }
                ?>

                <?php
                    //EXIBE TODAS AS OPCOES

                    while($row_especialidade = oci_fetch_array($result_especialidade)){	

                        echo  '<option value="'. $row_especialidade['CD_ESPEC'] . '">' . $row_especialidade['DS_ESPEC']. '</option>';
                                        
                    }              
                ?>
                </select>
            </div>

            <!--SEGUNDA LINHA -->

            <!--OFICINA-->
            <div class="form-group col-md-4">
                <label>Oficina</label>

                <select name="frm_oficina" class="form-control" hidden>

                <!--IF USUARIO-->
                <?php
                    //SE JA EXISTIR SETOR CADASTRADO PARA O USUARIO LOGADO
                    if(isset($row_oficina_usuario['CD_OFICINA'])){
                        //EXIBA ELE
                        echo  '<option value="'. $row_oficina_usuario['CD_OFICINA'] . '">' . $row_oficina_usuario['DS_OFICINA']. '</option>';
                    } else {
                        //SENAO SOLICITA QUE SE SELECIONE UM VALOR
                            echo "<option value=''>SELECIONE UM VALOR</option>";
                    }

                ?>
                    
                <?php
                    while($row_oficina = oci_fetch_array($result_oficina)){ 

                        echo '<option value="' .$row_oficina['CD_OFICINA'] . '">' . $row_oficina['DS_OFICINA']. '</option>';
                    }
                ?>
                </select>

                <select name="frm_oficina_show" class="form-control" disabled>

                    <!--IF USUARIO-->
                    <?php
                        //SE JA EXISTIR SETOR CADASTRADO PARA O USUARIO LOGADO
                        if(isset($row_oficina_usuario['CD_OFICINA'])){
                            //EXIBA ELE
                            echo  '<option value="'. $row_oficina_usuario['CD_OFICINA'] . '">' . $row_oficina_usuario['DS_OFICINA']. '</option>';
                        } else {
                            //SENAO SOLICITA QUE SE SELECIONE UM VALOR
                                echo "<option value=''>SELECIONE UM VALOR</option>";
                        }

                    ?>
                    
                    <?php
                        while($row_oficina = oci_fetch_array($result_oficina)){ 

                            echo '<option value="' .$row_oficina['CD_OFICINA'] . '">' . $row_oficina['DS_OFICINA']. '</option>';
                        }
                    ?>
                </select>
            </div>       

            <!--LOCALIDADE-->
            <div class="form-group col-md-4">
                <label>Localidade</label>
                <select name="frm_localidade" class="form-control" required>
                    
                    <?php

                        //SE JA EXISTIR LOCALIDADE CADASTRADO PARA O USUARIO LOGADO
                        if(isset($row_localidade_usuario['CD_LOCALIDADE'])){
                            //EXIBA ELE
                            echo  '<option value="'. $row_localidade_usuario['CD_LOCALIDADE'] . '">' . $row_localidade_usuario['DS_LOCALIDADE']. '</option>';
                        } else {
                                    
                            //SENAO SOLICITA QUE SE SELECIONE UM VALOR
                            echo "<option value=''>SELECIONE UM VALOR</option>";
                        }

                        while($row_localidade = oci_fetch_array($result_localidade)){ 

                            echo '<option value="' .$row_localidade['CD_LOCALIDADE'] . '">' . $row_localidade['DS_LOCALIDADE']. '</option>';
                        }
                    ?>
                </select>
            </div>

            <!--TIPO DO SERVICO-->
            <div class="form-group col-md-4">
                <label>Tipo do Serviço </label>

                <!--HIDDEN-->
                <input type="hidden" value="<?php echo $row_tipo_os_usuario['CD_TIPO_OS'];?>" class="form-control" name="frm_tipo_os">

                <select name="frm_tipo_os_show" class="form-control" disabled>
                        
                        
                <?php
                    //SE JA EXISTIR TIPO DO SERVICO CADASTRADO PARA O USUARIO LOGADO
                    if(isset($row_tipo_os_usuario['CD_TIPO_OS'])){
                        //EXIBA ELE
                        
                        echo  '<option value="'. $row_tipo_os_usuario['CD_TIPO_OS'] . '">' . $row_tipo_os_usuario['DS_TIPO_OS']. '</option>';
                    } else {
                                    
                        //SENAO SOLICITA QUE SE SELECIONE UM VALOR
                        echo "<option value=''>SELECIONE UM VALOR</option>";
                    }
                ?>
                <?php
                    while($row_tipo_os = oci_fetch_array($result_tipo_os)){ 

                        echo '<option value="' .$row_tipo_os['CD_TIPO_OS'] . '">' . $row_tipo_os['DS_TIPO_OS'] . '</option>';
                    }
                ?>
                </select>                            
            </div>

           

            <!--EMAIL-->
            <div class="form-group col-md-4">
                <label>E-mail</label>
                <!--HIDDEN-->
                <input type="hidden" value="<?php echo $row_email_usuario['DS_EMAIL_ALTERNATIVO'];?>" class="form-control" name="email">

                <input name="frm_email_show" input type="email" class="form-control"  
                value="<?php echo $row_email_usuario['DS_EMAIL_ALTERNATIVO']; ?>" disabled>         
            
            </div>

            <!--RAMAL-->
            <div class="form-group col-md-2">
                <!--HIDDEN-->
                <input type="hidden" value="<?php echo $row_ramal_usuario['DS_RAMAL'];?>" class="form-control" name="ramal">

                <label>Ramal</label>
                <input type="number" class="form-control" name="frm_ramal_show" 
                value = "<?php echo   $row_ramal_usuario['DS_RAMAL']; ?>"
                disabled>
            </div>                                                 

    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>                           
</form>


<?php
    include 'rodape.php';
?>


<?php
    include 'validacao_date.php';
?>