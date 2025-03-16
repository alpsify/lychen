<template>
  <SectionSetting :title="t('tabs.general.title')"> </SectionSetting>
  <SectionSetting
    :title="t('tabs.general.danger_zone.title')"
    :description="t('tabs.general.danger_zone.description')"
  >
    <div class="flex flex-col md:flex-row gap-2 justify-between">
      <div>
        <BaseHeading variant="h3">
          {{ t('tabs.general.danger_zone.transfer.title') }}
        </BaseHeading>
        <p class="opacity-80">
          {{ t('tabs.general.danger_zone.transfer.description') }}
        </p>
      </div>
      <Button
        variant="container-high"
        class="border-1 border-negative text-negative"
      >
        {{ t('tabs.general.danger_zone.transfer.button.label') }}
      </Button>
    </div>
    <div class="flex flex-col md:flex-row gap-2 justify-between">
      <div>
        <BaseHeading variant="h3">
          {{ t('tabs.general.danger_zone.delete.title') }}
        </BaseHeading>
        <p class="opacity-80">
          {{ t('tabs.general.danger_zone.delete.description') }}
        </p>
      </div>
      <Dialog>
        <DialogTrigger>
          <Button
            variant="container-high"
            class="border-1 border-negative text-negative"
          >
            {{ t('tabs.general.danger_zone.delete.button.label') }}
          </Button>
        </DialogTrigger>
        <DialogContent
          class="bg-surface-container-high/70 backdrop-blur-xl text-on-surface-container md:max-w-[30%] w-full max-h-dvh overflow-y-auto gap-8"
        >
          <DialogHeader>
            <BaseHeading variant="h2">{{
              t('tabs.general.danger_zone.delete.dialog.title')
            }}</BaseHeading>
          </DialogHeader>
          <p>{{ t('tabs.general.danger_zone.delete.dialog.description') }}</p>
          <DialogFooter class="flex flex-row justify-end gap-8">
            <DialogClose>
              <Button variant="container-high">{{
                t('tabs.general.danger_zone.delete.dialog.button.cancel.label')
              }}</Button>
            </DialogClose>
            <Button
              variant="positive"
              :disabled="isPending"
              :loading="isPending"
              @click="deleteLand()"
            >
              {{ t('tabs.general.danger_zone.delete.dialog.button.confirm.label') }}
            </Button>
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
  DialogFooter,
} from '@lychen/vue-ui-components-core/dialog';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';

const { t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});

const router = useRouter();
const { emit } = useEventBus(landDeleteSucceededEvent);

const land = inject(INJECT_LAND_KEY);

const landApi = useTeraApi('Land');

const { mutate: deleteLand, isPending } = useMutation({
  mutationFn: () => landApi.landDelete(land!.value!.ulid!),
  onSuccess: (data, variables, context) => {
    toast({
      title: t('tabs.general.danger_zone.delete.toast.success.message'),
      variant: 'positive',
    });
    emit(land?.value);
    router.push({ name: RoutePageLands.name });
  },
  onError: (error, variables, context) => {},
  onSettled: (data, error, variables, context) => {},
});
</script>
