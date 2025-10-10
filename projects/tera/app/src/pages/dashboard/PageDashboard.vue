<template>
  <section class="flex flex-col gap-6">
    <div class="flex flex-row gap-4 items-center justify-between">
      <Title variant="h2"
        >Bonjour,
        <span class="text-on-surface/70">{{
          zitadelAuth.oidcAuth.userProfile.given_name
        }}</span></Title
      >
      <div class="flex flex-row gap-2 items-center"></div>
    </div>
    <div
      :style="{ backgroundImage: `url(${headerImg})` }"
      class="rounded-3xl min-h-[200px] flex flex-col justify-end p-8 bg-center bg-no-repeat bg-cover"
    ></div>

    <div
      class="-mt-16 flex flex-row justify-between items-center bg-surface-container-low p-4 rounded-3xl shadow-md"
    >
      <div class="flex flex-col gap-0">
        <Title variant="h5">Note rapide</Title>
        <small>Journalisez vos observations</small>
      </div>
      <div class="flex flex-row gap-2 items-center">
        <Button variant="ghost">
          <template #icon><IconCamera /></template
        ></Button>
        <Button variant="ghost">
          <template #icon><IconMic /></template
        ></Button>
        <Button variant="ghost">
          <template #icon><IconKeyboard /></template
        ></Button>
      </div>
    </div>
  </section>
</template>

<script lang="ts" setup>
import zitadelAuth from '@lychen/typescript-zitadel/ZitadelAuth';
import { defineAsyncComponent } from 'vue';
import headerImg from './assets/header.webp';
import IconKeyboard from '@lychen/vue-icons/IconKeyboard.vue';
import IconMic from '@lychen/vue-icons/IconMic.vue';
import IconCamera from '@lychen/vue-icons/IconCamera.vue';

const Title = defineAsyncComponent(() => import('@lychen/vue-components-website/title/Title.vue'));

const Button = defineAsyncComponent(() => import('@lychen/vue-components-core/button/Button.vue'));
</script>

<style lang="css" scoped></style>
