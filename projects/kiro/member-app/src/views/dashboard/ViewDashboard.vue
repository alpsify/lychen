<template>
  <header class="mb-4 flex items-end rounded-b-xl p-4">
    <h1 class="text-2xl font-bold text-white">AMAP</h1>
  </header>
  <div class="flex flex-col gap-4 p-4">
    <h2 class="text-lg font-bold">A venir</h2>
    <div
      class="flex items-center justify-between gap-4 rounded-xl bg-gray-100 p-4 shadow-md hover:shadow-lg"
    >
      <div class="flex flex-col">
        <h2 class="text-lg font-bold">13 janvier 2025</h2>
        <p>AMAP de Novel</p>
        <div class="mt-4 flex items-center gap-2 opacity-50">
          <small>5 contrats</small> |
          <small class="text-red-600">
            <FontAwesomeIcon
              :icon="['fal', 'users']"
              class="mr-2"
            />
            Manque de bénévoles</small
          >
        </div>
      </div>
      <div class="flex gap-4">
        <!--<FontAwesomeIcon :icon="['fal', 'location-dot']" />-->
        <!--<FontAwesomeIcon :icon="['fal', 'arrow-right']" />-->
      </div>
    </div>
    <h2 class="text-lg font-bold">Vos AMAPs</h2>
    <div
      class="flex items-center justify-between gap-4 rounded-xl bg-gray-100 p-4 shadow-md hover:shadow-lg"
    >
      <div class="flex flex-col">
        <h2 class="text-lg font-bold">AMAP de Novel</h2>
        <p>30 distributions restantes</p>
        <small class="mt-4 opacity-50">Inscrit depuis le 13 janvier 2024</small>
      </div>
      <!--<FontAwesomeIcon :icon="['fal', 'cogs']" />-->
    </div>
    <h2 class="text-lg font-bold">Découvrir</h2>
    <Input placeholder="Rechercher ..." />
  </div>
</template>

<script lang="ts" setup>
import { Input } from '@lychen/ui-components/input';
</script>

<style lang="css" scoped>
header {
  background-image: url('@/assets/amap-header.png');
  background-position: center;
  min-height: 250px;
}
</style>
