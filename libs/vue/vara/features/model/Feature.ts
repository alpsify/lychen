import { FEATURE_ALIAS, FEATURE_GROUP } from '@lychen/vue-vara/constants/Feature';
import { type ObjectValues } from '@lychen/typescript-utils/transformers/ObjectValues';

export type FeatureGroup = ObjectValues<typeof FEATURE_GROUP>;
export type FeatureAlias = ObjectValues<typeof FEATURE_ALIAS>;
