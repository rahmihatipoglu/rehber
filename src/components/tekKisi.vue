<script setup>
import { reactive } from 'vue'
import router from '@/router/index.js'

const myProps = defineProps(['id', 'ad', 'telefon', 'islem'])

const formData = reactive({
  id: myProps.id,
  adi: myProps.ad,
  telefonu: myProps.telefon,
  islem: myProps.islem,
  button: '',
  class: '',
  durum: false
})
formData.button = formData.islem

if (formData.islem == 'add') {
  formData.button = "Yeni Ekle"
  formData.class = "primary"
}
if (formData.islem == 'update') {
  formData.button = "Güncelle"
  formData.class = "primary"
}
if (formData.islem == 'delete') {
  formData.button = "Sil"
  formData.class = "secondary contrast"
}
if (formData.islem == 'select') {
  formData.button = "Seç"
  formData.class = "primary contrast"
  formData.durum = false
}

function clickButton() {
  updateRehber()
}

function updateRehber() {

  const url = 'http://localhost/rehber/public/api/api.php'
  //formData.method = "add"
  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(formData)
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data)
      //alert(data.mesaj)
      formData.adi = ''
      formData.telefonu = ''
      router.push({ name: "continue" }) // Başka sayfaya gönderme
      //router.go(0) // Page Refresh
    })

}

</script>

<template>
  <div>
    <article data-theme="light">
      <form @submit.prevent="clickButton()">
        <fieldset role="group">
          <input type="text" placeholder="Ad" v-model="formData.adi" />
          <input type="text" placeholder="Telefon" v-model="formData.telefonu" />
          <input type="submit" :class="formData.class" :value="formData.button" :disabled="formData.durum" />
        </fieldset>
      </form>
      <!-- <pre>{{ formData }}</pre> -->
    </article>
  </div>
</template>