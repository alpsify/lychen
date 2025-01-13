<template>
  <div class="flex flex-col gap-4">
    <div class="flex flex-col items-stretch justify-between gap-4 lg:flex-row">
      <div class="flex basis-1/3 flex-col gap-2">
        <LychenLogoFull class="h-14" />
        <p class="text-sm opacity-80">
          {{ t(`footer.seo_paragraph`) }}
        </p>
        <p class="text-sm opacity-60">{{ t(`footer.pronounce`) }}</p>
      </div>

      <div class="flex basis-1/4 flex-col justify-center gap-2 text-sm">
        <p class="font-medium">{{ EMAIL.Bonjour }}</p>
        <p>
          Made with ❤️ by
          <a
            class="underline"
            :href="LINK.Alpsify"
            >@alpsify</a
          >
          and
          <a
            class="underline"
            :href="LINK.HumusAndCo"
            >@humusandco</a
          >
        </p>
      </div>
    </div>

    <div class="flex flex-col-reverse items-center justify-between gap-4 lg:flex-row">
      <small class="text-xs">{{ tGlobal(`lychen.copyright`) }}</small>
      <ul class="flex flex-row gap-2 text-xs opacity-60">
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
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import {
  messages as globalMessages,
  TRANSLATION_KEY as GLOBAL_TRANSLATION_KEY,
} from '@lychen/ui-i18n/global';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { LINK } from '@lychen/util-constants/Link';
import { EMAIL } from '@lychen/util-constants/Email';

const LychenLogoFull = defineAsyncComponent(
  () => import('@lychen/ui-components/logo/LychenLogoFull.vue'),
);
const legalMenus = [
  { title: "Conditions générales d'utilisation" },
  { title: 'Protection des données' },
  { title: 'Mentions légales' },
];

const { t: tGlobal } = useI18nExtended({
  messages: globalMessages,
  rootKey: GLOBAL_TRANSLATION_KEY,
  prefixed: true,
});
const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
