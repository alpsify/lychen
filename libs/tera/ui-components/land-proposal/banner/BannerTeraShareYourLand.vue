<template>
  <div class="@container">
    <div
      class="flex flex-col @md:flex-row justify-between gap-4 p-4 rounded-3xl bg-gradient-to-tr from-surface-container-low to-surface-container text-on-surface-container-highest items-center"
    >
      <div class="flex flex-col gap-2">
        <BaseHeading variant="h3">{{ t('heading') }}</BaseHeading>
        <p class="text-balance opacity-80">{{ t('description') }}</p>
        <p v-if="landRequests && landRequests.totalItems">
          {{ t('searchCount', landRequests.totalItems) }}
        </p>
      </div>

      <Button
        class="self-end @md:self-auto"
        :label="t('share')"
        :icon="faShare"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import { faShare } from '@fortawesome/pro-light-svg-icons/faShare';
import { BaseHeading } from '@lychen/vue-ui-components-app/base-heading';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';

import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';

const { t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});

const { api } = useTeraApi();

const { data: landRequests } = useQuery({
  queryKey: ['landRequestsPublic'],
  queryFn: async () => {
    const response = await api.GET('/api/land_requests/public', {});
    return response.data;
  },
});
</script>
