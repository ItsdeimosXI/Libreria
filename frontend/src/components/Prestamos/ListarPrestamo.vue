<template>
    <div>
        <section class="intro">
        <div class="gradient-custom-1 h-100">
            <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="input-goup mb-3">
                    <router-link :to="{name: 'prestamocrear'}">
                        <button class="btn btn-success">
                       <i class="fa-solid fa-check"> </i>Crear nuevo prestamo
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
                    <th scope="col">Socio</th>
                    <th scope="col">Libro</th>
                </tr>
        </thead>
            <tbody>
                <tr v-for="prestamo in prestamos" :key="prestamo.id">
                    <th scope="row" style="color: #666666;">{{prestamo.id}}</th>
                    <td>{{ prestamo.socio.nombre_apellido }}</td>
                    <td>{{ prestamo.libro.titulo  }}</td>
                    <td>&nbsp;
                    <button class="btn btn-danger" @click="eliminar(prestamo.id, prestamo.socio.nombre_apellido)"> 
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
            prestamos:null,
        }
    },
    mounted(){
        this.getPrestamo();
    },
    methods:{
        getPrestamo(){
            axios.get('http://127.0.0.1:8000/apiv1/prestamos').then(
                response => (
                    this.prestamos = response.data
                )
            );

        },
        eliminar(id: any, descripcion: any, url='http://127.0.0.1:8000/apiv1/prestamos', mensaje = 'Prestamo eliminado', href ='/Prestamo'){
            confirmar(id, descripcion, url, mensaje, href)
        }
    }
}
</script>
