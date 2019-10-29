<?php
date_default_timezone_set('Mexico/General');

require_once 'componentes.php';
require_once 'database.php';
require 'libreria.php';
$db = new libreria();

$result = $db->getPrevioAI();
$i = 1;
$data = array();

if ($result == "{}") {
     $data[] = 	 "No hay nada";
} else {
	foreach ($result as $row => $r) {
        $hoy = date("Y-m-d");
        $deliverydate = fechaFinal($r['fechanot'], 0);

        $dias = 2;
        $gap = fechaFinal($deliverydate, $dias);

        $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
        $fecha_entrada = strtotime($r['fechanot']);

        $ban = "-"; 

        if ($r['fechanot'] == '0000-00-00' or is_null($r['fechanot'])) {
            $diferencia = "--";
            $ban = "--";
            $gap = "--";
        } else {
            if ($r['fecha_oficio'] == '0000-00-00' or is_null($r['fecha_oficio'])) {
                $diferencia = getWorkingDays($hoy, $gap);
                $plazo = "-";
            } else {
                $diferencia = "-";
        
                $plazo = getWorkingDays($r['fechanot'], $r['fecha_oficio']);

                $date1 = new DateTime($gap);
                $date2 = new DateTime($r['fecha_oficio']);
                if($date2> $date1) {
                    $ban = "no";
                } else {
                    $ban = "-"; 
                };
            }
        }
        if ( $diferencia > 0 and $diferencia <=5  ) { 

        $data[] = array(
            'id' => floatval($r['id']),
            'procedimiento' => $r['procedimiento'],
            'juicionulidad' => $r['ai'],
            'actor' => $r['actor'],
            'f_aviso' => ($r['fechanot'] == '0000-00-00' ? ' ' : $r['fechanot']),
            'fechanot' => $r['fechanot'],
            'tres' => $deliverydate,

            'dias30' => $gap,
            'diff' => $diferencia,
            'ban' => $ban,
            'fecha_oficio' => $r['fecha_oficio'],
            'plazo' => $plazo,
            'folio' => $r['folio'],
            'volante' => $r['volante'],
            'sub' => $r['sub']
        );
    }
	}
}
echo json_encode($data);				   
Database::disconnect();
	
?>