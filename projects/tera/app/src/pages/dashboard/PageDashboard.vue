<template>
  <div>
    Dashboard
    <button
      class="p-4 bg-gray-500 rounded-lg"
      @click="fetchLands"
    >
      Fetch
    </button>
  </div>
</template>

<script lang="ts" setup>
import zitadelAuth from '@/services/ZitadelAuth';

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

    const json = await response.json();
    //console.log(json);
  } catch (e) {
    //console.log(e);
  }
}
</script>

<style lang="css" scoped></style>
