# Slot ve Prop

## View

```HTML
<script setup>
import nuri from './nuri.vue'
</script>

<template>
  <nuri yazi="white" zemin="red" isim="Rahmi">
    Dünya
    <template #altkisim>
      <hr>Burası alt kısımdır.
    </template>
  </nuri>
</template>

```

## Component

```HTML
<script setup>
import {defineProps} from 'vue'

const myProps = defineProps(['zemin', 'yazi', 'isim'])

</script>

<template>
  <h1 :style="{color: myProps.yazi, backgroundColor: myProps.zemin}">Merhaba {{myProps.isim}}</h1>

  <h3>{{myProps.isim}} : {{myProps.isim.length}}</h3>

  <p>GELEN: <pre>{{myProps}}</pre></p>


<p><b>Alt Kısım Slotu:</b></p>
  <slot name="altkisim"></slot>

<p><b>Default Slot:</b></p>
  <slot></slot>


</template>

```

Bu proje Windows ortamına port edildi.
