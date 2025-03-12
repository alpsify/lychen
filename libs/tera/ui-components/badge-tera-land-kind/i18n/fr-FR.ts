import { LandKindEnum } from '@lychen/tera-util-api-sdk/generated/data-contracts';

export default {
  [LandKindEnum.Individual]: 'Particulier',
  [LandKindEnum.MarketGarden]: 'Maraîcher',
  [LandKindEnum.SharedGarden]: 'Partagé',
};
