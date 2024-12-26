export const FEATURE_GROUP: { [key: string]: string } = {
  Citizen: 'citizen',
  Farmer: 'farmer',
} as const;

export const FEATURE_ALIAS: { [key: string]: string } = {
  AncestralKnowledge: 'ancestral_knowledge',
  NaturalCyclesPlanning: 'natural_cycles_planning',
  AgriculturalOptimization: 'agricultural_optimization',
  PracticeLogging: 'practice_logging',
  ExpertConnection: 'expert_connection',
} as const;

export const FEATURES_LIST = [
  { alias: FEATURE_ALIAS.AncestralKnowledge, group: FEATURE_GROUP.Citizen },
  { alias: FEATURE_ALIAS.NaturalCyclesPlanning, group: FEATURE_GROUP.Citizen },
  { alias: FEATURE_ALIAS.AgriculturalOptimization, group: FEATURE_GROUP.Farmer },
  { alias: FEATURE_ALIAS.PracticeLogging, group: FEATURE_GROUP.Farmer },
  { alias: FEATURE_ALIAS.ExpertConnection, group: FEATURE_GROUP.Farmer },
];
