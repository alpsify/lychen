import {
  LAND_SHARING_CONDITION,
  type LandSharingCondition,
} from '@lychen/typescript-tera-core/constants/LandSharingCondition';

export const LAND_SHARING_CONDITION_ICON: { [key in LandSharingCondition]: string } = {
  [LAND_SHARING_CONDITION.GeneralMaintenance]: '',
  [LAND_SHARING_CONDITION.Gardening]: '',
  [LAND_SHARING_CONDITION.Beehives]: '',
  [LAND_SHARING_CONDITION.VegetableSharing]: '',
  [LAND_SHARING_CONDITION.FruitSharing]: '',
  [LAND_SHARING_CONDITION.FlowerPlanting]: '',
  [LAND_SHARING_CONDITION.TreePlanting]: '',
} as const;
