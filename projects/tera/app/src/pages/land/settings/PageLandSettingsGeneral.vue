<template>
  <SectionSetting title="Vue d'ensemble"> </SectionSetting>
  <SectionSetting
    title="Zone de danger"
    description=""
  >
    <div class="flex flex-row gap-2 justify-between">
      <div>
        <BaseHeading variant="h3">Transférer la propriété</BaseHeading>
        <p class="opacity-80">Transfer this land to another user.</p>
      </div>
      <Button
        variant="container-high"
        class="border-1 border-negative text-negative"
        >Transférer</Button
      >
    </div>
    <div class="flex flex-row gap-2 justify-between">
      <div>
        <BaseHeading variant="h3">Supprimer cet espace de culture</BaseHeading>
        <p class="opacity-80">
          Once you delete a repository, there is no going back. Please be certain.
        </p>
      </div>
      <Button
        variant="container-high"
        class="border-1 border-negative text-negative"
        >Supprimer</Button
      >
    </div>
  </SectionSetting>
</template>

<script setup lang="ts">
import { BaseHeading } from '@lychen/vue-ui-components-app/base-heading';
import { SectionSetting } from '@lychen/vue-ui-components-app/section-setting';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
</script>
