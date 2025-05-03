<template>
  <footer class="container p-4">
    <div class="bg-surface-container-low flex flex-col rounded-xl p-6">
      <FooterMain :legal-menus>
        <template #logo>
          <ApplicationTitle
            :value="applicationName"
            class="text-2xl"
          />
        </template>
      </FooterMain>
    </div>
  </footer>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';
import { type LayoutWebsiteApplicationFooterProps } from '.';

const ApplicationTitle = defineAsyncComponent(
  () => import('@lychen/applications-ui-components/ApplicationTitle.vue'),
);

const FooterMain = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/footer/FooterMain.vue'),
);

const legalMenus = [
  { title: "Conditions générales d'utilisation" },
  { title: 'Protection des données' },
  { title: 'Mentions légales' },
];

defineProps<LayoutWebsiteApplicationFooterProps>();
</script>
