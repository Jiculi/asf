<template>
  <div id="grupo" class="app">
    <button v-on:click="say('1')">1</button>
    <button v-on:click="say('2')">2</button>
    <button v-on:click="say('3')">3</button>
    <ol>
      <li v-for="termino in terminos">
        <!-- <h2> {{ termino.titulo}}</h2>
        <hr> -->
        <ListaAviso :aviso-data="termino"/>
      </li>
    </ol>
  </div>
</template>


<script>
import ListaAviso from './componentes/ListaAviso.vue'

export default {
  data () {
    return {
      terminos : [
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'rev_fiscal', titulo: "JCA- Sentencia Definitiva Nulidad Lisa", mensaje: 'para interponer recurso de revisión', color: '#E3F2FD', consulta: 'NulidadLisa', dias: '15' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'rev_fiscal', titulo: "JCA- Sentencia Definitiva Nulidad para Efectos", mensaje: 'para interponer recurso de revisión', color: '#E3F2FD', consulta: 'nulidadEfectos', dias: '15' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'contestacion_jn', titulo: "JCA- Contestación Demanda", mensaje: 'para contestar', color: '#E3F2FD', consulta: 'admisionJCA', dias: '30' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'contestacion_jn', titulo: "JCA- Contestación Demanda (a)", mensaje: 'para contestar', color: '#E3F2FD', consulta: 'contestacionSuspension', dias: '30' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'contestacion_jn', titulo: "JCA- Contestación Demanda (b)", mensaje: 'para contestar', color: '#E3F2FD', consulta: 'contestacionReq3a', dias: '30' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'rec_reclama_jn', titulo: "JCA- Recurso Reclamación", mensaje: 'para realizar manifestaciones', color: '#E3F2FD', consulta: 'reclamacion', dias: '5' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'contest_amp_jn', titulo: "JCA- Ampliación de Demanda", mensaje: 'para contestar ampliación', color: '#FCE4EC', consulta: 'ampliacion', dias: '10' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'suspencion_jn', titulo: "JCA- Informe Suspensión", mensaje: 'para rendir informe de suspensión', color: '#F5F5F5', consulta: 'suspension', dias: '2' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'suspencion_jn', titulo: "JCA- Informe Suspensión (a)", mensaje: 'para rendir informe de suspensión', color: '#F5F5F5', consulta: 'contestacionSuspension', dias: '2' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'requerimiento', titulo: "JCA- Requerimiento 3 días", mensaje: 'para desahogar requerimiento', color: '#F5F5F5', consulta: 'requerimiento3', dias: '3' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'requerimiento', titulo: "JCA- Requerimiento 3 días (b)", mensaje: 'para desahogar requerimiento', color: '#F5F5F5', consulta: 'contestacionReq3a', dias: '3' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'requerimiento', titulo: "JCA- Requerimiento 5 días", mensaje: 'para desahogar requerimiento', color: '#F5F5F5', consulta: 'requerimiento5', dias: '5' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'requerimiento', titulo: "JCA- Requerimiento 10 días",  mensaje: 'para desahogar requerimiento', color: '#F5F5F5', consulta: 'requerimiento10', dias: '10' },
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'alegatos_jn', titulo: "JCA- Alegatos 5 días", mensaje: 'para formular alegatos', color: '#F5F5F5', consulta: 'alegatos', dias: '5' }, 
        { q: 'avisosW/api/jsonAvisosJCA.php', tipoOficio: 'alegatos10_jn', titulo: "JCA- Alegatos 10 días", mensaje: 'para formular alegatos', color: '#F5F5F5', consulta: 'alegatos10', dias: '10' }, 

        { sub: this.sub1, q: 'avisosW/api/jsonAvisosAD.php', tipoOficio: 'alegatos_ad', titulo: "AD- Admisión Amparo Directo", mensaje: 'para formular alegatos', color: '#FFF9C4', consulta: 'admisionAD', dias: '15' },
        { sub: this.sub1, q: 'avisosW/api/jsonAvisosAD.php', tipoOficio: 'requerimientos_ad', titulo: "AD- Requerimiento Amparo Directo", mensaje: 'para formular respuesta', color: '#FFF9C4', consulta: 'requerimientoAD', dias: '10' },
        { sub: this.sub1, q: 'avisosW/api/jsonAvisosAD.php', tipoOficio: 'revision_ad', titulo: "AD Recurso de Revisión en Amparo Directo", mensaje: 'para interponer revisión adhesiva', color: '#FFF9C4', consulta: 'revisionAD', dias: '5' },
         
        { q: 'avisosW/api/jsonAvisosAI.php', tipoOficio: 'revision_ai', titulo: "AI- Recurso de Revisión en Amparo Indirecto", mensaje: 'para interponer revisión adhesiva', color: '#FFFF8D', consulta: 'revisionAI', dias: '5' }, 
        { q: 'avisosW/api/jsonAvisosAI.php', tipoOficio: 'requerimiento3_ai', titulo: "AI- Requerimiento 3 días", mensaje: 'para formular respuesta', color: '#FFFF8D', consulta: 'requerimiento3AI', dias: '3' }, 
        { q: 'avisosW/api/jsonAvisosAI.php', tipoOficio: 'requerimiento1_ai', titulo: "AI- Requerimiento 1 días", mensaje: 'para formular respuesta', color: '#FFFF8D', consulta: 'requerimiento1AI', dias: '1' }, 
        { q: 'avisosW/api/jsonAvisosAI.php', tipoOficio: 'inf_just_ai', titulo: "AI- Informe Justificado", mensaje: 'para formular respuesta', color: '#FFFF8D', consulta: 'justificadoAI', dias: '15' }, 
        { q: 'avisosW/api/jsonAvisosAI.php', tipoOficio: 'inf_previo_ai', titulo: "AI- Informe Previo", mensaje: 'para formular respuesta', color: '#FFFF8D', consulta: 'previoAI', dias: '2' }, 
      ],
      sub1: '0'
    }
  },
	components: {
		ListaAviso
  },
  
  methods: {
    say: function (a) {
      this.sub1 = a;
      console.log(this.sub1);
    }
  }
}
</script>


<style>
  #grupo {
    border-radius: .25rem; 
    border: 1px solid #ECECEC; 
    width: 600px; 
    margin: 0.05rem; 
    padding: 0.05rem;     
    background-color: #FAFAFA;
  }

.app small {
    color: red;
}

.app h3 {
        color: #069;
        font-size: 1em;
        font-weight: bold;
        line-height: 18px;
        margin-bottom: 2px;
}

.app h2 {
    color: #393939;
    font-size: 1em;
    font-weight: bold;
    line-height: 20px;
    margin-bottom: 2px;
}

</style>
