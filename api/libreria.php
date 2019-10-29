<?php
header('Content-Type: text/html; charset=UTF-8'); 
ini_set('memory_limit', '256M');



class libreria
{
    //public $tipoAviso = "alegatos10";

    public function getAvisosJCA($tipoAviso, $tipoOficio){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, 
                    oficios.fecha_oficio,
                    oficios.acuse
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.folio = oficios.presunto and oficios.tipo = :tipoOficio
                where volantes_contenido.tipoMovimiento = :tipoAviso and tipoCorrespondencia = "1"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("tipoAviso", $tipoAviso, PDO::PARAM_STR);
        $stmt->bindParam("tipoOficio", $tipoOficio, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAvisosAD($tipoAviso, $tipoOficio){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, 
                    oficios.fecha_oficio,
                    oficios.acuse
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.folio = oficios.presunto and oficios.tipo = :tipoOficio
                where volantes_contenido.tipoMovimiento = :tipoAviso
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("tipoAviso", $tipoAviso, PDO::PARAM_STR);
        $stmt->bindParam("tipoOficio", $tipoOficio, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAvisosAI($tipoAviso, $tipoOficio){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    ai.ai,
                    ai.procedimiento,
                    ai.actor,
                    ai.sub,
                    ai.id,
                    oficios.folio, 
                    oficios.fecha_oficio,
                    oficios.acuse
                FROM volantes_contenido
                LEFT JOIN ai ON ai.ai = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.folio = oficios.presunto and oficios.tipo = :tipoOficio
                where volantes_contenido.tipoMovimiento = :tipoAviso
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("tipoAviso", $tipoAviso, PDO::PARAM_STR);
        $stmt->bindParam("tipoOficio", $tipoOficio, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }



    public function getAvisos($tipoAviso){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, 
                    oficios.fecha_oficio,
                    oficios.acuse
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.folio = oficios.presunto
                where volantes_contenido.tipoMovimiento = :tipoAviso and tipoCorrespondencia = "1"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("tipoAviso", $tipoAviso, PDO::PARAM_STR);  // $this->tipoAviso
        $stmt->execute();
        return $stmt->fetchAll();
    }



    public function getRevisionAI() {
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    ai.ai,
                    ai.procedimiento,
                    ai.actor,
                    ai.sub,
                    ai.id,
                    oficios.folio, 
                    oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN ai ON ai.ai = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "revision_ai"
                where volantes_contenido.tipoMovimiento = "revisionAI" and volantes_contenido.atendido = 0
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }



    public function getAdmisionAD(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "alegatos_ad"
                where volantes_contenido.tipoMovimiento = "admisionAD"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function getJuiciosAlegato10(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, 
                    oficios.fecha_oficio,
                    oficios.acuse
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.folio = oficios.presunto
                where volantes_contenido.tipoMovimiento = "alegatos10" and tipoCorrespondencia = "1"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function getJuicios(){
        $pdo = Database::connect();
        $sql = 'SELECT juiciosnew.*,  pfrr.cp, pfrr.entidad 
        FROM juiciosnew
        LEFT JOIN pfrr ON juiciosnew.accion = pfrr.num_accion
        ORDER BY f_aviso ASC';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }


    public function getContestacion() {
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "contestacion_jn"
                where volantes_contenido.tipoMovimiento = "admisionJCA" and tipoCorrespondencia = "1"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getContestacionReq3a() {
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "contestacion_jn"
                where volantes_contenido.tipoMovimiento = "contestacionReq3a" and tipoCorrespondencia = "1"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getContestacionSuspension1() {
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "contestacion_jn"
                where volantes_contenido.tipoMovimiento = "contestacionSuspension" and tipoCorrespondencia = "1"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getContestacionReq3b() {
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "requerimiento"
                where volantes_contenido.tipoMovimiento = "contestacionReq3a" and tipoCorrespondencia = "1"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }



    public function getRequerimiento3AI() {
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    ai.ai,
                    ai.procedimiento,
                    ai.actor,
                    ai.sub,
                    ai.id,
                    oficios.folio, 
                    oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN ai ON ai.ai = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "requerimiento3_ai"
                where volantes_contenido.tipoMovimiento = "requerimiento3AI" and volantes_contenido.atendido = 0
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getRequerimiento1AI() {
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    ai.ai,
                    ai.procedimiento,
                    ai.actor,
                    ai.sub,
                    ai.id,
                    oficios.folio, 
                    oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN ai ON ai.ai = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "requerimiento1_ai"
                where volantes_contenido.tipoMovimiento = "requerimiento1AI" and volantes_contenido.atendido = 0
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPrevioAI() {
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    ai.ai,
                    ai.procedimiento,
                    ai.actor,
                    ai.sub,
                    ai.id,
                    oficios.folio, 
                    oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN ai ON ai.ai = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "inf_previo_ai"
                where volantes_contenido.tipoMovimiento = "previoAI" and volantes_contenido.atendido = 0
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getJustificadoAI() {
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    ai.ai,
                    ai.procedimiento,
                    ai.actor,
                    ai.sub,
                    ai.id,
                    oficios.folio, 
                    oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN ai ON ai.ai = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "inf_just_ai"
                where volantes_contenido.tipoMovimiento = "justificadoAI" and volantes_contenido.atendido = 0
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    
    public function getJuiciosAlegato(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "alegatos_jn"
                where volantes_contenido.tipoMovimiento = "alegatos" and tipoCorrespondencia = "1"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function getRequerimientoAD(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "requerimientos_ad"
                where volantes_contenido.tipoMovimiento = "requerimientoAD"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getRevisionAD(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "revision_ad"
                where volantes_contenido.tipoMovimiento = "revisionAD"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    //                 LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "alegatos10_jn"


    public function getJuiciosReclamacion(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "rec_reclama_jn"
                where volantes_contenido.tipoMovimiento = "reclamacion" and tipoCorrespondencia = "1"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function getRequerimiento3(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "requerimiento"
                where volantes_contenido.tipoMovimiento = "requerimiento3" and tipoCorrespondencia = "1"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getRequerimiento5(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "requerimiento"
                where volantes_contenido.tipoMovimiento = "requerimiento5" and tipoCorrespondencia = "1"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getRequerimiento10(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "requerimiento"
                where volantes_contenido.tipoMovimiento = "requerimiento10" and tipoCorrespondencia = "1"
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    

    //  LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "contest_amp_jn"
    public function getJuiciosAmpliacion(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse,
                    volantes_contenido.fecha_oficio,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, 
                    oficios.fecha_oficio as fecha_pre_ampliacion
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.folio = oficios.presunto

                where volantes_contenido.tipoMovimiento = "ampliacion" and tipoCorrespondencia = "1"
    
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getJuiciosSuspension(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "suspencion_jn"
                where volantes_contenido.tipoMovimiento = "suspension" and tipoCorrespondencia = "1"
        ';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    public function getContestacionSuspension2(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, oficios.fecha_oficio
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "suspencion_jn"
                where volantes_contenido.tipoMovimiento = "contestacionSuspension" and tipoCorrespondencia = "1"
        ';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    // LEFT JOIN oficios ON volantes_contenido.presunto = oficios.oficio_referencia and oficios.tipo = "rev_fiscal"
    public function getJuiciosNulidad(){
        $pdo = Database::connect();
        $sql = 'SELECT  volantes_contenido.folio as volante,
                    volantes_contenido.fecha_acuse as fechanot,
                    juiciosnew.juicionulidad,
                    juiciosnew.procedimiento,
                    juiciosnew.actor,
                    juiciosnew.sub,
                    juiciosnew.id,
                    oficios.folio, 
                    oficios.fecha_oficio,
                    oficios.acuse
                FROM volantes_contenido
                LEFT JOIN juiciosnew ON juiciosnew.juicionulidad = volantes_contenido.presunto
                LEFT JOIN oficios ON volantes_contenido.folio = oficios.presunto
                where (volantes_contenido.tipoMovimiento = "nulidadEfectos" or volantes_contenido.tipoMovimiento = "NulidadLisa") and tipoCorrespondencia = "1" 
    
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }



    public function getNombreOficio($term) {
        $pdo = Database::connect();
        $term = "%" . $term . "%";
        $sql = 'SELECT DISTINCT 
                        destinatario, 
                        tipooficio, 
                        cargo_destinatario, 
                        dependencia 
                FROM oficios 
                where destinatario like :term AND tipoOficio = "medios"
            ';
     
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("term", $term, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function dameEstado($clave) {
        try {
            $pdo = Database::connect();	
            $query = $pdo->prepare("SELECT detalle_estado FROM estados_tramite WHERE id_estado =:pat");
            $query->bindParam("pat", $clave, PDO::PARAM_INT);
            $query->execute();
            if ($query->rowCount() > 0) {
                $resultado = $query->fetch(PDO::FETCH_OBJ);
                return $resultado->detalle_estado;
            } else return "no se encuentra";
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }


    public function dameSubdirector($clave) {
        try {
            $pdo = Database::connect();	
            $query = $pdo->prepare("SELECT nombre FROM usuarios WHERE nivel =:pat");
            $query->bindParam("pat", $clave, PDO::PARAM_INT);
            $query->execute();
            if ($query->rowCount() > 0) {
                $resultado = $query->fetch(PDO::FETCH_OBJ);
                return $resultado->nombre;
            } else return "no se encuentra";
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function dameDirector($clave) {
        try {
            $pdo = Database::connect();	
            $query = $pdo->prepare("SELECT nombre FROM usuarios WHERE nivel =:pat");
            $query->bindParam("pat", $clave, PDO::PARAM_INT);
            $query->execute();
            if ($query->rowCount() > 0) {
                $resultado = $query->fetch(PDO::FETCH_OBJ);
                return $resultado->nombre;
            } else return "no se encuentra";
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getProcedimientos($llave){
        $pdo = Database::connect();
        $sql  = "SELECT num_procedimiento, num_accion, entidad FROM pfrr
                WHERE (num_procedimiento like :pat)  AND (detalle_edo_tramite = 24 )";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("pat", $llave, PDO::PARAM_STR);
        $stmt->execute();
		return $stmt->fetchAll();
    }


    public function getActores($llave1, $llave2) {
        $pdo = Database::connect();
        $sql = 'SELECT pfrr_presuntos_audiencias.nombre, pfrr_presuntos_audiencias.cont
        from pfrr
        inner join pfrr_presuntos_audiencias on  (pfrr.num_accion = pfrr_presuntos_audiencias.num_accion)  
        where (pfrr_presuntos_audiencias.nombre like :pat1) and (pfrr.num_accion = :pat2) and (status = 1) and (pfrr_presuntos_audiencias.tipo <> "titularICC")
                and (pfrr_presuntos_audiencias.tipo <> "titularTESOFE") and (pfrr_presuntos_audiencias.tipo <> "responsableInforme")
        order by pfrr_presuntos_audiencias.nombre
        '; 
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("pat1", $llave1, PDO::PARAM_STR);
        $stmt->bindParam("pat2", $llave2, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getEstado($llave1) {
        $pdo = Database::connect();
        $sql = 'SELECT *
        from estado
        where (nombre_estado like :pat1)
        '; 
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("pat1", $llave1, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAmparosIn(){
        $pdo = Database::connect();
        $sql = 'SELECT *, ai.id as id, pfrr.num_accion as accionPFRR FROM ai 
        LEFT JOIN pfrr ON ai.procedimiento = pfrr.num_procedimiento
        WHERE 1 ';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    public function getTribunal(){
        $pdo = Database::connect();
        $sql = 'SELECT id, tribunal FROM juiciosnew WHERE tribunal IS NOT NULL ';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }
    


    public function getPresuntos(){
        $pdo = Database::connect();
        $sql = "SELECT *, pfrr.num_procedimiento
        FROM pfrr_presuntos_audiencias
        INNER JOIN pfrr ON pfrr_presuntos_audiencias.num_accion = pfrr.num_accion
        where (status = 1) and (pfrr_presuntos_audiencias.tipo <> 'titularICC') 
                and (pfrr_presuntos_audiencias.tipo <> 'titularTESOFE') and (pfrr_presuntos_audiencias.tipo <> 'responsableInforme')
        ";
        
        $stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    public function getJuiciosRRF(){
        $pdo = Database::connect();
        $sql = 'SELECT juiciosnew.*,  pfrr.cp, pfrr.entidad FROM juiciosnew
        LEFT JOIN pfrr ON juiciosnew.accion = pfrr.num_accion
        WHERE juiciosnew.toca_en_revision = "si" ';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    public function getJuiciosAD(){
        $pdo = Database::connect();
        $sql = 'SELECT juiciosnew.*,  pfrr.cp, pfrr.entidad FROM juiciosnew
        LEFT JOIN pfrr ON juiciosnew.accion = pfrr.num_accion
        WHERE juiciosnew.toca_amparo = "si" ';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }


    
    public function getOficios(){
        $pdo = Database::connect();
        $sql = 'SELECT * FROM oficios WHERE tipoOficio = "medios"';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    public function getVolantes($llave){
        $llave = "%$llave%";
        $pdo = Database::connect();
        $sql = 'SELECT id, folio FROM volantes WHERE folio LIKE :pat
                ORDER BY id DESC';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("pat", $llave, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
    }


    
    public function getVolantesContenido(){
        $pdo = Database::connect();
        $sql  = 'SELECT  
                    volantes.fecha_actual, 
                    volantes_contenido.accion, 
                    volantes_contenido.presunto, 
                    volantes_contenido.folio, 
                    volantes_contenido.tipoMovimiento, 
                    volantes_contenido.remitente, 
                    volantes_contenido.entidad_dependencia, 
                    volantes_contenido.asunto, 
                    volantes_contenido.direccion
                FROM volantes 
                LEFT JOIN volantes_contenido 
                ON volantes.folio = volantes_contenido.folio';
		$stmt = $pdo->prepare($sql);
        $stmt->execute();
		return $stmt->fetchAll();
    }

    public function getPFRR(){
        $pdo = Database::connect();
        $sql = "SELECT * FROM pfrr
                WHERE  detalle_edo_tramite = 11 
                    OR detalle_edo_tramite = 13 
                    OR detalle_edo_tramite = 15 
                    OR detalle_edo_tramite = 30";


		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }






    public function getPFRRnotificaciones(){
        $pdo = Database::connect();
        $sql = "SELECT pfrr.cierre_instruccion AS cierre_instruccion, pfrr.entidad AS entidad,
                pfrr.fecha_acuerdo_inicio AS fecha_acuerdo_inicio, pfrr.num_procedimiento AS num_procedimiento,
                pfrr.resolucion AS resolucion, pfrr.superveniente AS superveniente, pfrr.fecha_notificacion_resolucion AS fecha_notificacion_resolucion,
                pfrr.po AS numero_de_pliego,pfrr_presuntos_audiencias.nombre AS nombre, 
                pfrr_presuntos_audiencias.accion_omision AS accion_omision,
                pfrr_presuntos_audiencias.prescripcion_accion_omision AS prescripcion_accion_omision,pfrr_presuntos_audiencias.status AS status,
                pfrr_presuntos_audiencias.monto AS monto,
                pfrr_presuntos_audiencias.fecha_notificacion_oficio_citatorio AS fecha_notificacion_oficio_citatorio,
                pfrr_presuntos_audiencias.tipo AS tipo, pfrr_presuntos_audiencias.responsabilidad AS responsabilidad,
                pfrr.detalle_edo_tramite AS detalle_edo_tramite, pfrr.num_accion AS num_accion,
                pfrr.cp AS cp, pfrr.fecha_edo_tramite AS fecha_edo_tramite 
                from (pfrr 
                join pfrr_presuntos_audiencias on  (pfrr.num_accion = pfrr_presuntos_audiencias.num_accion)  )
                where (status = 1) and (pfrr.detalle_edo_tramite in (23,24,25,26) ) and (pfrr_presuntos_audiencias.tipo <> 'titularICC') 
                and (pfrr_presuntos_audiencias.tipo <> 'titularTESOFE') and (pfrr_presuntos_audiencias.tipo <> 'responsableInforme')
                order by pfrr.num_accion";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }



    public function getPFRRplazo(){
        $pdo = Database::connect();

         $sql ="SELECT 	*,
                    DATEDIFF(resolucion, limite_emision_resolucion ) AS difEmiRes,
                    DATEDIFF(fecha_notificacion_resolucion, limite_notificacion_resolucion ) AS difNotRes 
            FROM pfrr 
            WHERE  detalle_edo_tramite IN ( 29,23,24,25,26)  AND fecha_acuerdo_inicio <> '' 
            ORDER BY num_accion";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    
    public function getAutoresMedios(){
        $pdo = Database::connect();

         $sql ="SELECT 	pfrr.entidad,
                        pfrr.num_accion,
                        pfrr.num_procedimiento,
                        nombre,
                        cargo,
                        juicionulidad,
                        pfrr.subnivel,
                        pfrr_presuntos_audiencias.cont,
                        ai,
                        recurso_reconsideracion
            FROM pfrr
            inner join pfrr_presuntos_audiencias on  pfrr.num_accion = pfrr_presuntos_audiencias.num_accion
            left join juiciosnew on pfrr_presuntos_audiencias.cont = juiciosnew.cont
            left join ai on ai.cont = pfrr_presuntos_audiencias.cont
            left join actores_recurso on actores_recurso.cont = pfrr_presuntos_audiencias.cont
            WHERE pfrr.detalle_edo_tramite = 24  and 
                (status = 1) and 
                (pfrr_presuntos_audiencias.tipo <> 'titularICC') 
                and (pfrr_presuntos_audiencias.tipo <> 'titularTESOFE') 
                and (pfrr_presuntos_audiencias.tipo <> 'responsableInforme')
            ";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    public function getPFRRvencimiento(){
        $pdo = Database::connect();
        $sql = "SELECT *,  
                        (DATEDIFF( CURDATE( ) , limite_cierre_instruccion) * -1) AS DifDias
                FROM pfrr
                WHERE (DATEDIFF( CURDATE( ) , limite_cierre_instruccion) <=30 
                || DATEDIFF( CURDATE( ) , limite_cierre_instruccion) <=60 
                || DATEDIFF( CURDATE( ) , limite_cierre_instruccion) <= 90) 
                AND (detalle_edo_tramite <> 29 
                AND detalle_edo_tramite <> 23 
                AND detalle_edo_tramite <> 24 
                AND detalle_edo_tramite <> 25 
                AND detalle_edo_tramite <> 26 
                AND detalle_edo_tramite < 32) 
                ORDER BY DifDias";

        $stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }    

    public function getPermisos($llave, $llave2){
        $pdo = Database::connect();
		if (!empty($llave)) {
            $sql  = 'SELECT *, DATE_FORMAT(ultimo_pago_finaliza, "%Y %m %d") AS pago FROM permisos
            WHERE (colonia LIKE :pat) AND (YEAR(ultimo_pago_finaliza) LIKE :pat2)';
 	        $stmt = $pdo->prepare($sql);
		    $stmt->bindParam("pat", $llave, PDO::PARAM_STR);
		    $stmt->bindParam("pat2", $llave2, PDO::PARAM_STR);
		} else {
            $sql  = 'SELECT * FROM permisos';
			$stmt = $pdo->prepare($sql);
		}	
        $stmt->execute();
		return $stmt->fetchAll();
    }


    
    public function dameIdPuesto($clave)
    {
        try {
            $pdo = Database::connect();	
            $query = $pdo->prepare("SELECT id FROM puestos WHERE cve_unica=:pat ");
            $query->bindParam("pat", $clave, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $resultado = $query->fetch(PDO::FETCH_OBJ);
				return $resultado->id;
            } 
			else
			{
				return '*';
		    }
		
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }	

}