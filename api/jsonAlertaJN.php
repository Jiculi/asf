<?php
date_default_timezone_set('Mexico/General');

require_once 'componentes.php';
require_once 'database.php';
require 'libreria.php';
$db = new libreria();

$result = $db->getJuicios();
$i = 1;
$data = array();





if ($result == "{}") {
     $data[] = 	 "No hay nada";
} else {
	foreach ($result as $row => $r) {
        //($r['fechanot'] == '0000-00-00' ? ' ' : $r['fecha_not_sentencia']),

        $hoy = date("Y-m-d");

        $deliverydate = "--";
        if ($r['f_aviso'] == '0000-00-00' or is_null($r['f_aviso'])) {
            $deliverydate = "--";
        }
        else {
            $deliverydate = fechaFinal($r['fechanot'], 3);
        } 


        // $error = date_create(date("Y-m-d",strtotime($r['fechanot']."+ 30 day")));
        // $dias30 = $error->format('Y-m-d');
        $dias30 = fechaFinal($deliverydate, 30);


        $date1 = new DateTime($hoy);
        $date2 = new DateTime($dias30);
        $diff = $date1->diff($date2);

        $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
        $fecha_entrada = strtotime($r['fechanot']);

    
        // $tres = strtotime($r['f_aviso']);
        // $aaa = date('D',$tres);



        if ($r['fechanot'] == '0000-00-00' or is_null($r['fechanot'])) {
            $diferencia = "--";
            $ban = "--";
            $dias30 = "--";
        } else {
            $diferencia = $diff->days;
            $diferencia = getWorkingDays($hoy, $dias30);
            if($date2> $date1) {
                $ban = "si";
            } else {
                $ban = "no";
            };
        }

        if ($ban == "si"  and is_null($r['fecha_pre_tribunal']) ) {

          $data[] = array(
             'i' => $i++,
            'id' => floatval($r['id']),
            'nojuicio' => $r['nojuicio'],
            'cp' => $r['cp'],		
            'accion' => $r['accion'],
            'procedimiento' => $r['procedimiento'],
            'juicionulidad' => $r['juicionulidad'],
            'actor' => $r['actor'],
            'f_aviso' => ($r['f_aviso'] == '0000-00-00' ? ' ' : $r['f_aviso']),
            'suspension' => "--",
            'reclamacion' => "--",
            'fechanot' => $r['fechanot'],
            'tres' => $deliverydate,
            'dias30' => $dias30,
            'diff' => $diferencia,
            'ban' => $ban,
            //'aaa' => $aaa,
            'fecha_pre_tribunal' => $r['fecha_pre_tribunal'],
            'sub' => $r['sub'],

            
            'fecha_not' => ($r['fecha_not'] == '0000-00-00' ? ' ' : $r['fecha_not']),




            'actorX' => mb_substr($r['actor'],0,100),

            'entidad' => mb_substr($r['entidad'],0,30),
            'entidadX' => mb_substr($r['entidad'],0,100),

            'fechanot' => ($r['fechanot'] == '0000-00-00' ? ' ' : $r['fechanot']),
            'f_resolucion' => ($r['f_resolucion'] == '0000-00-00' ? ' ' : $r['f_resolucion']),
            'fecha_not_sentencia' => ($r['fecha_not_sentencia'] == '0000-00-00' ? ' ' : $r['fecha_not_sentencia']),
            'fecha_sentencia' => ($r['fecha_sentencia'] == '0000-00-00' ? ' ' : $r['fecha_sentencia']),
            'toca_en_revision' => $r['toca_en_revision'],
            'toca_amparo' => $r['toca_amparo'],


            'vencimiento' => $r['vencimiento'],
            'dir' => $r['dir'],
            'subnivel' => $r['subnivel'], 			
            'monto' => number_format(floatval($r['monto'])), 
            'oficio_contestacion' => $r['oficio_contestacion'], 
            'oficio_ampliacion' => $r['oficio_ampliacion'],
            'fecha_pre_ampliacion' => $r['fecha_pre_ampliacion'],             
            'oficio_alegatos' => $r['oficio_alegatos'], 
            'fecha_pre_alegatos' => $r['fecha_pre_alegatos'], 
            'estado' => $r['estado'], 
            'fecha_conclusion' => $r['fecha_conclusion'], 
            'observaciones' => $r['observaciones'], 
            'sentencia_primera' => $r['sentencia_primera'], 

            'cargo_sp' => $r['cargo_sp'], 
            'resolucion_sp' => $r['resolucion_sp'],
            'con_responsabilidad_origen' => $r['con_responsabilidad_origen'], 			
            'registro_sancionados' => $r['registro_sancionados'], 	
            'sin_responsabilidad_origen' => $r['sin_responsabilidad_origen'], 	
            'DESF' => $r['DESF'],
            'resultado' => $r['resultado']);
        }
           		
	}
}
echo json_encode($data);				   
Database::disconnect();
	
?>