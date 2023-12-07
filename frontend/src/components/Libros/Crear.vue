<template>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    Crear nuevo Libro
                </div>
                <div class="card-body">
                    <form v-on:submit="guardar">
                        <div class="input-goup mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-commenting">
                                </i>
                                <label for="basic-url" class="form-label">Titulo</label>
                            </span>
                            <input type="text" class="form-control" maxlength="20" placeholder="Titulo" required
                                v-model="titulo">
                            <span class="input-group-text">
                                <i class="fa-solid fa-commenting">
                                </i>
                                <label >Autores</label>
                            </span>
                            <select class="form-select" aria-label="Default select example" v-model="autor"
                                required>
                                <option v-for="autor in autores" :key="autor.id" :value="autor.id">{{ autor.nombre_apellido
                                }}
                                </option>
                            </select>
                            <span class="input-group-text">
                                <i class="fa-solid fa-commenting">
                                </i>
                                <label for="">Editorial</label>
                            </span>
                            <select class="form-select" aria-label="Default select example" v-model="editorial"
                            required>
                            <option v-for="editorial in editoriales" :key="editorial.id" :value="editorial.id">{{ editorial.nombre
                            }}
                            </option>   
                        </select>
                            <span class="input-group-text">
                                <i class="fa-solid fa-commenting">
                                </i>
                                <label for="">Año</label>
                            </span>
                            <input type="number" class="form-control" maxlength="20" placeholder="Año" required
                                v-model="anio">
                            <span class="input-group-text">
                                <i class="fa-solid fa-commenting">
                                </i>
                                <label for="">Cantidad de paginas</label>
                            </span>
                            <input type="number" class="form-control" maxlength="20"
                                placeholder="Cantidad de paginas" required v-model="cant_paginas">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-commenting">
                                    </i>
                                    <label for="">Genero</label>
                                </span>
                                <select class="form-select" aria-label="Default select example" v-model="genero"
                                required>
                                <option v-for="genero in generos" :key="genero.id" :value="genero.id">{{ genero.descripcion
                                }}
                                </option>
                            </select>
                            <span class="input-group-text">
                                <i class="fa-solid fa-commenting">
                                </i>
                                <label for="">Categoria</label>
                            </span>
                            <select class="form-select" aria-label="Default select example" v-model="categoria"
                            required>
                            <option v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">{{ categoria.descripcion
                            }}
                            </option>
                        </select>
                            <span class="input-group-text">
                                <i class="fa-solid fa-commenting">
                                </i>
                                <label for="">Estado actual</label>
                            </span>
                            <select class="form-select" aria-label="Default select example" v-model="estado">
                                <option value="ACTIVO">Activo</option>
                                <option value="INACTIVO">Inactivo</option>
                                <option value="PRESTADO">Prestado</option>
                              </select>
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
import axios from 'axios';
import { show_alerta, enviarSolicitud } from '../Funciones/Funciones.js';
export default {
    data() {
        return {
            titulo: '',
            autor: [],
            editorial: '',
            cant_paginas: '',
            categoria: '', // Id de la categoría seleccionada
            genero: '',    // Id del género seleccionado
            estado: 'activo',
            anio: '',
            autores: [],
            editoriales: [],
            categorias: [], // Cargar las categorías existentes
            generos: [],
            url: 'http://127.0.0.1:8000/apiv1/libros/nuevo',
            aut: [],
        }
    },
    methods: {
        guardar() {
            event?.preventDefault();
            if (this.autor === null) {
            show_alerta('Selecciona el autor', 'warning', 'autor');
            } else if(this.titulo.trim() === ''){
                show_alerta('Escribe el titulo', 'warning', 'titulo');
            } else if(this.anio === ''){
                show_alerta('Escribe el año', 'warning', 'anio');
            }else if(this.cant_paginas === ''){
                show_alerta('Escribe la cantidad de paginas', 'warning', 'cant_paginas');
            }
            else if(this.categoria === ''){
                show_alerta('Selecciona la categoria', 'warning', 'categoria');
            } else if(this.genero === ''){
                show_alerta('Selecciona el genero', 'warning', 'genero');
            }else if(this.estado.trim() === ''){
                show_alerta('Seleccione el estado', 'warning', 'estado');
            }else if(this.editorial === ''){
                show_alerta('Seleccione la editorial', 'warning', 'editorial');
            }
            else {
                var parametros = { titulo: this.titulo.trim(), id_genero: this.genero, id_categoria: this.categoria, cant_paginas: this.cant_paginas, anio: this.anio, estado: this.estado, id_editorial: this.editorial, id_autor: [1]};
                enviarSolicitud('POST', parametros, this.url, 'Libro guardado', '/libros');
            }
        },
        LlamadoParaDemas() {
            // Realizar solicitudes a la API para obtener categorías y géneros
            axios.get('http://127.0.0.1:8000/apiv1/categorias')
                .then(response => {
                    this.categorias = response.data;
                })
                .catch(error => {
                    console.error('Error al obtener categorías:', error);
                });

            axios.get('http://127.0.0.1:8000/apiv1/generos')
                .then(response => {
                    this.generos = response.data;
                })
                .catch(error => {
                    console.error('Error al obtener géneros:', error);
                });
            // Realizar solicitudes a la API para obtener categorías y géneros
            axios.get('http://127.0.0.1:8000/apiv1/autores')
                .then(response => {
                    this.autores = response.data;
                })
                .catch(error => {
                    console.error('Error al obtener categorías:', error);
                });

            axios.get('http://127.0.0.1:8000/apiv1/editoriales')
                .then(response => {
                    this.editoriales = response.data;
                })
                .catch(error => {
                    console.error('Error al obtener géneros:', error);
                });
        },
    },
    mounted() {
        // Cargar categorías y géneros al montar el componente
        this.LlamadoParaDemas();
    },
}
</script>

<style scoped></style>