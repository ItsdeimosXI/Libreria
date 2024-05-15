<template>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    Crear Nuevo Autor
                </div>
        <div class="card-body">
            <form v-on:submit="guardar">
                <div class="input-goup mb-3">
                    <span class="input-group-text">
                        <i class="fa-solid fa-commenting">
                        </i>
                    </span>
                    <input type="text" id="nombre_apellido" class="form-control" maxlength="20" placeholder="Autor del libro" required v-model="nombre_apellido">
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

import { show_alerta, enviarSolicitud } from '../Funciones/Funciones.js';
export default {
    data(){
        return {
        nombre_apellido: '',
         url: 'http://127.0.0.1:8000/apiv1/autores/nuevo'
        }    
    },
    methods:{
        guardar(){
            event?.preventDefault();
            if(this.nombre_apellido.trim() === ''){
                show_alerta('Escribe el autor', 'warning', 'nombre_apellido' );
            }else{
                var parametros = {nombre_apellido: this.nombre_apellido.trim()}
                enviarSolicitud('POST', parametros, this.url , 'autor guardado', '/Autores');
            }
        }
    }
}
</script>

<style scoped>

</style>