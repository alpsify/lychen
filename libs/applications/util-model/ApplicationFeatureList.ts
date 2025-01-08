import { type ApplicationFeatureAlias } from './ApplicationFeatureAlias';
import { type ApplicationFeatureGroup } from './ApplicationFeatureGroup';

export interface ApplicationFeatureListItem<
  A extends ApplicationFeatureAlias,
  G extends ApplicationFeatureGroup,
> {
  alias: A;
  group: G;
}

export type ApplicationFeatureList<
  A extends ApplicationFeatureAlias = ApplicationFeatureAlias,
  G extends ApplicationFeatureGroup = ApplicationFeatureGroup,
> = ApplicationFeatureListItem<A, G>[];
