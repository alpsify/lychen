import { ApplicationFeatureGroup } from './ApplicationFeatureGroup';

export interface ApplicationFeature {
  alias: string;
  title: string;
  description: string;
  group: ApplicationFeatureGroup;
}
