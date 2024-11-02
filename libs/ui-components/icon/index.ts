import { ObjectValues } from 'lib/utils';

export { default as LychenIcon } from './LychenIcon.vue';

export const LYCHEN_ICON_FASHION = {
  Default: 'fal',
  Brands: 'fa-brands',
};

export type LychenIconFashion = ObjectValues<typeof LYCHEN_ICON_FASHION>;
