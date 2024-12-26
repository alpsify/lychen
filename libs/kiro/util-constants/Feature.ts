export const FEATURE_GROUP: { [key: string]: string } = {
  Citizen: 'citizen',
  Association: 'association',
  Producer: 'producer',
  Community: 'community',
} as const;

export const FEATURE_ALIAS: { [key: string]: string } = {
  FindJoinParticipate: 'find_join_participate',
  Contracts: 'contracts',
  Communication: 'communication',
  Services: 'services',
  AssociationManagement: 'association_management',
  DataVisualization: 'data_visualization',
  FoodSecurity: 'food_security',
  DistributionPlanning: 'distribution_planning',
  SpecialSales: 'special_sales',
  ClientCommunication: 'client_communication',
  DemocraticOrganization: 'democratic_organization',
} as const;

export const FEATURES_LIST = [
  { alias: FEATURE_ALIAS.FindJoinParticipate, group: FEATURE_GROUP.Citizen },
  { alias: FEATURE_ALIAS.Contracts, group: FEATURE_GROUP.Citizen },
  { alias: FEATURE_ALIAS.Communication, group: FEATURE_GROUP.Citizen },
  { alias: FEATURE_ALIAS.Services, group: FEATURE_GROUP.Citizen },
  { alias: FEATURE_ALIAS.AssociationManagement, group: FEATURE_GROUP.Association },
  { alias: FEATURE_ALIAS.DataVisualization, group: FEATURE_GROUP.Association },
  { alias: FEATURE_ALIAS.FoodSecurity, group: FEATURE_GROUP.Association },
  { alias: FEATURE_ALIAS.Contracts, group: FEATURE_GROUP.Producer },
  { alias: FEATURE_ALIAS.DistributionPlanning, group: FEATURE_GROUP.Producer },
  { alias: FEATURE_ALIAS.SpecialSales, group: FEATURE_GROUP.Producer },
  { alias: FEATURE_ALIAS.ClientCommunication, group: FEATURE_GROUP.Producer },
  { alias: FEATURE_ALIAS.DemocraticOrganization, group: FEATURE_GROUP.Community },
];
