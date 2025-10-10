<template>
  <Container class="flex flex-col items-stretch justify-center gap-4">
    <Title variant="h2">{{ t('explanation.title') }}</Title>
    <Paragraph
      class="md:w-4/6"
      variant="website-highlight"
      >{{ t('explanation.paragraph') }}
    </Paragraph>
    <Paragraph
      class="md:w-4/6"
      variant="website-highlight"
      >{{ t('explanation.paragraph_second') }}
    </Paragraph>
    <Paragraph
      class="md:w-4/6"
      variant="website-highlight"
      >{{ t('explanation.paragraph_complement') }}
    </Paragraph>

    <Paragraph
      class="md:w-4/6 text-tertiary"
      variant="website-default"
      ><IconArrowRight class="mr-2" />{{ t('explanation.flexible')
      }}<a
        href="https://a-lfred.fr"
        target="_blank"
        class="underline"
        >A·lfred</a
      >
    </Paragraph>
  </Container>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import IconArrowRight from '@lychen/vue-icons/IconArrowRight.vue';

const Paragraph = defineAsyncComponent(
  () => import('@lychen/vue-components-website/paragraph/Paragraph.vue'),
);

const Title = defineAsyncComponent(() => import('@lychen/vue-components-website/title/Title.vue'));

const Container = defineAsyncComponent(
  () => import('@lychen/vue-components-website/container/Container.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style lang="css" scoped></style>
