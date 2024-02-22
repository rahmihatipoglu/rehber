<script setup>
import { ref, reactive, onMounted } from 'vue'
//import { router } from "vue-router"

const CEVAP = reactive({ rehber: [] })
const myIslem = ref('');
const myEdit = reactive({
  user: {
    id: 0,
    ad: '',
    telefon: ''
  }
})
function getDataRehber() {
  //fetch('http://localhost/vue_dersleri/api.php?method=get.rehber')
  fetch('http://localhost/rehber/public/api/api.php')
    .then((response) => response.json())
    .then((data) => (CEVAP.rehber = data))
}

onMounted(() => {
  getDataRehber()

})


</script>

<template>
  <div class="container">
    <article data-theme="light" v-if="myEdit.user.id > 0">
      <tek-kisi :islem="myIslem" :id="myEdit.user.id" :ad="myEdit.user.ad" :telefon="myEdit.user.telefon"
        :key="myEdit.user.id + myIslem">
      </tek-kisi>
    </article>

    <article data-theme="light">
      <h1>
        <slot name="BASLIK" />
      </h1>
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
                <a href="#top" role="button" @click="myEdit.user = i; myIslem = 'update'">{{ i.id }}</a>
              </td>
              <td nowrap>{{ i.ad }}</td>
              <td nowrap>{{ i.telefon }}</td>
              <td><a href="#top" role="button" class="secondary" @click="myEdit.user = i; myIslem = 'delete'">Sil</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </article>
    <article>
      <tek-kisi islem="add" id="0" ad="" telefonu="">
      </tek-kisi>
      <small style="color: green">Yeni kişiyi buradan ekleyebilirsiniz.</small>
      <footer>
        <small style="color: red">
          <slot name="FOOTER" />
        </small>
      </footer>
    </article>
  </div>
</template>

    