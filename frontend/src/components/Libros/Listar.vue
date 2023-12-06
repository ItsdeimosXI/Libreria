<script lang="ts">
import axios from "axios";
export default {
    data() { 
        return {
            libros: [],
        };
    },
    created() {
        this.getLibros();
    },
    methods: {
        async getLibros() {
            const res = await axios.get("http://127.0.0.1:8000/apiv1/libros")
            this.libros = res.data;
        },
    borrar(id:number){
        axios.delete('http://127.0.0.1:8000/apiv1/libros/' + id).then((response) => {
            if (response.data === null){
                console.log(response)
                alert ("Libro Eliminado")
            }
            this.getLibros();
        })
        .catch((_error) => { alert ('No se pudo eliminar el libro ya que esta prestado')} )
    }
    },
   
}
</script>

<template>
    <div>
        <h1>Libros</h1>
        <router-link to="/crear">
            <div class="crear">
                <button texto="Nuevo" class="btn btn-primary">Crear nuevo libro</button>
            </div>
        </router-link>
    </div>
    <div>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>TITULO</th>
                <th>AUTOR</th>
                <th>EDITORIAL</th>
                <th>AÑO</th>
                <th>CANTIDAD DE PAGINAS</th>
                <th>GENERO</th>
                <th>CATEGORIA</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </thead>
            <tbody v-for="libro in libros" :key="libro.id">
                <td>{{ libro.id }}</td>
                <td>{{ libro.titulo }}</td>
                <td v-for="(item, index) in libro.autor" :key="index">
                    {{ item }}
                </td>
                <td v-for="(item, index) in libro.editorial" :key="index">
                    {{ item }}</td>
                <td>{{ libro.anio }}</td>
                <td>{{ libro.cant_paginas }}</td>
                <td v-for="(item, index) in libro.genero">{{ item }}</td>
                <td v-for="(item, index) in libro.categoria">{{ item }}</td>
                <td>{{ libro.estado }}</td>
                <td>
                    <button class="btn btn-primary">Editar </button>
                    <button class="btn btn-danger" @click="borrar(libros.id)"> Eliminar </button>
                </td>
            </tbody>
        </table>
    </div>
</template>
                    