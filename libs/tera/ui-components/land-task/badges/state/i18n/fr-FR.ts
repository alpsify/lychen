import { LandTaskState } from '@lychen/tera-util-api-sdk/generated/tera-api';

export default {
  [LandTaskState.to_be_done]: 'à faire',
  [LandTaskState.in_progress]: 'en cours',
  [LandTaskState.done]: 'terminé',
};
