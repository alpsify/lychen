import { faPeopleArrows } from '@fortawesome/pro-light-svg-icons/faPeopleArrows';
import { faPeoplePulling } from '@fortawesome/pro-light-svg-icons/faPeoplePulling';
import { faPerson } from '@fortawesome/pro-light-svg-icons/faPerson';
import { faShovel } from '@fortawesome/pro-light-svg-icons/faShovel';
import { faBee } from '@fortawesome/pro-light-svg-icons/faBee';
import { faLeafyGreen } from '@fortawesome/pro-light-svg-icons/faLeafyGreen';
import { faTreeDeciduous } from '@fortawesome/pro-light-svg-icons/faTreeDeciduous';
import { faFlower } from '@fortawesome/pro-light-svg-icons/faFlower';
import { faStrawberry } from '@fortawesome/pro-light-svg-icons/faStrawberry';
import { faSeedling } from '@fortawesome/pro-light-svg-icons/faSeedling';
import { faMessagesQuestion } from '@fortawesome/pro-light-svg-icons/faMessagesQuestion';

export const LAND_INTERACTION_MODE = {
  together: faPeoplePulling,
  alone: faPerson,
  no_preference: faMessagesQuestion,
  together_but_not_all_time: faPeopleArrows,
} as const;

export type LandInteractionMode = keyof typeof LAND_INTERACTION_MODE;

export const LAND_SHARING_CONDITION = {
  general_maintenance: faShovel,
  gardening: faSeedling,
  beehives: faBee,
  vegetable_sharing: faLeafyGreen,
  fruit_sharing: faStrawberry,
  flower_planting: faFlower,
  tree_planting: faTreeDeciduous,
} as const;

export type LandSharingCondition = keyof typeof LAND_SHARING_CONDITION;
