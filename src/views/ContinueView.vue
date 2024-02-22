<script setup>
import router from '@/router/index.js'

function sayfayaGonder() {
  router.push({ name: "home" }) // Başka sayfaya gönderme
}


</script>
<template>
  <div class="container">
    <h4>This is an continue page</h4>
    <dialog open>
      <article>
        <h2>İşleminiz Başarılı</h2>
        <p>
          <slot></slot>
        </p>
        <!-- <ul>
          İşleminiz başarıyla tamamlandı.
          <li>Membership: Individual</li>
          <li>Price: $10</li>
        </ul> -->
        <footer>
          <button className="secondary">
            İptal
          </button>
          <button @click="sayfayaGonder()">Tamam

          </button>
        </footer>
      </article>
    </dialog>
  </div>
</template>

<style></style>
