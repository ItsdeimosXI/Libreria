import { createRouter, createWebHistory } from 'vue-router'
import Home from '../components/Home.vue';
import SociosListar from '../components/Socios/Listar.vue';
import ListarGeneros from '../components/Generos/ListarGeneros.vue';
import SociosCrear from '../components/Socios/Crear.vue';
import CrearGeneros from '../components/Generos/CrearGenero.vue';
import SocioActualizar from '../components/Socios/Actualizar.vue';
import LibrosListar from '../components/Libros/Listar.vue';
import LibrosActualizar from '../components/Libros/Actualizar.vue';
import CrearLibro from '../components/Libros/Crear.vue';
import ActualizarGeneroVue from '../components/Generos/ActualizarGenero.vue';
import CrearAutores from '../components/Autores/CrearAutores.vue';
import ListarAutores from '../components/Autores/ListarAutores.vue';
import CrearCategorias from '../components/Categorias/CrearCategorias.vue';
import ListarCategorias from '../components/Categorias/ListarCategorias.vue';
import CrearEditoriales from '../components/Editoriales/CrearEditoriales.vue';
import ListarEditoriales from '../components/Editoriales/ListarEditoriales.vue';
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../components/About.vue')
    },
    {
      path: '/socios',
      name: 'Socios',
      component: SociosListar
    },
    {
      path: '/generos',
      name: 'Generos',
      component: ListarGeneros
    },
    {
      path: '/generos/actualizar/:id',
      name: 'Generoactualizar',
      component: ActualizarGeneroVue
    },
    {
      path: '/generos/crear',
      name: 'CrearGeneros',
      component: CrearGeneros
    },
    {
      path: '/socios/crear',
      name: 'sociosCrear',
      component: SociosCrear
    },
    { path: '/socios/actualizar/:id', 
    name: 'ActualizarSocio', 
    component: SocioActualizar }
    ,
    { path: '/libros/', 
    name: 'Libros', 
    component: LibrosListar },
    {
      path: '/libros/crear',
      name: 'CrearLibro',
      component: CrearLibro
    },
    { path: '/libros/actualizar/:id', 
    name: 'LibrosActualizar', 
    component: LibrosActualizar },
     {
      path: '/Autores',
      name: 'Autores',
      component: ListarAutores
    },
    {
      path: '/Autores/crear',
      name: 'CrearAutores',
      component: CrearAutores
    },
    {
      path: '/Categorias',
      name: 'Categorias',
      component: ListarCategorias
    },
    {
      path: '/Categorias/crear',
      name: 'CrearCategorias',
      component: CrearCategorias
    },
    {
      path: '/editoriales',
      name: 'Editoriales',
      component: ListarEditoriales
    },
    {
      path: '/Editoriales/crear',
      name: 'CrearEditoriales',
      component: CrearEditoriales
    },
  ]
})

export default router