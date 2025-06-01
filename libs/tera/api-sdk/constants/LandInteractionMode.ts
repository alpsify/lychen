import type { ObjectValues } from '@lychen/typescript-object/Object';

export const LAND_INTERACTION_MODE = {
  Together: 'together',
  Alone: 'alone',
  NoPreference: 'no_preference',
  TogetherButNotAllTime: 'together_but_not_all_time',
} as const;

export type LandInteractionMode = ObjectValues<typeof LAND_INTERACTION_MODE>;
export const LAND_INTERACTION_MODES = Object.values(LAND_INTERACTION_MODE);
