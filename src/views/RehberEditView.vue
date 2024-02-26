<script setup>
import { reactive, onMounted } from "vue";
import { useRouter } from 'vue-router'
const CEVAP = reactive({ rehber: [] })
const $router = useRouter()
const id = $router.currentRoute.value.params.id

function getDataRehber(id) {
  fetch('http://localhost/rehber/public/api/api.php?id=' + id)
    .then((response) => response.json())
    .then((data) => (CEVAP.rehber = data))
}

onMounted(() => {
  getDataRehber(id)
  console.log(CEVAP.rehber)
})

</script>

<template>
  <h4>Düzeltme</h4>
  <tek-kisi v-if="CEVAP.rehber.length > 0" islem="update" :rahmi="CEVAP.rehber[0]" :id="CEVAP.rehber[0].id"
    :ad="CEVAP.rehber[0].ad" :telefon="CEVAP.rehber[0].telefon">
  </tek-kisi>
</template>