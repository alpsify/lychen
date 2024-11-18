import Plausible from 'plausible-tracker';
import { PlausibleInitOptions } from 'plausible-tracker/build/main/lib/tracker';
import type { App, Plugin } from 'vue';

export const plausiblePlugin: Plugin = {
  install: (app: App, options: PlausibleInitOptions) => {
    const { enableAutoPageviews } = Plausible(options);
    enableAutoPageviews();
    app.provide('plausible', null);
  },
};
