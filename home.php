<?php 
    @session_start();	

    //CABECALHO
    include 'conexao.php';

    //CABECALHO
    include 'cabecalho.php';

    //ACESSO RESTRITO
    include 'acesso_restrito.php';

?>

<div class="div_br"> </div>


        <?php 

            //echo 'Administrador: ' . $_SESSION['sn_admin'];
           // echo '</br> Importar Arquivos: ' . $_SESSION['sn_importar_arquivos'];
            //echo '</br> Cadastrar Pendencias: ' . $_SESSION['sn_pendencias_prontuario'];
            //echo '</br></br>';

        ?>

         <!--MENSAGENS-->
         <?php
            include 'js/mensagens.php';
            include 'js/mensagens_usuario.php';
        ?>

        <?php //echo $_SESSION['usuarioADM']; ?>

            <!--TITULO-->
            <h11><i class="fas fa-pills"></i> PAM</h11>

            <div class="div_br"> </div>     

            <a href="medicamentos_pam.php" class="botao_home" type="submit"><i class="fas fa-capsules"></i> P.A.M.</a>
            <?php if( $_SESSION['usuarioADM'] == 'S'){ ?>
                <span class="espaco_pequeno"></span>
                <a href="medicamentos_pam_adm.php" class="botao_home_adm" type="submit"><i class="fas fa-capsules"></i> P.A.M. ADM</a>
            <?php } ?>
            <div class="div_br"> </div>   

            <!--TITULO-->
            <h11><i class="fas fa-pills"></i> Medicamentos</h11>

            <div class="div_br"> </div>       
            
            <!--BOTOES-->       
            <a href="medicamentos.php" class="botao_home" type="submit"><i class="fas fa-pills"></i> Medicamentos </a></td></tr>

            <div class="div_br"> </div>
	
            <!--TITULO-->
            <h11><i class="fa fa-line-chart"></i> Informações</h11>          

            <div class="div_br"> </div>

            <div class="row" style="font-size: 28px !important; color: #444444 !important;"> 

                <div class="col col-md-2" style="background-color: #f9f9f9 !important;">

                    <!-- MEDICAMENTOS / ORACLE -->	
                    <?php $sql_med = "SELECT COUNT(DISTINCT tp.CD_TIP_PRESC) AS QTD FROM dbamv.TIP_PRESC tp";	
                                        $qry_med = oci_parse($conn_ora, $sql_med);
                                        oci_execute($qry_med); 					  
                                        $row_med = oci_fetch_array($qry_med); ?>		
                                        
                                            <i class="fa fa-medkit" aria-hidden="true"></i></br><p>			
                                            <b><?php echo $row_med['QTD']; ?></b> Medicamentos	
                </div>

                <div class="col col-md-2" style="background-color: #f9f9f9 !important;">

                    <!-- PRODUTOS / ORACLE -->	
                    <?php $sql_prod = "SELECT COUNT(DISTINCT tp.CD_PRODUTO) AS QTD FROM dbamv.TIP_PRESC tp";	
                                        $qry_prod = oci_parse($conn_ora, $sql_prod);
                                        oci_execute($qry_prod); 					  
                                        $row_prod = oci_fetch_array($qry_prod); ?>		
                                        
                                            <i class="fa fa-cubes" aria-hidden="true"></i></br><p>			
                                            <b><?php echo $row_prod['QTD']; ?></b> Produtos	

                </div>

                <div class="col col-md-2" style="background-color: #f9f9f9 !important;">

                    <!-- ESQUEMAS / ORACLE -->	
                                    <?php $sql_esq = "SELECT COUNT(DISTINCT tp.CD_TIP_ESQ) AS QTD FROM dbamv.TIP_PRESC tp";	
                                        $qry_esq = oci_parse($conn_ora, $sql_esq);
                                        oci_execute($qry_esq); 					  
                                        $row_esq = oci_fetch_array($qry_esq); ?>		
                                        
                                            <i class="fa fa-link" aria-hidden="true"></i></br><p>			
                                            <b><?php echo $row_esq['QTD']; ?></b> Esquemas	

                </div>

                <div class="col col-md-2" style="background-color: #f9f9f9 !important;">

                    <!-- ALTO RISCO / ORACLE -->	
                    <?php $sql_risc = "SELECT COUNT(DISTINCT tp.CD_TIP_PRESC) AS QTD FROM dbamv.TIP_PRESC tp WHERE tp.CD_TIP_ESQ = 'MAR'";	
                                        $qry_risc = oci_parse($conn_ora, $sql_risc);
                                        oci_execute($qry_risc); 					  
                                        $row_risc = oci_fetch_array($qry_risc); ?>		
                                        
                                            <i class="fa fa-heartbeat" aria-hidden="true"></i></br><p>			
                                            <b><?php echo $row_risc['QTD']; ?></b> Alto Risco

                </div>

                <div class="col col-md-2" style="background-color: #f9f9f9 !important;">

                <td class="text-center" style="font-size: 26px !important;">
                                    <!-- USUARIOS / ORACLE -->	
                                    <?php $sql_usu = "SELECT COUNT (*) AS QTD FROM dbasgu.PAPEL_USUARIOS pap WHERE pap.CD_PAPEL = 318";	
                                        $qry_usu = oci_parse($conn_ora, $sql_usu);
                                        oci_execute($qry_usu); 					  
                                        $row_usu = oci_fetch_array($qry_usu); ?>		
                                        
                                        <i class="fa fa-user-md" aria-hidden="true"></i></br><p>			
                                            <b><?php echo $row_usu['QTD']; ?></b> Usuários	

                </div>

            </row>

<?php
    //RODAPE
    include 'rodape.php';
?>