<?php 
    
    session_start();
    //CABECALHO
    include 'cabecalho.php';
    //CONEXAO
    include 'conexao.php';
    //CONSULTAS ORACLE CONFIGURACAO_PADRAO
    include 'config_padrao_sql.php';
    include 'config_padrao_usuario_sql.php';
    //echo $hoje;

?>

        <!--MENSAGENS-->
        <?php
            include 'js/mensagens.php';
            include 'js/mensagens_usuario.php';
        ?>
    
    

        <!--TITULO-->
        <h11><i class="fas fa-cog" aria-hnameden="true"></i></i> Configuração Padrão</h11>
        <h27> <a href="home.php" style="color: #444444; text-decoration: none;"> <i class="fa fa-reply" aria-hidden="true"></i> Voltar </a> </h27> 
        
        <div class="div_br"> </div>
        <div class="div_br"> </div>    
        
        <form method="post" action="prc_config_padrao.php">
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
                <select name="frm_setor" class="form-control" required>
                
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
                <select name="frm_especialidade" class="form-control" required>
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
                    <select name="frm_oficina" class="form-control" required>

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

                 <!--MOTIVO DO SERVICO-->
                 <div class="form-group col-md-4">
                    <label>Motivo da OS</label>
                    <select name="frm_motivo_os" class="form-control" required>
                    
                    
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
                    <select name="frm_tipo_os" class="form-control" required>
                   

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
                    <input name="frm_email" input type="email" class="form-control"  
                        value="<?php
                              //SE JA EXISTIR TIPO DO SERVICO CADASTRADO PARA O USUARIO LOGADO
                              if(isset($row_email_usuario['DS_EMAIL_ALTERNATIVO'])){
                                 //EXIBA ELE
                                 echo   $row_email_usuario['DS_EMAIL_ALTERNATIVO'];}
                                 
                                      
                                 ?>"         
                     required>
                </div>

                <!--RAMAL-->
                <div class="form-group col-md-2">
                    <label>Ramal</label>
                    <input type="number" class="form-control" name="frm_ramal" 
                      value = "<?php
                              //SE JA EXISTIR TIPO DO SERVICO CADASTRADO PARA O USUARIO LOGADO
                              if(isset($row_ramal_usuario['DS_RAMAL'])){
                                 //EXIBA ELE
                                 echo   $row_ramal_usuario['DS_RAMAL'];}
                                 
                                      
                                 ?>"
                    required>
                </div>                                                 

            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>

        </form>
              
        </br></br>



<?php
    //RODAPE
    include 'rodape.php';
?>
