<template>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    Editar genero
                </div>
        <div class="card-body">
            <form v-on:submit="guardar">
                <div class="input-goup mb-3">
                    <span class="input-group-text">
                        <i class="fa-solid fa-commenting">
                        </i>
                    </span>
                    <input type="text" id="descripcion" class="form-control" maxlength="20" placeholder="Genero libro" required v-model="descripcion">
                </div>
                <div class="d-grid col-6 mx-auto">
                    <button class="btn btn-success">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Guardar
                    </button>
                </div>
            </form>
        </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { useRoute } from 'vue-router';
import { show_alerta, enviarSolicitud } from '../Funciones/Funciones.js';
import axios from 'axios';
export default {
    data(){
        return {
        id:0,
        descripcion: '',
        url: 'http://127.0.0.1:8000/apiv1/generos'
        }    
    },
    mounted(){
        const route = useRoute();
        this.id = route.params.id;
        this.url = this.url + '/'+ this.id;
        this.GetDescripcion();    
    },
    methods:{
        GetDescripcion(){
            axios.get(this.url).then(
                response => (
                    this.descripcion = response.data['descripcion']
                )
            )
        },
        guardar(){
            event?.preventDefault();
            if(this.descripcion.trim() === ''){
                show_alerta('Escribe la descripcion', 'warning', 'descripcion' );
            }else{
                var parametros = {descripcion: this.descripcion.trim()}
                enviarSolicitud('PUT', parametros, this.url , 'Genero actualizado');
            }
        },
    }
}
</script>

<style scoped>

</style>