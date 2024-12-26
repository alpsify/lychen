import { FEATURE_ALIAS, FEATURE_GROUP } from '@lychen/vara-util-constants/Feature';
import { ObjectValues } from '@lychen/typescript-util-object/Object';

export type FeatureGroup = ObjectValues<typeof FEATURE_GROUP>;
export type FeatureAlias = ObjectValues<typeof FEATURE_ALIAS>;
