import { type ObjectValues } from '@lychen/typescript-utils/transformers/ObjectValues';

export const LAND_SHARING_CONDITION = {
  GeneralMaintenance: 'general_maintenance',
  Gardening: 'gardening',
  Beehives: 'beehives',
  VegetableSharing: 'vegetable_sharing',
  FruitSharing: 'fruit_sharing',
  FlowerPlanting: 'flower_planting',
  TreePlanting: 'tree_planting',
} as const;
export type LandSharingCondition = ObjectValues<typeof LAND_SHARING_CONDITION>;
export const LAND_SHARING_CONDITIONS = Object.values(LAND_SHARING_CONDITION);
