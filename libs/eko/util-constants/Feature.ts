export const FEATURE_GROUP: { [key: string]: string } = {
  Citizen: 'citizen',
  Methanizer: 'methanizer',
  City: 'city',
} as const;

export const FEATURE_ALIAS: { [key: string]: string } = {
  WasteEducation: 'waste_education',
  CollectionParticipation: 'collection_participation',
  ImpactTracking: 'impact_tracking',
  WasteFlowManagement: 'waste_flow_management',
  LogisticsOptimization: 'logistics_optimization',
  RegulatoryCompliance: 'regulatory_compliance',
  EnvironmentalAnalysis: 'environmental_analysis',
  CampaignManagement: 'campaign_management',
} as const;

export const FEATURES_LIST = [
  { alias: FEATURE_ALIAS.WasteEducation, group: FEATURE_GROUP.Citizen },
  { alias: FEATURE_ALIAS.CollectionParticipation, group: FEATURE_GROUP.Citizen },
  { alias: FEATURE_ALIAS.ImpactTracking, group: FEATURE_GROUP.Citizen },
  { alias: FEATURE_ALIAS.WasteFlowManagement, group: FEATURE_GROUP.Methanizer },
  { alias: FEATURE_ALIAS.LogisticsOptimization, group: FEATURE_GROUP.Methanizer },
  { alias: FEATURE_ALIAS.RegulatoryCompliance, group: FEATURE_GROUP.Methanizer },
  { alias: FEATURE_ALIAS.EnvironmentalAnalysis, group: FEATURE_GROUP.City },
  { alias: FEATURE_ALIAS.CampaignManagement, group: FEATURE_GROUP.City },
];
