import {
  LAND_INTERACTION_MODE,
  type LandInteractionMode,
} from '@lychen/typescript-tera-core/constants/LandInteractionMode';

export const LAND_INTERACTION_MODE_ICON: {
  [key in LandInteractionMode]: string;
} = {
  [LAND_INTERACTION_MODE.Together]: '',
  [LAND_INTERACTION_MODE.Alone]: '',
  [LAND_INTERACTION_MODE.NoPreference]: '',
  [LAND_INTERACTION_MODE.TogetherButNotAllTime]: '',
} as const;
