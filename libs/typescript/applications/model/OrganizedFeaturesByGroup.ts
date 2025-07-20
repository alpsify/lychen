import { type ApplicationFeature } from './ApplicationFeature';
import { type ApplicationFeatureGroup } from './ApplicationFeatureGroup';

export type OrganizedFeaturesByGroup = Record<
  ApplicationFeatureGroup,
  { title: string; features: ApplicationFeature[] }
>;
