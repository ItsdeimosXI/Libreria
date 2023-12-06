<template>
    <div>
        <section class="intro">
        <div class="gradient-custom-1 h-100">
            <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="input-goup mb-3">
                    <router-link :to="{name: 'CrearGeneros'}">
                        <button class="btn btn-success">
                       <i class="fa-solid fa-check"> </i>Crear nuevo genero
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
                    <th scope="col">Descripcion</th>
                    <th scope="col">Acciones</th>
                </tr>
        </thead>
            <tbody>
                <tr v-for="genero in generos" :key="genero.id">
                    <th scope="row" style="color: #666666;">{{genero.id}}</th>
                    <td>{{genero.descripcion}}
                    </td>
                    <td>
                    <router-link :to="{path: 'ActualizarGenero/'+genero.id}" class="btn btn-warning">
                    <i class="fa-solid fa-edit"></i> 
                    </router-link> &nbsp;
                    <button class="btn btn-danger" @click="eliminar(genero.id, genero.descripcion)"> 
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
import { confirmar } from '../../funciones.js';
export default{
    data() {
        return{
            generos:null
        }
    },
    mounted(){
        this.getGeneros();
    },
    methods:{
        getGeneros(){
            axios.get('http://127.0.0.1:8000/apiv1/generos').then(
                response => (
                    this.generos = response.data
                )
            );

        },
        eliminar(id: any, descripcion: any){
            confirmar(id, descripcion)
        }
    }
}
</script>
