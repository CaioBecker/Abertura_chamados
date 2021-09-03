<?php

include 'conexao.php';

$consulta_mot_os= "SELECT  MOS.DS_MOT_SERV, MOS.CD_MOT_SERV
                    FROM dbamv.MOT_SERV MOS
                    ORDER BY MOS.DS_MOT_SERV ASC";

$result_mot_os= oci_parse($conn_ora,$consulta_mot_os);

oci_execute($result_mot_os);

$row_mot_os = oci_fetch_array($result_mot_os);

$consulta_tipo_os="SELECT TIO.CD_TIPO_OS, TIO.DS_TIPO_OS
                    FROM DBAMV.TIPO_OS TIO
                    WHERE TIO.DS_TIPO_OS NOT LIKE '%INATIVO%'
                    ORDER BY TIO.DS_TIPO_OS ASC";

$result_tipo_os= oci_parse($conn_ora,$consulta_tipo_os);

oci_execute($result_tipo_os);

$row_tipo_os = oci_fetch_array($result_tipo_os);

$consulta_tipo_serv="SELECT CD_SERVICO, NM_SERVICO
                        FROM dbamv.MANU_SERV ms
                        WHERE ms.CD_ITEM_RES = 186
                        ORDER BY 2 ASC";

$result_tipo_serv= oci_parse($conn_ora,$consulta_tipo_serv);

oci_execute($result_tipo_serv);

$row_tipo_serv = oci_fetch_array($result_tipo_serv);

?>