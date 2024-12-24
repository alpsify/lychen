import { ApplicationFeatureAlias } from './ApplicationFeatureAlias';
import { ApplicationFeatureGroup } from './ApplicationFeatureGroup';

export interface ApplicationFeatureListItem {
  alias: ApplicationFeatureAlias;
  group: ApplicationFeatureGroup;
}

export type ApplicationFeatureList = ApplicationFeatureListItem[];
