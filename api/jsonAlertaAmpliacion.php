<?php
date_default_timezone_set('Mexico/General');

require_once 'componentes.php';
require_once 'database.php';
require 'libreria.php';
$db = new libreria();

$result = $db->getJuiciosAmpliacion();
$i = 1;
$data = array();

if ($result == "{}") {
     $data[] = 	 "No hay nada";
} else {
	foreach ($result as $row => $r) {
        $hoy = date("Y-m-d");
        $deliverydate = fechaFinal($r['fecha_acuse'], 3);

        $dias = 10;
        $gap = fechaFinal($deliverydate, $dias);


        $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
        $fecha_entrada = strtotime($r['fecha_acuse']);

        $ban = "-"; 
        $plazo = "-"; 

        if ($r['fecha_acuse'] == '0000-00-00' or is_null($r['fecha_acuse'])) {
            $diferencia = "--";
            $ban = "--";
            $gap = "--";
        } else {
            if ($r['fecha_pre_ampliacion'] == '0000-00-00' or is_null($r['fecha_pre_ampliacion'])) {
                $diferencia = getWorkingDays($hoy, $gap);
                $plazo = "-";
            } else {
                $diferencia = "-";
        
                $plazo = getWorkingDays($r['fecha_acuse'], $r['fecha_pre_ampliacion']);
                
                $date1 = new DateTime($gap);
                $date2 = new DateTime($r['fecha_pre_ampliacion']);
    
                if($date2> $date1) {
                    $ban = "no";
                } else {
                    $ban = "-"; 
                };
    
            }

        }
        if ( $diferencia >0 and $diferencia <= 5) {
        $data[] = array(
             'i' => $i++,
             'id' => floatval($r['id']),
            'procedimiento' => $r['procedimiento'],
            'juicionulidad' => $r['juicionulidad'],
            'actor' => $r['actor'],
            'f_aviso' => ($r['fecha_acuse'] == '0000-00-00' ? ' ' : $r['fecha_acuse']),
            'fechanot' => $r['fecha_acuse'],
            'tres' => $deliverydate,

            'inicio' => $r['fecha_acuse'],
            'dias30' => $gap,
            'diff' => $diferencia,
            'ban' => $ban,
            'fecha_oficio' => $r['fecha_pre_ampliacion'],
            'plazo' => $plazo,
            'volante' => $r['volante'],
            'folio' => $r['fecha_oficio'],
            'sub' => $r['sub']

        );
        }   		
	}
}
echo json_encode($data);				   
Database::disconnect();
	
?>