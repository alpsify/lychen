import { ApplicationFeature } from './ApplicationFeature';
import { ApplicationFeatureGroup } from './ApplicationFeatureGroup';

export type OrganizedFeaturesByGroup = Record<
  ApplicationFeatureGroup,
  { title: string; features: ApplicationFeature[] }
>;
