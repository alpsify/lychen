import type { LocaleMessage } from '@intlify/core-base';
import type { VueMessageType } from 'vue-i18n';

export function addRootKey(
  obj: { [x: string]: LocaleMessage<VueMessageType> },
  rootKey: string,
): { [x: string]: LocaleMessage<VueMessageType> } {
  const transformed: { [x: string]: LocaleMessage<VueMessageType> } = {};

  for (const key of Object.keys(obj)) {
    transformed[key] = { [rootKey]: obj[key] };
  }

  return transformed;
}
