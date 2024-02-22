<script setup>
import { reactive } from 'vue'

const myProps = defineProps(['id', 'ad', 'telefon', 'button', 'islem'])

const formData = reactive({
  id: myProps.id,
  adi: myProps.ad,
  telefonu: myProps.telefon,
  islem: myProps.islem
})

function addRehber() {
  const url = 'http://localhost/rehber/public/api/api.php'
  formData.islem = "add"
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
      //formData.method = ''
    })

}
</script>
<template>
  <div class="container">
    <h2>13 Şubat 2024 Salı Kayıt</h2>

    <form @submit.prevent="addRehber">
      <fieldset>
        <label>
          Ad
          <input placeholder="Ad" v-model="formData.adi" required />
        </label>
        <label>
          Telefon
          <input type="text" placeholder="Telefon" v-model="formData.telefonu" required />
        </label>
      </fieldset>

      <input type="submit" class="button" value="Kaydet" />
    </form>
    <form @submit.prevent="addRehber">
      <fieldset role="group">
        <input type="text" placeholder="Ad" v-model="formData.adi" />
        <input type="text" placeholder="Telefon" v-model="formData.telefonu" />
        <input type="submit" value="Kaydet" />
      </fieldset>
    </form>
    <tek-kisi islem="add" id="0" ad="" telefonu="">
    </tek-kisi>
  </div>
</template>