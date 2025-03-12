import { LandTaskStateEnum } from '@lychen/tera-util-api-sdk/generated/data-contracts';

export default {
  [LandTaskStateEnum.ToBeDone]: 'à faire',
  [LandTaskStateEnum.InProgress]: 'en cours',
  [LandTaskStateEnum.Done]: 'terminé',
};
