<script setup>
import { reactive } from 'vue'
//import { router } from "vue-router"

const formData = reactive({
  adi: '',
  telefonu: ''
})

function addRehber() {
  const url = 'http://localhost/vue_dersleri/formlar.api.php?method=add'

  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(formData)
  })
    .then((response) => response.json())
    .then((data) => {
      alert(data.mesaj)
      formData.adi = ''
      formData.telefonu = ''
      //router.push({ name: "liste" })
    })
}
</script>

<template>
  <div class="container">
    <form @submit.prevent="addRehber">
      <article data-theme="light">
        <div class="grid">
          <div>
            <label>Ad</label>
            <input type="text" v-model="formData.adi" required />
          </div>
          <div>
            <label>Telefon</label>
            <input type="text" v-model="formData.telefonu" required />
          </div>
        </div>
        <div class="grid">
          <div>
            <button type="submit">Kaydet</button>
          </div>
        </div>
      </article>
    </form>
  </div>
</template>
