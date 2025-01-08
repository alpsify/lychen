import { type ApplicationFeatureAlias } from '@lychen/applications-util-model/ApplicationFeatureAlias';
import { type ApplicationFeatureGroup } from './ApplicationFeatureGroup';

export interface ApplicationFeature {
  alias: ApplicationFeatureAlias;
  title: string;
  description: string;
  group: ApplicationFeatureGroup;
}
