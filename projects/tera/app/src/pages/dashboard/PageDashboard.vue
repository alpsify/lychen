<template>
  <div class="flex flex-col gap-4">
    Dashboard
    <button
      class="p-4 bg-gray-500 rounded-lg"
      @click="fetchLands"
    >
      Fetch
    </button>

    <button
      class="p-4 bg-gray-500 rounded-lg"
      @click="fetchLand"
    >
      Fetch specific land
    </button>
  </div>
</template>

<script lang="ts" setup>
import zitadelAuth from '@/services/ZitadelAuth';
import { ref } from 'vue';

const lands = ref();

async function fetchLands() {
  try {
    const response = await fetch('https://api.tera.lychen.local/api/lands', {
      headers: {
        Authorization: `Bearer ${zitadelAuth.oidcAuth.accessToken}`,
      },
    });

    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }

    lands.value = await response.json();
    //console.log(json);
  } catch (e) {
    //console.log(e);
  }
}

const land = ref();
async function fetchLand() {
  try {
    const response = await fetch(
      `https://api.tera.lychen.local/api/lands/${lands.value.member[0].ulid}`,
      {
        headers: {
          Authorization: `Bearer ${zitadelAuth.oidcAuth.accessToken}`,
        },
      },
    );

    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }

    land.value = await response.json();
    //console.log(json);
  } catch (e) {
    //console.log(e);
  }
}
</script>

<style lang="css" scoped></style>
