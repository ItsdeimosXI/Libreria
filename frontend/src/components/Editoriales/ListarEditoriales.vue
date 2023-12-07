<template>
    <div>
        <section class="intro">
        <div class="gradient-custom-1 h-100">
            <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="input-goup mb-3">
                    <router-link :to="{name: 'CrearEditoriales'}">
                        <button class="btn btn-success">
                       <i class="fa-solid fa-check"> </i>Crear nueva Editorial
                    </button>
                    </router-link>
                </div>
                 <div class="row justify-content-center">
                    <div class="col-12">
                <div class="table-responsive bg-white">
        <table class="table mb-0">
         <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
        </thead>
            <tbody>
                <tr v-for="editorial in editoriales" :key="editorial.id">
                    <th scope="row" style="color: #666666;">{{editorial.id}}</th>
                    <td>{{editorial.nombre}}
                    </td>
                    <td>&nbsp;
                    <button class="btn btn-danger" @click="eliminar(editorial.id, editorial.nombre)"> 
                    <i class="fa-solid fa-trash"></i> 
                    </button>
                    </td>
                </tr>
            </tbody>
        </table>
                        </div>
                    </div>
                 </div>
            </div>
            </div>
    </div>
    </section>
</div>
</template>

<script lang="ts">
import axios from 'axios';
import { confirmar } from '../Funciones/Funciones.js';
export default{
    data() {
        return{
            editoriales:null
        }
    },
    mounted(){
        this.getEditoriales();
    },
    methods:{
        getEditoriales(){
            axios.get('http://127.0.0.1:8000/apiv1/editoriales').then(
                response => (
                    this.editoriales = response.data
                )
            );

        },
        eliminar(id: any, descripcion: any, url='http://127.0.0.1:8000/apiv1/editoriales',  mensaje = 'Editorial eliminada', href ='/Editoriales'){
            confirmar(id, descripcion, url, mensaje, href)
        }
    }
}
</script>
