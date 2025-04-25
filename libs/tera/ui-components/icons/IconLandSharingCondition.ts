import { faShovel } from '@fortawesome/pro-light-svg-icons/faShovel';
import { faBee } from '@fortawesome/pro-light-svg-icons/faBee';
import { faLeafyGreen } from '@fortawesome/pro-light-svg-icons/faLeafyGreen';
import { faTreeDeciduous } from '@fortawesome/pro-light-svg-icons/faTreeDeciduous';
import { faFlower } from '@fortawesome/pro-light-svg-icons/faFlower';
import { faStrawberry } from '@fortawesome/pro-light-svg-icons/faStrawberry';
import { faSeedling } from '@fortawesome/pro-light-svg-icons/faSeedling';
import type { IconDefinition } from '@fortawesome/fontawesome-svg-core';

import {
  LAND_SHARING_CONDITION,
  type LandSharingCondition,
} from '@lychen/tera-util-api-sdk/constants/LandSharingCondition';

export const LAND_SHARING_CONDITION_ICON: { [key in LandSharingCondition]: IconDefinition } = {
  [LAND_SHARING_CONDITION.GeneralMaintenance]: faShovel,
  [LAND_SHARING_CONDITION.Gardening]: faSeedling,
  [LAND_SHARING_CONDITION.Beehives]: faBee,
  [LAND_SHARING_CONDITION.VegetableSharing]: faLeafyGreen,
  [LAND_SHARING_CONDITION.FruitSharing]: faStrawberry,
  [LAND_SHARING_CONDITION.FlowerPlanting]: faFlower,
  [LAND_SHARING_CONDITION.TreePlanting]: faTreeDeciduous,
} as const;
