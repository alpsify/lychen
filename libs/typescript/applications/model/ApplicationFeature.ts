import { type ApplicationFeatureAlias } from './ApplicationFeatureAlias';
import { type ApplicationFeatureGroup } from './ApplicationFeatureGroup';

export interface ApplicationFeature {
  alias: ApplicationFeatureAlias;
  title: string;
  description: string;
  group: ApplicationFeatureGroup;
}
