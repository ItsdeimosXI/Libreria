<template>
    <div>
        <section class="intro">
        <div class="gradient-custom-1 h-100">
            <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="input-goup mb-3">
                    <router-link :to="{name: 'CrearCategorias'}">
                        <button class="btn btn-success">
                       <i class="fa-solid fa-check"> </i>Crear nueva categoria
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
                    <th scope="col">descripcion</th>
                    <th scope="col">Acciones</th>
                </tr>
        </thead>
            <tbody>
                <tr v-for="categoria in Categorias" :key="categoria.id">
                    <th scope="row" style="color: #666666;">{{categoria.id}}</th>
                    <td>{{categoria.descripcion}}
                    </td>
                    <td>&nbsp;
                    <button class="btn btn-danger" @click="eliminar(categoria.id, categoria.descripcion)"> 
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
            Categorias:null
        }
    },
    mounted(){
        this.getCategorias();
    },
    methods:{
        getCategorias(){
            axios.get('http://127.0.0.1:8000/apiv1/categorias').then(
                response => (
                    this.Categorias = response.data
                )
            );

        },
        eliminar(id: any, descripcion: any, url='http://127.0.0.1:8000/apiv1/categorias',  mensaje = 'Categoria eliminada', href ='/Categorias'){
            confirmar(id, descripcion, url, mensaje, href)
        }
    }
}
</script>
