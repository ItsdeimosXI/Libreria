<template>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    Crear Nuevo Prestamo
                </div>
                <div class="card-body">
                    <form v-on:submit="guardar">
                        <div class="input-goup mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-commenting"></i>
                                <label for="">Socio</label>
                            </span>
                            <select class="form-select" aria-label="Default select example" v-model="Socio" required>
                                <option v-for="socio in sociosFiltrados" :key="socio.id" :value="socio.id">{{ socio.nombre_apellido }}
                                </option>
                            </select>
                            <span class="input-group-text">
                                <i class="fa-solid fa-commenting"></i>
                                <label for="">Libro</label>
                            </span>
                            <select class="form-select" aria-label="Default select example" v-model="Libro" required>
                                <option v-for="libro in libros" :key="libro.id" :value="libro.id">{{ libro.titulo }}
                                </option>
                            </select>
                        </div>
                        <div class="d-grid col-6 mx-auto">
                            <button class="btn btn-success">
                                <i class="fa-solid fa-floppy-disk"></i> Guardar
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
            url: 'http://127.0.0.1:8000/apiv1/prestamos/nuevo',
            Socio: null,
            Libro: null,
            libros: [],
            socios: [],
        }
    },
    computed: {
        // Filtrar la lista de socios excluyendo aquellos que ya tienen un préstamo
        sociosFiltrados(): any {
            return this.socios.filter(socio => !this.tienePrestamo(socio.id));
        }
    },
    methods: {
        guardar() {
            event?.preventDefault();
            if (this.Socio === '') {
            show_alerta('Selecciona el socio', 'warning', 'socio');
            } else if(this.Libro === ''){
                show_alerta('Selecciona el libro', 'warning', 'libro');
            }
            else {
                var parametros = { };
                enviarSolicitud('POST', parametros, this.url, 'Libro guardado', '/libros');
            }
        },
        async LlamadoParaDemas() {
            try {
                const [libros, socios] = await Promise.all([
                    axios.get('http://127.0.0.1:8000/apiv1/libros'),
                    axios.get('http://127.0.0.1:8000/apiv1/socios'),
                ]);
                this.libros = libros.data;
                this.socios = socios.data;
            } catch (error) {
                console.error('Error al obtener datos:', error);
            }
        },
        tienePrestamo(_socioId: any) {
          return this.prestamos.some((prestamo: { socio: { id: any; }; }) => prestamo.socio.id === _socioId);
            
        },
    },
    mounted() {
        // Cargar categorías y géneros al montar el componente
        this.LlamadoParaDemas();
    },
}
</script>


