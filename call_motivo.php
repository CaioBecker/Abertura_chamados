<?php
include 'conexao.php';

    $var_id_setor = $_REQUEST['id_tip_os'];
	$consulta_sub_cat = "SELECT  MOS.DS_MOT_SERV, MOS.CD_MOT_SERV
                            FROM dbamv.MOT_SERV MOS
                            WHERE MOS.CD_MOT_SERV = '$var_id_setor'
                            ORDER BY MOS.DS_MOT_SERV ASC";

	$resultado_sub_cat = oci_parse($conn_ora, $consulta_sub_cat);

    oci_execute($resultado_sub_cat); 

    while($row_sub_motivo_os = oci_fetch_array($resultado_sub_cat)){	
		$id_mot_serv[] = array(
			'id_mot_serv'	=> $row_sub_motivo_os['CD_MOT_SERV'],
			'mot_serv' => $row_sub_motivo_os['DS_MOT_SERV'],
		);
	}
	
echo(json_encode($id_mot_serv));




?>