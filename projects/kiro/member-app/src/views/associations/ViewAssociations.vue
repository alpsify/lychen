<template>
  <div>Listes des associations (AMAP) disponibles</div>
  <section class="flex flex-col gap-4">
    <LychenKiroCardAssociation
      v-for="association in associations"
      :key="association.uuid"
      :association="association"
    />
  </section>
</template>

<script lang="ts" setup>
import LychenKiroCardAssociation from '@lychen/kiro-ui-components/card-association/LychenKiroCardAssociation.vue';
import {Association} from '@lychen/kiro-util-sdk/model/Association';


const associations: Association[] = [
  {
    uuid: '1',
    name: 'AMAP de Novel'
  },
  {
    uuid: '2',
    name: 'AMAP de Paris'
  },
  {
    uuid: '3',
    name: 'AMAP des Capuccins'
  }
]
</script>

<style lang="css" scoped></style>
