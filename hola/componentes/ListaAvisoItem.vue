<template>
  <div :style="miEstilo" id="item">
      <h3>Procedimiento: {{ gameData.procedimiento }} | Referencia: {{ gameData.juicionulidad }}</h3>
      <h2>{{ gameData.actor }} | <small>{{ gameData.diff }} días {{ gameData.vencido}}  {{ gameData.mensaje}} </small></h2>
      <p> {{ gameData.sub }} | Volante: {{ gameData.volante }} | <small class='azul' v-if='gameData.folio'>Oficio: {{ gameData.folio }}</small></p>
  </div>
</template>


<script>
  export default {
      props: ['gameData'],
      data() {
        return {
          backgroundColor :  '#FFFFFF' //'#FAFAFA' // this.gameData.color 
        }
      },
      computed: {
        miEstilo: function() {
          return {
            backgroundColor: this.backgroundColor
      }
    }
  }
  };
</script>


<style scoped> /* lang="scss" scoped>     @import './variables.scss'; */
    .item small {
        color: red;
    }
    p .azul {
        color: #069;
        font-size: 1em;
        font-weight: bold;
        line-height: 18px;
        margin-bottom: 2px;
    }
    .item h2 {
        color: #393939;
        font-size: 1em;
        font-weight: bold;
        line-height: 20px;
        margin-bottom: 2px;
    }
    #item {
        border-radius: .25rem; 
        border: 1px solid '#BDBDBD'; 
        margin: 0.4rem; 
        padding: 0.4rem;     
        /* background-color: $pink-50; */
    }
</style>