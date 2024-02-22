import rehberListele from '@/components/rehberList.vue'
import rehberAdd from '@/components/rehberAdd.vue'
import rehberKayit from '@/components/rehberKayit.vue'
import tekKisi from '@/components/tekKisi.vue'
import rehberSearch from '@/components/rehberSearch.vue'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import '@/../node_modules/@picocss/pico/css/pico.pink.min.css'

import App from './App.vue'
import router from './router'

const app = createApp(App).component('rehberListele', rehberListele)
app.component('rehberAdd', rehberAdd)
app.component('rehberKayit', rehberKayit)
app.component('tekKisi', tekKisi)
app.component('rehberSearch', rehberSearch)
app.use(createPinia())
app.use(router)

app.mount('#app')
