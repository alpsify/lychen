<template>
  <LychenContainer class="flex flex-col items-stretch justify-center gap-4">
    <LychenTitle variant="h1">{{ t('explanation.title') }}</LychenTitle>
    <LychenParagraph
      class="md:w-4/6"
      variant="website-highlight"
      >{{ t('explanation.paragraph') }}
    </LychenParagraph>
    <LychenParagraph
      class="md:w-4/6"
      variant="website-highlight"
      >{{ t('explanation.paragraph_second') }}
    </LychenParagraph>
    <LychenParagraph
      class="md:w-4/6"
      variant="website-highlight"
      >{{ t('explanation.paragraph_complement') }}
    </LychenParagraph>

    <LychenParagraph
      class="md:w-4/6 text-tertiary"
      variant="website-default"
      ><LychenIcon
        icon="arrow-right"
        class="mr-2"
      />{{ t('explanation.flexible')
      }}<a
        href="https://a-lfred.fr"
        target="_blank"
        class="underline"
        >A·lfred</a
      >
    </LychenParagraph>
  </LychenContainer>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style lang="css" scoped></style>
