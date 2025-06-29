import { ViteSSG } from 'vite-ssg';

import { useI18n } from '@lychen/vue-i18n/configs/useI18n';
import { buildConfigObject } from '@lychen/vue-router-configs/DefaultConfig';
import { type Component } from 'vue';
import { type RouteRecordRaw } from 'vue-router';

export function ViteSSGScaffold(app: Component, routes: RouteRecordRaw[]) {
  return ViteSSG(
    app,
    buildConfigObject(routes),
    ({ app, router, routes, isClient, initialState }) => {
      useI18n(app);
    },
  );
}
