
//         <span v-for="heart in gameData.diff">❤️</span>
/*
    data() {
        return {
            game: {...this.gameData}
        }
    },

*/


Vue.component('ampliacion-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #E3F2FD; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para contestar ampliación  </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }}  </p>
        </div>
    `
});


Vue.component('alegato-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #F0F4C3; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para formular alegatos </small></h2>
            <p> {{ gameData.sub }}  - Volante: {{ gameData.volante }}  </p>
        </div>
    `
});

Vue.component('alegato10-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #F0F4C3; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para formular alegatos </small></h2>
            <p> {{ gameData.sub }}  - Volante: {{ gameData.volante }}  </p>
        </div>
    `
});


Vue.component('suspension-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #FFF9C4; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para rendir informe de suspensión </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }}  </p>
        </div>
    `
});

Vue.component('nulidad-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #FBE9E7; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} : <small>{{ gameData.diff }} días {{ gameData.vencido}} para interponer recurso de revisión </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} -- {{ gameData.folio }}</p>
        </div>
    `
});

Vue.component('admision-ad-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #FFF9C4; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para formular alegatos </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});

Vue.component('requerimiento-ad-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #FFF9C4; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para formular respuesta </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});

Vue.component('requerimiento3-ai-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #FFFF8D; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Amparo Indirecto: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para formular respuesta </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});



Vue.component('requerimiento1-ai-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #FFFF8D; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Amparo Indirecto: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para formular respuesta </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});

Vue.component('previo-ai-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #FFFF8D; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Amparo Indirecto: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para formular respuesta </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});

Vue.component('justificado-ai-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #FFFF8D; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Amparo Indirecto: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para formular respuesta </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});

Vue.component('revision-ai-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #FFFF8D; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Amparo Indirecto: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para interponer revisión adhesiva</small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});

Vue.component('revision-ad-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #FFFF8D; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Amparo Directo: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para interponer revisión adhesiva</small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});


Vue.component('reclamacion-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #FFF9C4; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para realizar manifestaciones </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});

Vue.component('requerimiento3-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #F5F5F5; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para desahogar requerimiento </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});

Vue.component('requerimiento5-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #F5F5F5; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para desahogar requerimiento </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});

Vue.component('requerimiento10-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #F5F5F5; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para desahogar requerimiento </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});

Vue.component('contestacion-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #E3F2FD; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para contestar </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} </p>
        </div>
    `
});

Vue.component('contestacion-a-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #ECEFF1; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para contestar </small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} (1) </p>
        </div>
    `
});

Vue.component('contestacion-b-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #ECEFF1; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para desahogar requerimiento</small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }}  (2) </p>
        </div>
    `
});

