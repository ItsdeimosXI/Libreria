<template>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    Crear Nueva Editorial
                </div>
        <div class="card-body">
            <form v-on:submit="guardar">
                <div class="input-goup mb-3">
                    <span class="input-group-text">
                        <i class="fa-solid fa-commenting">
                        </i>
                    </span>
                    <input type="text" id="nombre" class="form-control" maxlength="20" placeholder="Categoria" required v-model="nombre">
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
        nombre: '',
         url: 'http://127.0.0.1:8000/apiv1/editoriales/nuevo'
        }    
    },
    methods:{
        guardar(){
            event?.preventDefault();
            if(this.nombre.trim() === ''){
                show_alerta('Escribe la editorial', 'warning', 'nombre' );
            }else{
                var parametros = {nombre: this.nombre.trim()}
                enviarSolicitud('POST', parametros, this.url , 'Editorial guardada', '/Editoriales');
            }
        }
    }
}
</script>

<style scoped>

</style>