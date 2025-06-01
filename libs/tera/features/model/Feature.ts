import { FEATURE_ALIAS, FEATURE_GROUP } from '@lychen/tera-constants/Feature';
import { type ObjectValues } from '@lychen/typescript-object/Object';

export type FeatureGroup = ObjectValues<typeof FEATURE_GROUP>;
export type FeatureAlias = ObjectValues<typeof FEATURE_ALIAS>;
