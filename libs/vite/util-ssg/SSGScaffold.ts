import { ViteSSG } from 'vite-ssg';

import { loadFontAwesomeStyles } from '@lychen/ui-components/icon/AppLoader';
import { useI18n } from '@lychen/vue-i18n-util-configs/useI18n';
import { buildConfigObject } from '@lychen/vue-router-util-configs/DefaultConfig';
import { type Component } from 'vue';
import { type RouteRecordRaw } from 'vue-router';

export function ViteSSGScaffold(app: Component, routes: RouteRecordRaw[]) {
  return ViteSSG(
    app,
    buildConfigObject(routes),
    ({ app, router, routes, isClient, initialState }) => {
      loadFontAwesomeStyles(); //TODO To remove and also the dependencies
      useI18n(app);
    },
  );
}
