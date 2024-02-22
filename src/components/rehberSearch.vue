<script setup>
import { ref, reactive } from 'vue'

const CEVAP = reactive({ rehber: [] })
const search = ref('')
const refFormlar = ref(null)


function getDataFormlar(id) {
  fetch('http://localhost/vue_dersleri/api.php?method=get.formlar&id=' + id)
    .then((response) => response.json())
    .then((data) => {
      refFormlar.value = data
    })
}

// Arama fonksiyonu
function searchRehber(search) {
  fetch('http://localhost/vue_dersleri/rehber.api.php?method=get.rehber.search&search=' + search)
    //fetch('http://localhost/rehber/public/api/api.php')
    .then((response) => response.json())
    .then((data) => (CEVAP.rehber = data))
  console.log(CEVAP.rehber)
}

</script>
<template>
  <!-- <pre>{{ CEVAP }} {{ CEVAP.rehber.length }} </pre> -->
  <div class="container">
    <h3>Arama</h3>
    <article data-theme="light">
      <form @submit.prevent="searchRehber(search)" role="search">
        <input type="search" placeholder="İsim" v-model="search" />
        <input type="submit" value="Ara" />
      </form>
    </article>
  </div>
  <article data-theme="light">
    <tek-kisi v-for="i in CEVAP.rehber" :key="i.id" islem="select" id=i.id :ad=i.ad :telefon=i.telefon>
    </tek-kisi>
  </article>
  <article data-theme="light" v-if="CEVAP.rehber.length > 0">
    <div clas="overflow-auto">
      <table role="grid" class="striped">
        <thead data-theme="light">
          <tr>
            <th nowrap>ID</th>
            <th nowrap>Ad Soyad</th>
            <th nowrap>Telefon</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for=" i in CEVAP.rehber" :key="i.id">
            <td nowrap>
              <button @click="getDataFormlar(i.id)">{{ i.id }}</button>
            </td>
            <td nowrap>{{ i.ad }}</td>
            <td nowrap>{{ i.telefon }}</td>
            <!-- <td><a href="#top" role="button" class="secondary" @click="myEdit.user = i; myIslem = 'delete'">Sil</a>
                </td> -->
          </tr>
        </tbody>
      </table>
    </div>
  </article>
  <article>

    <table role="grid" class="stripped">
      <thead>
        <tr>
          <th nowrap>ID</th>
          <th nowrap>Ad Soyad</th>
          <th nowrap>TC Kimlik</th>
          <th nowrap>E-posta</th>
          <th nowrap>Adres</th>
          <th nowrap>Yaş</th>
          <th nowrap>Dersler</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="i in refFormlar" :key="i.id">
          <td nowrap>{{ i.id }}</td>
          <!--   <td nowrap>
          <button @click="myEdit.user = i" v-if="i.durum == 1">{{ i.id }}</button>
        </td> -->
          <td nowrap>{{ i.adsoyad }}</td>
          <td nowrap>{{ i.tc }}</td>
          <td nowrap>{{ i.eposta }}</td>
          <td nowrap>{{ i.il_adi }}</td>
          <td nowrap>{{ i.yas }}</td>
          <td nowrap>{{ i.dersler.replaceAll('|', ',') }}</td>
        </tr>
      </tbody>
    </table>
  </article>
</template>