<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <nav>
      <ul>
        <li><strong>Rehber</strong></li>
      </ul>
      <ul>
        <li>
          <RouterLink to="/">Anasayfa</RouterLink>
        </li>
        <li>
          <RouterLink to="/yeni">Yeni</RouterLink>
        </li>
        <li>
          <RouterLink to="/yeni2">Yeni Salı</RouterLink>
        </li>
        <li>
          <RouterLink to="/list">Liste</RouterLink>
        </li>
        <li>
          <RouterLink to="/search">Arama</RouterLink>
        </li>
        <li>
          <RouterLink to="/edit">Düzeltme</RouterLink>
        </li>
        <li>
          <RouterLink to="/about">Hakkında</RouterLink>
        </li>


      </ul>
    </nav>
  </header>

  <RouterView />
</template>

<style scoped></style>
