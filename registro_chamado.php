<?php 
session_start();
include 'cabecalho.php';
include 'conexao.php';
include 'config_padrao_sql.php';
include 'config_padrao_usuario_sql.php';

?>

<h11><i class="fas fa-user-alt"></i> Registro de Chamados</h11>
<h27> <a href="home.php" style="color: #444444; text-decoration: none;"> <i class="fa fa-reply" aria-hidden="true"></i> Voltar </a> </h27> 

<form type=post action="registro_chamado.php">
<div class="div_br"></div>
<div class="div_br"></div>
<div class="fnd_azul">
CHAMADO
</div>
<div class="div_br"></div>
<div class="form-row">
    <div class="col-md-1">
        Código:
        <input class="form-control" type="number" name="cd_os" id="id_cd_os" required>
    </div>
    <div class="col-md-3">
        Descrição:
        <input class="form-control" type="text" name="ds_servico" id="id_ds_servico" required>
    </div>
    <div class="col-md-3">
        Data Pedido:
        <input class="form-control" type="datetime-local" name="dt_pedido" id="data_pedido" onblur="foca_data_maior()" required>
    </div>
    <div class="col-md-3">
        Data encerramento:
        <input class="form-control" type="datetime-local" name="dt_enceramento" id="data_encerramento" onblur="foca_data_maior()" required>
    </div>
    <div class="col-md-2">
        Nome Usuario:
        <input class="form-control" type="text" name="cd_responsavel" id="id_cd_responsavel" value="<?php echo @$_SESSION['usuarioLogin2'];?>" disabled>
    </div>
</div>
<div class="form-row">
    <div class="col-md-2">
        <!--auto complete-->
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
                $placeholder_botao = 'LOGIN';
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
    <div class="col-md-6">
        Observação:
        <input class="form-control" type="text" name="ds_observacao" id="id_ds_observacao"required>
    </div>
    <div class="col-md-3">
        Funcionario Responsavel:
        <input class="form-control" type="text" name="cd_responsavel" id="id_cd_responsavel" value="<?php echo @$_SESSION['usuarioLogin2'];?>" >
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
    <div class="col-md-2">
        Código do Serviço:
        <input class="form-control" type="number" name="cd_servico" id="id_cd_servico" required >
    </div>
    <div class="col-md-3">
        Hora inicial:
        <input class="form-control" type="datetime-local" name="hr_inicial" id="data_menor"
        onblur="foca_data_maior()" required>
    </div>
    <div class="col-md-3">
        Hora final:
        <input class="form-control" type="datetime-local" name="hr_final" id="data_maior" 
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

<div class="form-row">
               
               <!--SETOR-->
                <div class="form-group col-md-4">
                <label>Setor</label>
                <select name="frm_setor_chamado" class="form-control" disabled>
                
                <!--IF USUARIO-->
                <?php
                    //SE JA EXISTIR SETOR CADASTRADO PARA O USUARIO LOGADO
                    if(isset($row_setor_usuario['CD_SETOR'])){
                    //EXIBA ELE
                    echo   '<option value="'. $row_setor_usuario['CD_SETOR'] . '">' . $row_setor_usuario['NM_SETOR']. '</option>';
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
                <select name="frm_especialidade_chamado" class="form-control" disabled>
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
                    <select name="frm_oficina_chamado" class="form-control" disabled>

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
                    <select name="frm_localidade_chamado" class="form-control" disabled>
                  
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

                 <!--MOTIVO DO SERVICO-->
                 <div class="form-group col-md-4">
                    <label>Motivo da OS</label>
                    <select name="frm_motivo_os_chamado" class="form-control" disabled>
                    
                    
                        <?php
                             //SE JA EXISTIR MOTIVO CADASTRADO PARA O USUARIO LOGADO
                             if(isset($row_motivo_os_usuario['CD_TIPO_OS'])){
                                //EXIBA ELE
                                echo  '<option value="'. $row_motivo_os_usuario['CD_TIPO_OS'] . '">' . $row_motivo_os_usuario['DS_TIPO_OS']. '</option>';
                                } else {
                                
                                    //SENAO SOLICITA QUE SE SELECIONE UM VALOR
                                    echo "<option value=''>SELECIONE UM VALOR</option>";
                                }

                        while($row_motivo_os = oci_fetch_array($result_tipo_os)){ 

                            echo '<option value="' .$row_motivo_os['CD_TIPO_OS'] . '">' . $row_motivo_os['DS_TIPO_OS'] . '</option>';
                            }
                        ?>
                    </select>                            
                </div>

                <!--TIPO DO SERVICO-->
                <div class="form-group col-md-4">
                    <label>Tipo do Serviço</label>
                    <select name="frm_tipo_os_chamado" class="form-control" disabled>
                   

                        <?php
                              //SE JA EXISTIR TIPO DO SERVICO CADASTRADO PARA O USUARIO LOGADO
                              if(isset($row_mot_serv_usuario['CD_MOT_SERV'])){
                                 //EXIBA ELE
                                 echo  '<option value="'. $row_mot_serv_usuario['CD_MOT_SERV'] . '">' . $row_mot_serv_usuario['DS_MOT_SERV']. '</option>';
                                 } else {
                                    
                                        //SENAO SOLICITA QUE SE SELECIONE UM VALOR
                                        echo "<option value=''>SELECIONE UM VALOR</option>";}

                        while($row_mot_serv = oci_fetch_array($result_mot_serv)){	

                            echo  '<option value="'. $row_mot_serv['CD_MOT_SERV'] . '">' . $row_mot_serv['DS_MOT_SERV'] . '</option>';
                            }
                        ?>
                    </select>
                </div>

                <!--EMAIL-->
                <div class="form-group col-md-4">
                    <label>E-mail</label>
                    <input name="frm_email_chamado" input type="email" class="form-control"  
                        value="<?php
                              //SE JA EXISTIR TIPO DO SERVICO CADASTRADO PARA O USUARIO LOGADO
                              if(isset($row_email_usuario['DS_EMAIL_ALTERNATIVO'])){
                                 //EXIBA ELE
                                 echo   $row_email_usuario['DS_EMAIL_ALTERNATIVO'];}
                                 
                                      
                                 ?>"         
                     disabled>
                </div>

                <!--RAMAL-->
                <div class="form-group col-md-2">
                    <label>Ramal</label>
                    <input type="number_chamado" class="form-control" name="frm_ramal" 
                      value = "<?php
                              //SE JA EXISTIR TIPO DO SERVICO CADASTRADO PARA O USUARIO LOGADO
                              if(isset($row_ramal_usuario['DS_RAMAL'])){
                                 //EXIBA ELE
                                 echo   $row_ramal_usuario['DS_RAMAL'];}
                                 
                                      
                                 ?>"
                    disabled>
                </div>       
         </div>           
         <button type="submit" class="btn btn-primary">Salvar</button>                           
</form>
<?php
include 'rodape.php';
include 'validacao_date.php';
?>
