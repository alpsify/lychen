<template>
  <div
    class="component grid grid-cols-[4px_1fr] gap-6"
    :class="expanded ? 'expanded' : ''"
  >
    <div class="w-full h-4/5 rounded-full mt-[3px] badge-track">
      <div class="w-full h-2/5 bg-primary rounded-full badge"></div>
    </div>
    <div class="flex flex-col gap-2">
      <Title variant="h3">{{ title }}</Title>
      <Paragraph
        class="opacity-80"
        variant="website-default"
        >{{ description }}</Paragraph
      >
      <a
        :href="link.href"
        class="flex flex-row gap-2 text-primary items-center link"
        target="_blank"
        ><span class="underline">{{ link.title }}</span>
        <Icon :icon="faArrowUpRight" />
      </a>
    </div>
  </div>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { faArrowUpRight } from '@fortawesome/pro-light-svg-icons/faArrowUpRight';

const Paragraph = defineAsyncComponent(
  () => import('@lychen/vue-components-website/paragraph/Paragraph.vue'),
);
const Title = defineAsyncComponent(() => import('@lychen/vue-components-website/title/Title.vue'));

interface Props {
  title: string;
  description: string;
  link: {
    href: string;
    title: string;
  };
  expanded: boolean;
}

defineProps<Props>();
</script>

<style scoped>
.component {
  opacity: 0.7;
  cursor: pointer;
  transition: all 0.5s ease-in-out;

  .badge-track {
    background: var(--color-surface-container);
  }

  .badge,
  .link {
    transition: all 0.5s ease-in-out;
    display: none;
    opacity: 0;
  }

  &:hover {
    .badge-track {
      background: var(--color-surface-container-highest);
    }
  }
}

.expanded {
  opacity: 1;
  cursor: default;
  .badge,
  .link {
    display: flex;
    opacity: 1;
  }

  .badge-track {
    background: var(--color-surface-container-highest);
  }

  &:hover {
    .badge-track {
      background: var(--color-surface-container-highest);
    }
  }
}
</style>
