import { type ObjectValues } from '@lychen/typescript-util-object/Object';

export const LYCHEN_ICON_FASHION = {
  Light: 'fal',
  DuotoneLight: 'fadl',
  Brands: 'fab',
};

export const LYCHEN_ICON_FASHION_DEFAULT: LychenIconFashion = LYCHEN_ICON_FASHION.DuotoneLight;

export type LychenIconFashion = ObjectValues<typeof LYCHEN_ICON_FASHION>;