Vue.component('contestacion-c-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #ECEFF1; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para contestar demanda</small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} (1) </p>
        </div>
    `
});

Vue.component('contestacion-d-card', {
    props: ['gameData', 'mensaje'],
    template: `
        <div style="border-radius: .25rem; 
                border: 1px solid #ECECEC; 
                width: 600px; 
                margin: 0.4rem; 
                padding: 0.4rem;     
                background-color: #ECEFF1; ">
            <h3>Procedimiento: {{ gameData.procedimiento }} - Juicio: {{ gameData.juicionulidad }}</h3>
            <h2>{{ gameData.actor }} - <small>{{ gameData.diff }} días para rendir informe de suspensión</small></h2>
            <p> {{ gameData.sub }} - Volante: {{ gameData.volante }} (2) </p>
        </div>
    `
});


const suspension = new Vue({
    el: '#suspension',
    data: { 
        avisos2: [],
        mensaje: "*",

        seen: true
    },
    created () {
        fetch('avisos/api/jsonAlertaSuspension.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos2 = json
            })
    }
})

const reclamacion = new Vue({
    el: '#reclamacion',
    data: { 
        avisos3: [],
        mensaje: "*",
        seen: true
    },
    created () {
        fetch('avisos/api/jsonAlertaReclamacion.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos3 = json
            })
    }
})

const alegato = new Vue({
    el: '#alegato',
    data: { 
        avisos4: [],
        seen: true,
        mensaje: "hola"
    },
    created () {
        fetch('avisos/api/jsonAlertaAlegato.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.mensaje = "hola";

                this.avisos4 = json
            })
    }
})

const alegato10 = new Vue({
    el: '#alegato10',
    data: { 
        avisos40: [],
        seen: true,
        mensaje: "hola"
    },
    created () {
        fetch('avisos/api/jsonAlertaAlegato10.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.mensaje = "hola";

                this.avisos40 = json
            })
    }
})

const ampliacion = new Vue({
    el: '#ampliacion',
    data: { 
        avisos5: [],
        mensaje: "*",

        seen: true
    },
    created () {
        fetch('avisos/api/jsonAlertaAmpliacion.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos5 = json
            })
    }
})


var url = 'avisos/api/jsonAlertaNulidad.php';
var datitos2 = {consulta: 'getJuiciosNulidad'};

var formData = new FormData();
formData.append('consulta', 'getJuiciosNulidad');
formData.append('dias', '15');


const nulidad = new Vue({
    el: '#nulidad',
    data: { 
        avisos6: [],
        mensaje: "*",
        datitos : {consulta: 'getJuiciosNulidad'},
        seen: true
    },
    created () {
        fetch('avisos/api/jsonAlertaNulidad.php', {
            method: 'POST', // or 'PUT'
            // body: JSON.stringify({consulta: 'getJuiciosNulidad'}), // data can be `string` or {object}!
            body: formData,
            // headers: { "Content-type": "application/x-www-form-urlencoded"}
            // headers:{ 'Content-Type': 'application/json'}
        })
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos6 = json
            })
    }
})

const admisionAD = new Vue({
    el: '#admisionAD',
    data: { 
        avisos7: [],
        mensaje: "*",

        seen: true
    },
    created () {
        fetch('avisos/api/jsonAlertaAdmisionAD.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos7 = json
            })
    }
})

const requerimientoAD = new Vue({
    el: '#requerimientoAD',
    data: { 
        avisos20: [],
        mensaje: "*",

        seen: true
    },
    created () {
        fetch('avisos/api/jsonAlertaRequerimientoAD.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos20 = json
            })
    }
})


const requerimiento3 = new Vue({
    el: '#requerimiento3',
    data: { 
        avisos8: [],
        mensaje: "*",

        seen: true
    },
    created () {
        fetch('avisos/api/jsonRequerimiento3.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos8 = json
            })
    }
})

const requerimiento5 = new Vue({
    el: '#requerimiento5',
    data: { 
        avisos9: [],
        mensaje: "*",

        seen: true
    },
    created () {
        fetch('avisos/api/jsonRequerimiento5.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos9 = json
            })
    }
})

const requerimiento10 = new Vue({
    el: '#requerimiento10',
    data: { 
        avisos10: [],
        mensaje: "*",

        seen: true
    },
    created () {
        fetch('avisos/api/jsonRequerimiento10.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos10 = json
            })
    }
})

const contestacion = new Vue({
    el: '#contestacion',
    data: { 
        avisos42: [],
        mensaje: "*",

        seen: true
    },
    created () {
        fetch('avisos/api/jsonContestacion.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos42 = json
            })
    }
})



const requerimiento3AI = new Vue({
    el: '#requerimiento3AI',
    data: { 
        avisos43: [],
        mensaje: "*",

        seen: true
    },
    created () {
        fetch('avisos/api/jsonRequerimiento3AI.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos43 = json
            })
    }
})

const requerimiento1AI = new Vue({
    el: '#requerimiento1AI',
    data: { 
        avisos60: [],
        mensaje: "*",

        seen: true
    },
    created () {
        fetch('avisos/api/jsonRequerimiento1AI.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos60 = json
            })
    }
})

const previoAI = new Vue({
    el: '#previoAI',
    data: { 
        avisos61: [],
        mensaje: "*",

        seen: true
    },
    created () {
        fetch('avisos/api/jsonPrevioAI.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos61 = json
            })
    }
})

const justificadoAI = new Vue({
    el: '#justificadoAI',
    data: { 
        avisos62: [],
        mensaje: "*",

        seen: true
    },
    created () {
        fetch('avisos/api/jsonJustificadoAI.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos62 = json
            })
    }
})


const contestacionReq3a = new Vue({
    el: '#contestacionReq3a',
    data: { 
        avisos51: [],
        mensaje: "*",
        seen: true
    },
    created () {
        fetch('avisos/api/jsonContestacionReq3a.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos51 = json
            })
    }
})

const contestacionReq3b = new Vue({
    el: '#contestacionReq3b',
    data: { 
        avisos52: [],
        mensaje: "*",
        seen: true
    },
    created () {
        fetch('avisos/api/jsonContestacionReq3b.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos52 = json
            })
    }
})

const contestacionSuspension1= new Vue({
    el: '#contestacionSuspension1',
    data: { 
        avisos56: [],
        mensaje: "*",
        seen: true
    },
    created () {
        fetch('avisos/api/jsonContestacionSuspension1.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos56 = json
            })
    }
})

const contestacionSuspension2= new Vue({
    el: '#contestacionSuspension2',
    data: { 
        avisos57: [],
        mensaje: "*",
        seen: true
    },
    created () {
        fetch('avisos/api/jsonContestacionSuspension2.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos57 = json
            })
    }
})

const revisionAI= new Vue({
    el: '#revisionAI',
    data: { 
        avisos63: [],
        mensaje: "*",
        seen: true
    },
    created () {
        fetch('avisos/api/jsonRevisionAI.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos63 = json
            })
    }
})

const revisionAD= new Vue({
    el: '#revisionAD',
    data: { 
        avisos64: [],
        mensaje: "*",
        seen: true
    },
    created () {
        fetch('avisos/api/jsonRevisionAD.php')
            .then(response => response.json())
            .then(json => {
                this.seen = json.length > 0 ? true : false;
                this.avisos64 = json
            })
    }
})
