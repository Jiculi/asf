<template>
  <div id="hola">
			<h2> JCA- Sentencia Definitiva Nulidad</h2>
			<hr>
      <ListaAviso/>
  </div>
</template>

<script>
import ListaAviso from './componentes/ListaAviso.vue'

export default {
  data () {
    return {
      urlData : 'avisos/api/jsonAlertaNulidad.php'
    }
  },
	components: {
		ListaAviso
	}
}
</script>

<style>
  #hola {
    border-radius: .25rem; 
    border: 1px solid #ECECEC; 
    width: 600px; 
    margin: 0.4rem; 
    padding: 0.4rem;     
    background-color: rgb(165, 214, 236); 
  }

</style>