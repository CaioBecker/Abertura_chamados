<?php 
    session_start();
    include 'cabecalho.php';
    include 'conexao.php';
     //////////////////
    ///////SQL////////
   //////////////////
    include 'config_padrao_sql.php';
    include 'config_padrao_usuario_sql.php';
    include 'registro_chamado_sql.php';

?>

<h11><i class="fas fa-user-alt"></i> Registro de Chamados</h11>
<h27> <a href="home.php" style="color: #444444; text-decoration: none;"> <i class="fa fa-reply" aria-hidden="true"></i> Voltar </a> </h27>

</br>

 <!--MENSAGENS-->
 <?php
            include 'js/mensagens.php';
            include 'js/mensagens_usuario.php';
        ?>

<form autocomplete="off" method="post" action="prc_registro_chamado.php">
    <div class="div_br"></div>
    <div class="div_br"></div>
    <!-------------------CHAMADOS------------------------------------------->
    <div class="fnd_azul">
        Chamado:
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
                <input class="form-control" type="datetime-local" name="dt_pedido" id="id_data_pedido" onblur="valida_data_pedido()" required>
                <!--<input type="hidden" name="dt_pedido" id="id_data_pedido">-->
            </div>
            <!--------DATA ENCERRAMENTO-------->
            <div class="col-md-3">
                Data encerramento:
                <input class="form-control" type="datetime-local" name="dt_encerramento" id="id_data_encerramento" onblur="valida_data_encerramento()"  required>
            </div>
            <!--------MOTIVO DO SERVICO-------->
            <div class="form-group col-md-5">
            Tipo da OS:
                    <select id="id_tip_os" name="frm_tip_os" class="form-control" required>

                        <?php 
                            if(isset($_POST['frm_tip_os'])){
                                echo " <option value= '" . $row_tipo_os['CD_TIPO_OS'] . "'>".$row_tipo_os['DS_TIPO_OS']."</option>";
                            }else{
                            echo " <option value= ''>Tipo de Os</option>";
                            }
                        ?>

                        <?php
                            while($row_tipo_os = oci_fetch_array($result_tipo_os)){	

                                echo "<option value='" . $row_tipo_os['CD_TIPO_OS'] . "'>" . $row_tipo_os['DS_TIPO_OS'] . "</option>";
                            }
                        ?>

                    </select>
            </div>

        </div>
        <div class="form-row">
            <!--------FUNCIONARIO RESPONSAVEL-->
            <div class="col-md-3">
                Funcionario Responsavel:
                <input class="form-control" type="text" name="cd_responsavel" id="id_cd_responsavel" value="<?php echo strtoupper(@$_SESSION['usuarioLogin']);?>" disabled>
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
                        include 'autocomplete_solicitande.php';

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
            <div class="form-group col-md-3">
            Tipo da Serviço:
                    <select id="id_tip_serv" name="frm_tip_serv" class="form-control" required>

                        <?php 
                            if(isset($_POST['frm_tip_serv'])){
                                echo " <option value= '" . $row_tipo_serv['CD_SERVICO'] . "'>".$row_tipo_serv['NM_SERVICO']."</option>";
                            }else{
                            echo " <option value= ''>Tipo de Serviço</option>";
                            }
                        ?>

                        <?php
                            while($row_tipo_serv = oci_fetch_array($result_tipo_serv)){	

                                echo "<option value='" . $row_tipo_serv['CD_SERVICO'] . "'>" . $row_tipo_serv['NM_SERVICO'] . "</option>";
                            }
                        ?>

                    </select>
            </div>
            <div class="col-md-3">
                Motivo do Serviço
            <!--INDICADOR-->                
                <select id="id_mot_serv" name="frm_mot_serv" class="form-control" required>
                       <?php 
                        if(isset($_POST['frm_mot_serv'])){

                            echo " <option value= '" . $row_mot_os['CD_MOTIV_SERV'] . "'>".$row_mot_os['DS_MOTIV_SERV']."</option>";

                            while($row_mot_os = oci_fetch_array($result_mot_os)){
                                echo " <option value= '" . $row_mot_os['CD_MOTIV_SERV'] . "'>".$row_mot_os['DS_MOTIV_SERV']."</option>";
                            }
                        }else{
                        echo " <option value= ''>Selecione um tipo de OS</option>";
                        }
                    ?>
                </select>
               
                <script type="text/javascript">
                    $(function(){
                        $('#id_tip_os').change(function(){
                            if( $(this).val() ) {
                               
                                $('#id_mot_serv').hide();
                                $.getJSON('call_motivo.php?search=',{id_tip_os: $(this).val(), ajax: 'true'}, function(j){
                                    var options = '<option value="">Motivo do servico</option>';
                                    	
                                    for (var i = 0; i < j.length; i++) {
                                        options += '<option value="' + j[i].id_mot_serv + '">' + j[i].mot_serv + '</option>';
                                    }	
                                    $('#id_mot_serv').html(options).show();
                                });
                            } else {
                                $('#id_mot_serv').html('<option value="">Selecione um Setor</option>');
                            }
                        });
                    });
                </script>
            </div>
            <!--------HORA INICIAL------------->
            <div class="col-md-3">
                Hora inicial:
                <input class="form-control" type="datetime-local" name="hr_inicial" id="id_hr_inicial"
                onblur="valida_hora_inicial()"
                 required>
            </div>
            <!--------HORA FNAL---------------->
            <div class="col-md-3">
                Hora final:
                <input class="form-control" type="datetime-local" name="hr_final" id="id_hr_final" 
                onblur="valida_hora_final()" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12">
                Descrição detalhada:
                <input type="text" class="form-control" name="ds_detalhada">
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
                <input type="text" value="<?php echo strtoupper(@$_SESSION['usuarioLogin']);?>" class="form-control" name="frm_usuario" readonly>
            </div>

            <div class="form-group col-md-3">
                <label>Codigo de Funcionário:</label>
                <input type="text" value="<?php echo @$row_cd_func_usuario['CD_FUNC'];?>" class="form-control" id="id_cd_func" name="frm_cd_func" readonly>  
            </div>
            
            <div class="form-group col-md-5">
                <label>Nome do Funcionário:</label>
                <input type="text" value="<?php echo @$row_cd_func_usuario['NM_FUNC'];?>" class="form-control" id="id_nm_func" name="frm_nm_func" readonly>  
            </div>
                    
            <!--SETOR-->
            <div class="form-group col-md-4">
                <label>Setor</label>
                <input type="text" name="frm_setor_show" class="form-control" value="<?php echo $row_setor_usuario['NM_SETOR']; ?>" readonly>
                <input type="hidden" name="frm_setor" value="<?php echo $row_setor_usuario['CD_SETOR']; ?>">
            </div>

            <!--ESPECIALIDADE-->
            <div class="form-group col-md-4">
                <label>Especialidade</label>
                <input type="text" name="frm_especialidade show" value="<?php echo $row_especialidade_usuario['DS_ESPEC']; ?>" class="form-control" readonly>
                <input type="hidden" name="frm_especialidade" value="<?php echo $row_especialidade_usuario['CD_ESPEC']; ?>">        
            </div>

            <!--SEGUNDA LINHA -->

            <!--OFICINA-->
            <div class="form-group col-md-4">
                <label>Oficina</label>
                <input type="text" name="frm_oficina_show" class="form-control" value="<?php echo  $row_oficina_usuario['DS_OFICINA']; ?>" readonly>
                <input type="hidden" name="frm_oficina" value="<?php echo $row_oficina_usuario['CD_OFICINA']; ?>">        
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

        
           

            <!--EMAIL-->
            <div class="form-group col-md-4">
                <label>E-mail</label>
                <input name="email" input type="email" class="form-control"  
                value="<?php echo $row_email_usuario['DS_EMAIL_ALTERNATIVO']; ?>" readonly>         
            </div>

            <!--RAMAL-->
            <div class="form-group col-md-2">
                <label>Ramal</label>
                <input type="number" class="form-control" name="ramal" 
                value = "<?php echo   $row_ramal_usuario['DS_RAMAL']; ?>"readonly>
            </div>                                                 

    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>                           
</form>


<?php
    include 'rodape.php';
?>


<?php
    include 'js_registro_chamado.php';
?>