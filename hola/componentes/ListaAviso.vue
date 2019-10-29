<template>
  <div id="marco" :style="{ backgroundColor: backgroundcolor }" v-if="avisos6.length" >
    <h2> {{ avisoData.titulo}}</h2>
    <h2> {{ subb}}</h2>
		<hr >
    <ul class="lista">
			<ListaAvisoItem
				v-for="game in avisos6"
        :game-data="game" 
        :key="game.volante"
			/>
		</ul>
  </div>
</template>


<script>
  import ListaAvisoItem from './ListaAvisoItem.vue';
  var formData = new FormData();

  export default {
    props: [ 'avisoData', 'sub' ],
  
  	components: {
			ListaAvisoItem
		},

    data () {
      return {
          avisos6: [],
          seen: true,
          url: this.avisoData.q,
          colorsito: this.avisoData.color,
          msg: this.avisoData.mensaje,
          miconsulta: this.avisoData.consulta,
          misdias: this.avisoData.dias,
          tipoOficio: this.avisoData.tipoOficio,
          backgroundColor : '#FCE4EC',
          color: [
              "#E8EAF6",
              "#C5CAE9",
              "#E3F2FD",
              "#BBDEFB",
              "#E1F5FE",
              "#B3E5FC",
              "#E0F7FA",
              "#B2EBF2",
              "#E0F2F1",
              "#B2DFDB",
              "#E8F5E9",
              "#C8E6C9"
            ],
          suba: this.sub1,
          subb: this.avisoData.sub1
      }
    },

    created () {
      this.backgroundcolor = this.color[Math.floor(Math.random() * 10)];

      formData.append('consulta', this.miconsulta);
      formData.append('dias', this.misdias);
      formData.append('tipoOficio', this.tipoOficio);

      fetch(this.url, {
        method: 'POST',
        body: formData,
      })  
      .then(response => response.json())
      .then(json => {
          this.seen = json.length > 0 ? true : false;
          this.avisos6 = json;
          for (var j = 0; j < this.avisos6.length; j++){
              Object.defineProperty(this.avisos6[j],"color",{value: this.colorsito});
              Object.defineProperty(this.avisos6[j],"mensaje",{value: this.msg});
          };
      })
    }
  };
</script>


<style>
  #marco {
    border-radius: .25rem; 
    border: 1px solid #ECECEC; 
    /* width: 600px; */
    margin: 0.01rem; 
    padding: 0.01rem;     
    /* background-color: rgb(221, 242, 252); */
  }
</style>