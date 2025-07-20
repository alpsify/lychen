import type { ObjectValues } from '@lychen/typescript-utils/transformers/ObjectValues';

export { useLandGuard } from './useLandGuard';

export const LAND_GUARD_STRATEGY = {
  Unanimous: 'unanimous',
  Affirmative: 'affirmative',
} as const;

export type LandGuardStrategy = ObjectValues<typeof LAND_GUARD_STRATEGY>;
