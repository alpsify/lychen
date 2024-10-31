<template>
  <div class="flex flex-col gap-4">
    <div class="flex flex-col lg:flex-row justify-between gap-4 items-stretch">
      <div class="flex flex-col gap-2 basis-1/3">
        <LychenLogo />
        <p class="text-sm opacity-80">
          {{ t(`${TRANSLATION_KEY}.footer.seo_paragraph`) }}
        </p>
      </div>

      <div class="flex flex-col gap-2 basis-1/4 text-sm justify-center">
        <p class="font-medium">{{ t(`${GLOBAL_TRANSLATION_KEY}.email.contact`) }}</p>
        <p>
          Made with ❤️ by
          <a
            class="underline"
            href="https://alpsify.com"
            >@alpsify</a
          >
          and
          <a
            class="underline"
            href="https://humusandco.fr"
            >@humusandco</a
          >
        </p>
      </div>
    </div>

    <div class="flex flex-col-reverse lg:flex-row justify-between items-center gap-4">
      <small class="text-xs">{{ t(`${TRANSLATION_KEY}.footer.copyright`) }}</small>
      <ul class="flex flex-row gap-2 opacity-60 text-xs">
        <li
          v-for="(menu, _index) in legalMenus"
          :key="_index"
        >
          {{ menu.title }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { TRANSLATION_KEY as GLOBAL_TRANSLATION_KEY } from '@lychen/ui-i18n/global';
import { defineAsyncComponent } from 'vue';

import { TRANSLATION_KEY, useTranslations } from './i18n';

const LychenLogo = defineAsyncComponent(() => import('@lychen/ui-components/logo/LychenLogo.vue'));
const legalMenus = [
  { title: "Conditions générales d'utilisation" },
  { title: 'Protection des données' },
  { title: 'Mentions légales' },
];

const { t } = useTranslations();
</script>
