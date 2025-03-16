<template>
  <SectionSetting title="Vue d'ensemble"> </SectionSetting>
  <SectionSetting
    title="Zone de danger"
    description=""
  >
    <div class="flex flex-col md:flex-row gap-2 justify-between">
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
    <div class="flex flex-col md:flex-row gap-2 justify-between">
      <div>
        <BaseHeading variant="h3">Supprimer cet espace de culture</BaseHeading>
        <p class="opacity-80">
          Once you delete a repository, there is no going back. Please be certain.
        </p>
      </div>
      <Dialog>
        <DialogTrigger>
          <Button
            variant="container-high"
            class="border-1 border-negative text-negative"
            >Supprimer</Button
          >
        </DialogTrigger>
        <DialogContent
          class="bg-surface-container-high/70 backdrop-blur-xl text-on-surface-container md:max-w-[50%] w-full max-h-dvh overflow-y-auto gap-8"
        >
          <DialogHeader>
            êtes-vous sur de vouloir surpprimer cet espace de culture et les données associés ?
          </DialogHeader>
          <DialogFooter class="flex justify-end flex-row gap-4">
            <DialogClose>
              <Button variant="container-high">Annuler</Button>
            </DialogClose>
            <Button
              variant="positive"
              :disabled="isPending"
              :loading="isPending"
              @click="deleteLand()"
              >Confirmer la suppression</Button
            >
          </DialogFooter>
        </DialogContent>
      </Dialog>
    </div>
  </SectionSetting>
</template>

<script setup lang="ts">
import { BaseHeading } from '@lychen/vue-ui-components-app/base-heading';
import { SectionSetting } from '@lychen/vue-ui-components-app/section-setting';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useMutation } from '@tanstack/vue-query';
import { toast } from '@lychen/vue-ui-components-core/toast/use-toast';
import { useRouter } from 'vue-router';
import { useEventBus } from '@vueuse/core';
import { landDeleteSucceededEvent } from '@lychen/tera-util-events/LandEvents';
import { RoutePageLands } from '@/pages/lands';
import { inject } from 'vue';
import { INJECT_LAND_KEY } from '@/layouts/in-app';
import {
  Dialog,
  DialogClose,
  DialogContent,
  DialogHeader,
  DialogTrigger,
} from '@lychen/vue-ui-components-core/dialog';

const router = useRouter();
const { emit } = useEventBus(landDeleteSucceededEvent);

const land = inject(INJECT_LAND_KEY);

const landApi = useTeraApi('Land');

const { mutate: deleteLand, isPending } = useMutation({
  mutationFn: () => landApi.landDelete(land!.value!.ulid!),
  onSuccess: (data, variables, context) => {
    toast({
      title: 'Espace de culture supprimé',
      variant: 'positive',
    });
    emit(land?.value);
    router.push({ name: RoutePageLands.name });
  },
  onError: (error, variables, context) => {},
  onSettled: (data, error, variables, context) => {},
});
</script>
