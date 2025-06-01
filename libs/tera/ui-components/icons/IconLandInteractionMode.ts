import { faPeopleArrows } from '@fortawesome/pro-light-svg-icons/faPeopleArrows';
import { faPeoplePulling } from '@fortawesome/pro-light-svg-icons/faPeoplePulling';
import { faPerson } from '@fortawesome/pro-light-svg-icons/faPerson';
import { faMessagesQuestion } from '@fortawesome/pro-light-svg-icons/faMessagesQuestion';
import type { IconDefinition } from '@fortawesome/fontawesome-svg-core';
import {
  LAND_INTERACTION_MODE,
  type LandInteractionMode,
} from '@lychen/tera-api-sdk/constants/LandInteractionMode';

export const LAND_INTERACTION_MODE_ICON: {
  [key in LandInteractionMode]: IconDefinition;
} = {
  [LAND_INTERACTION_MODE.Together]: faPeoplePulling,
  [LAND_INTERACTION_MODE.Alone]: faPerson,
  [LAND_INTERACTION_MODE.NoPreference]: faMessagesQuestion,
  [LAND_INTERACTION_MODE.TogetherButNotAllTime]: faPeopleArrows,
} as const;
