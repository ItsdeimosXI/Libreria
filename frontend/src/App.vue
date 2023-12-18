<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
      <div class="container-fluid">
        <router-link :to="{name: 'home'}" class="navbar-brand">Inicio</router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link :to="{name: 'Socios' }" class="nav-link">Socios</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{name: 'Libros'}" class="nav-link" router-limk>Libros</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{name: 'prestamo'}" class="nav-link" router-limk>Prestamos</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{name: 'Generos'}" class="nav-link">Generos</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{name: 'Editoriales'}" class="nav-link">Editoriales</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{name: 'Autores'}" class="nav-link">Autores</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{name: 'Categorias'}" class="nav-link">Categorias</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{name: 'about'}" class="nav-link">Sobre nosotros</router-link>
            </li>
          </ul>
        </div>
    </div>
   
  </nav>
  <div class="container-fluid mt-3">
    <router-view></router-view>
  </div>

</div>
<footer>
  <Footer/>
</footer>
</template>

<script lang="ts" setup>
import Footer from './components/Footer.vue';
</script>

