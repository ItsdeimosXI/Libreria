<template>
    <div>
        <section class="intro">
        <div class="gradient-custom-1 h-100">
            <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="input-goup mb-3">
                    <router-link :to="{name: 'CrearAutores'}">
                        <button class="btn btn-success">
                       <i class="fa-solid fa-check"> </i>Crear nuevo Autor
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
                    <th scope="col">Nombre y Apellido</th>
                    <th scope="col">Acciones</th>
                </tr>
        </thead>
            <tbody>
                <tr v-for="autor in autores" :key="autor.id">
                    <th scope="row" style="color: #666666;">{{autor.id}}</th>
                    <td>{{autor.nombre_apellido}}
                    </td>
                    <td>&nbsp;
                    <button class="btn btn-danger" @click="eliminar(autor.id, autor.nombre_apellido)"> 
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
            autores:null
        }
    },
    mounted(){
        this.getAutores();
    },
    methods:{
        getAutores(){
            axios.get('http://127.0.0.1:8000/apiv1/autores').then(
                response => (
                    this.autores = response.data
                )
            );

        },
        eliminar(id: any, descripcion: any, url='http://127.0.0.1:8000/apiv1/autores',  mensaje = 'Autor eliminado', href ='/Autores'){
            confirmar(id, descripcion, url, mensaje, href)
        }
    }
}
</script>
