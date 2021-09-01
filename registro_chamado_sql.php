<?php

include 'conexao.php';


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