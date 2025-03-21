/* eslint-disable */
/* tslint:disable */
/*
 * ---------------------------------------------------------------
 * ## THIS FILE WAS GENERATED VIA SWAGGER-TYPESCRIPT-API        ##
 * ##                                                           ##
 * ## AUTHOR: acacode                                           ##
 * ## SOURCE: https://github.com/acacode/swagger-typescript-api ##
 * ---------------------------------------------------------------
 */

export interface LandArea {
  /** @format date-time */
  createdAt?: string;
  description?: string | null;
  id?: number;
  /**
   * @default "open_soil"
   * @example "open_soil"
   */
  kind?: LandAreaKindEnum;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landAreaParameter?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landAreaSetting?: string | null;
  landCultivationPlans?: string[];
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landGreenhouse?: string | null;
  landTasks?: string[];
  name: string;
  /**
   * @default "active"
   * @example "active"
   */
  state: LandAreaStateEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export interface LandAreaGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /** Filter by land */
  land: string;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface LandAreaJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandAreaJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  createdAt?: string;
  description?: string | null;
  id?: number;
  /**
   * @default "open_soil"
   * @example "open_soil"
   */
  kind?: LandAreaJsonldKindEnum;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landAreaParameter?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landAreaSetting?: string | null;
  landCultivationPlans?: string[];
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landGreenhouse?: string | null;
  landTasks?: string[];
  name: string;
  /**
   * @default "active"
   * @example "active"
   */
  state: LandAreaJsonldStateEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export enum LandAreaJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/**
 * @default "open_soil"
 * @example "open_soil"
 */
export enum LandAreaJsonldKindEnum {
  OpenSoil = 'open_soil',
  SoilLess = 'soil_less',
}

/**
 * @default "active"
 * @example "active"
 */
export enum LandAreaJsonldStateEnum {
  Active = 'active',
  Archived = 'archived',
}

/**
 * @default "open_soil"
 * @example "open_soil"
 */
export enum LandAreaKindEnum {
  OpenSoil = 'open_soil',
  SoilLess = 'soil_less',
}

export interface LandAreaParameter {
  aboveGround?: boolean;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landArea?: string;
  length?: number | null;
  /** @format ulid */
  ulid?: string;
  width?: number | null;
}

export interface LandAreaParameterJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandAreaParameterJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  aboveGround?: boolean;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landArea?: string;
  length?: number | null;
  /** @format ulid */
  ulid?: string;
  width?: number | null;
}

export enum LandAreaParameterJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandAreaPostPayload {
  description?: string;
  land: string;
  name: string;
}

export interface LandAreaSetting {
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landArea?: string;
  rotationActivated?: boolean;
  /** @format ulid */
  ulid?: string;
}

export interface LandAreaSettingJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandAreaSettingJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landArea?: string;
  rotationActivated?: boolean;
  /** @format ulid */
  ulid?: string;
}

export enum LandAreaSettingJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/**
 * @default "active"
 * @example "active"
 */
export enum LandAreaStateEnum {
  Active = 'active',
  Archived = 'archived',
}

export interface LandCultivationPlan {
  /** @format date-time */
  createdAt?: string;
  /** @format date-time */
  endDate?: string | null;
  /** @format date-time */
  expectedHarvestingDate?: string | null;
  /** @format date-time */
  expectedPlantingDate?: string | null;
  /** @format date-time */
  expectedSowingDate?: string | null;
  /** @format date-time */
  forecastedEndDate?: string | null;
  /** @format date-time */
  harvestingDate?: string | null;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landArea?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  plant?: string;
  /** @format date-time */
  plantingDate?: string | null;
  /** @format date-time */
  sowingDate?: string | null;
  /** @format date-time */
  startDate?: string | null;
  /**
   * @default "draft"
   * @example "draft"
   */
  state?: string;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export interface LandCultivationPlanGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /** Filter by land */
  land: string;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface LandCultivationPlanJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandCultivationPlanJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  createdAt?: string;
  /** @format date-time */
  endDate?: string | null;
  /** @format date-time */
  expectedHarvestingDate?: string | null;
  /** @format date-time */
  expectedPlantingDate?: string | null;
  /** @format date-time */
  expectedSowingDate?: string | null;
  /** @format date-time */
  forecastedEndDate?: string | null;
  /** @format date-time */
  harvestingDate?: string | null;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landArea?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  plant?: string;
  /** @format date-time */
  plantingDate?: string | null;
  /** @format date-time */
  sowingDate?: string | null;
  /** @format date-time */
  startDate?: string | null;
  /**
   * @default "draft"
   * @example "draft"
   */
  state?: string;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export enum LandCultivationPlanJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandGetCollectionLookingForMembersParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface LandGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface LandGreenhouse {
  /** @format date-time */
  constructionDate?: string | null;
  /** @format date-time */
  createdAt?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  landAreas?: string[];
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landGreenhouseParameter?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landGreenhouseSetting?: string | null;
  name: string;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export interface LandGreenhouseGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /** Filter by land */
  land: string;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface LandGreenhouseJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandGreenhouseJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  constructionDate?: string | null;
  /** @format date-time */
  createdAt?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  landAreas?: string[];
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landGreenhouseParameter?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landGreenhouseSetting?: string | null;
  name: string;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export enum LandGreenhouseJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandGreenhouseParameter {
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landGreenhouse?: string;
  /** @format ulid */
  ulid?: string;
}

export interface LandGreenhouseParameterJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandGreenhouseParameterJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landGreenhouse?: string;
  /** @format ulid */
  ulid?: string;
}

export enum LandGreenhouseParameterJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandGreenhouseSetting {
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landGreenhouse?: string;
  /** @format ulid */
  ulid?: string;
}

export interface LandGreenhouseSettingJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandGreenhouseSettingJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landGreenhouse?: string;
  /** @format ulid */
  ulid?: string;
}

export enum LandGreenhouseSettingJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /**
   * @default 1
   * @example 1
   */
  altitude?: number | null;
  /** @format date-time */
  createdAt?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  defaultRole?: string | null;
  id?: number;
  land?: StaticJsonld;
  landAreas?: string[];
  landCultivationPlans?: string[];
  landGreenhouses?: string[];
  landMemberInvitations?: string[];
  landMembers?: string[];
  landRoles?: string[];
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landSetting?: string | null;
  landTasks?: string[];
  name?: string;
  /** Used by fixtures to create custom land with owner */
  owner?: PersonJsonld | null;
  /** @min 0 */
  surface?: number | null;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export enum LandJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandJsonldUserLandCollection {
  '@id'?: string;
  '@type'?: string;
  /**
   * @default 1
   * @example 1
   */
  altitude?: number | null;
  landAreas?: string[];
  landMembers?: string[];
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landSetting?: string | null;
  name?: string;
  /** @min 0 */
  surface?: number | null;
  /** @format ulid */
  ulid?: string;
}

export interface LandJsonldUserLandGet {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandJsonldUserLandGetHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /**
   * @default 1
   * @example 1
   */
  altitude?: number | null;
  /** @format date-time */
  createdAt?: string;
  landAreas?: string[];
  landMembers?: string[];
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landSetting?: string | null;
  name?: string;
  /** @min 0 */
  surface?: number | null;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export interface LandJsonldUserLandGetCollectionLookingForMembers {
  '@id'?: string;
  '@type'?: string;
  /**
   * @default 1
   * @example 1
   */
  altitude?: number | null;
  name?: string;
  /** @min 0 */
  surface?: number | null;
  /** @format ulid */
  ulid?: string;
}

export enum LandJsonldUserLandGetHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandJsonldUserLandPost {
  /**
   * @default 1
   * @example 1
   */
  altitude?: number | null;
  landAreas?: string[];
  name?: string;
  /** @min 0 */
  surface?: number | null;
  /** @format ulid */
  ulid?: string;
}

export interface LandMember {
  id?: number;
  /** @format date-time */
  joinedAt?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landMemberSetting?: string | null;
  landRoles?: string[];
  owner?: boolean;
  person?: Person;
  /** @format ulid */
  ulid?: string;
}

export interface LandMemberGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /** Filter by land */
  land: string;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface LandMemberInvitation {
  /** @format date-time */
  acceptedAt?: string | null;
  /** @format date-time */
  createdAt?: string;
  /** @format email */
  email?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  landRoles?: string[];
  person?: Person | null;
  /** @format date-time */
  refusedAt?: string | null;
  /**
   * @default "pending"
   * @example "pending"
   */
  state?: LandMemberInvitationStateEnum;
  /** @format ulid */
  ulid?: string;
}

export interface LandMemberInvitationCheckEmailUnicityParams {
  /** The email to check */
  email: string;
  /** The land IRI to check against */
  land: string;
}

export interface LandMemberInvitationGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /** Filter by land */
  land: string;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface LandMemberInvitationJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandMemberInvitationJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  acceptedAt?: string | null;
  /** @format date-time */
  createdAt?: string;
  /** @format email */
  email?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  landRoles?: string[];
  person?: PersonJsonld | null;
  /** @format date-time */
  refusedAt?: string | null;
  /**
   * @default "pending"
   * @example "pending"
   */
  state?: LandMemberInvitationJsonldStateEnum;
  /** @format ulid */
  ulid?: string;
}

export enum LandMemberInvitationJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/**
 * @default "pending"
 * @example "pending"
 */
export enum LandMemberInvitationJsonldStateEnum {
  Pending = 'pending',
  Accepted = 'accepted',
  Refused = 'refused',
}

export interface LandMemberInvitationJsonldUserLandMemberInvitationCollection {
  '@id'?: string;
  '@type'?: string;
  /** @format email */
  email?: string;
  landRoles?: LandRoleJsonldUserLandMemberInvitationCollection[];
  person?: PersonJsonldUserLandMemberInvitationCollection | null;
  /**
   * @default "pending"
   * @example "pending"
   */
  state?: LandMemberInvitationJsonldUserLandMemberInvitationCollectionStateEnum;
  /** @format ulid */
  ulid?: string;
}

/**
 * @default "pending"
 * @example "pending"
 */
export enum LandMemberInvitationJsonldUserLandMemberInvitationCollectionStateEnum {
  Pending = 'pending',
  Accepted = 'accepted',
  Refused = 'refused',
}

export interface LandMemberInvitationJsonldUserLandMemberInvitationGet {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandMemberInvitationJsonldUserLandMemberInvitationGetHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  createdAt?: string;
  /** @format email */
  email?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  landRoles?: string[];
  person?: PersonJsonldUserLandMemberInvitationGet | null;
  /**
   * @default "pending"
   * @example "pending"
   */
  state?: LandMemberInvitationJsonldUserLandMemberInvitationGetStateEnum;
  /** @format ulid */
  ulid?: string;
}

export enum LandMemberInvitationJsonldUserLandMemberInvitationGetHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/**
 * @default "pending"
 * @example "pending"
 */
export enum LandMemberInvitationJsonldUserLandMemberInvitationGetStateEnum {
  Pending = 'pending',
  Accepted = 'accepted',
  Refused = 'refused',
}

export interface LandMemberInvitationJsonldUserLandMemberInvitationPost {
  /** @format email */
  email?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  landRoles?: string[];
  /** @format ulid */
  ulid?: string;
}

export interface LandMemberInvitationLandMemberInvitationCheckEmailUnicityDtoJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandMemberInvitationLandMemberInvitationCheckEmailUnicityDtoJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  isUnique?: boolean;
}

export enum LandMemberInvitationLandMemberInvitationCheckEmailUnicityDtoJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/**
 * @default "pending"
 * @example "pending"
 */
export enum LandMemberInvitationStateEnum {
  Pending = 'pending',
  Accepted = 'accepted',
  Refused = 'refused',
}

export type LandMemberInvitationUserLandMemberInvitationAccept = object;

export interface LandMemberInvitationUserLandMemberInvitationPatch {
  /** @format date-time */
  createdAt?: string;
  /** @format email */
  email?: string;
  landRoles?: string[];
  /** @format ulid */
  ulid?: string;
}

export type LandMemberInvitationUserLandMemberInvitationRefuse = object;

export interface LandMemberJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandMemberJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  id?: number;
  /** @format date-time */
  joinedAt?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landMemberSetting?: string | null;
  landRoles?: string[];
  owner?: boolean;
  person?: PersonJsonld;
  /** @format ulid */
  ulid?: string;
}

export enum LandMemberJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandMemberJsonldUserLandMemberCollection {
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  joinedAt?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landMemberSetting?: string | null;
  landRoles?: LandRoleJsonldUserLandMemberCollection[];
  owner?: boolean;
  person?: PersonJsonldUserLandMemberCollection;
  /** @format ulid */
  ulid?: string;
}

export interface LandMemberJsonldUserLandMemberGet {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandMemberJsonldUserLandMemberGetHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  joinedAt?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landMemberSetting?: string | null;
  landRoles?: string[];
  owner?: boolean;
  person?: PersonJsonldUserLandMemberGet;
  /** @format ulid */
  ulid?: string;
}

export enum LandMemberJsonldUserLandMemberGetHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandMemberSetting {
  emailNotificationActivated?: boolean;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landMember?: string;
  /** @format ulid */
  ulid?: string;
}

export interface LandMemberSettingJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandMemberSettingJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  emailNotificationActivated?: boolean;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landMember?: string;
  /** @format ulid */
  ulid?: string;
}

export enum LandMemberSettingJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandMemberUserLandMemberPatch {
  landRoles?: string[];
  /** @format ulid */
  ulid?: string;
}

export interface LandResearchDeal {
  /** @format date-time */
  createdAt?: string;
  id?: number;
  /**
   * @default "opened"
   * @example "opened"
   */
  state?: LandResearchDealStateEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export interface LandResearchDealGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface LandResearchDealJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandResearchDealJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  createdAt?: string;
  id?: number;
  /**
   * @default "opened"
   * @example "opened"
   */
  state?: LandResearchDealJsonldStateEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export enum LandResearchDealJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/**
 * @default "opened"
 * @example "opened"
 */
export enum LandResearchDealJsonldStateEnum {
  Opened = 'opened',
  Archived = 'archived',
  Accepted = 'accepted',
  Refused = 'refused',
}

/**
 * @default "opened"
 * @example "opened"
 */
export enum LandResearchDealStateEnum {
  Opened = 'opened',
  Archived = 'archived',
  Accepted = 'accepted',
  Refused = 'refused',
}

export interface LandResearchRequest {
  /** @format date-time */
  createdAt?: string;
  id?: number;
  message?: any[] | null;
  person?: Person;
  /**
   * @default "draft"
   * @example "draft"
   */
  state?: LandResearchRequestStateEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export interface LandResearchRequestGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface LandResearchRequestJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandResearchRequestJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  createdAt?: string;
  id?: number;
  message?: any[] | null;
  person?: PersonJsonld;
  /**
   * @default "draft"
   * @example "draft"
   */
  state?: LandResearchRequestJsonldStateEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export enum LandResearchRequestJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/**
 * @default "draft"
 * @example "draft"
 */
export enum LandResearchRequestJsonldStateEnum {
  Draft = 'draft',
  Published = 'published',
  Archived = 'archived',
}

/**
 * @default "draft"
 * @example "draft"
 */
export enum LandResearchRequestStateEnum {
  Draft = 'draft',
  Published = 'published',
  Archived = 'archived',
}

export interface LandRoleGetCollectionParams {
  /** @default "asc" */
  'order[position]'?: OrderPositionEnum;
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /** Filter by land */
  land: string;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

/** @default "asc" */
export enum LandRoleGetCollectionParams1OrderPositionEnum {
  Asc = 'asc',
  Desc = 'desc',
}

export interface LandRoleJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandRoleJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  createdAt?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  landMembers?: string[];
  name: string;
  /** @example ["land_read","land_update","land_delete","land_transfer","landgreenhouse_read","landgreenhouse_create","landgreenhouse_update","landgreenhouse_delete","landgreenhouseparameter_read","landgreenhouseparameter_update","landgreenhousesetting_read","landgreenhousesetting_update","landarea_read","landarea_create","landarea_update","landarea_delete","landareaparameter_read","landareaparameter_update","landareasetting_read","landareasetting_update","landmember_read","landmember_update","landmember_delete","landtask_read","landtask_create","landtask_update","landtask_delete","landtask_mark_as_done","landtask_mark_as_in_progress","landcultivationplan_read","landcultivationplan_create","landcultivationplan_update","landcultivationplan_delete","landrole_read","landrole_create","landrole_update","landrole_delete","landmemberinvitation_read","landmemberinvitation_create","landmemberinvitation_update","landmemberinvitation_delete","landsetting_read","landsetting_update"] */
  permissions?: LandRoleJsonldPermissionsEnum;
  position?: number;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export enum LandRoleJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/** @example ["land_read","land_update","land_delete","land_transfer","landgreenhouse_read","landgreenhouse_create","landgreenhouse_update","landgreenhouse_delete","landgreenhouseparameter_read","landgreenhouseparameter_update","landgreenhousesetting_read","landgreenhousesetting_update","landarea_read","landarea_create","landarea_update","landarea_delete","landareaparameter_read","landareaparameter_update","landareasetting_read","landareasetting_update","landmember_read","landmember_update","landmember_delete","landtask_read","landtask_create","landtask_update","landtask_delete","landtask_mark_as_done","landtask_mark_as_in_progress","landcultivationplan_read","landcultivationplan_create","landcultivationplan_update","landcultivationplan_delete","landrole_read","landrole_create","landrole_update","landrole_delete","landmemberinvitation_read","landmemberinvitation_create","landmemberinvitation_update","landmemberinvitation_delete","landsetting_read","landsetting_update"] */
export enum LandRoleJsonldPermissionsEnum {
  LandRead = 'land_read',
  LandUpdate = 'land_update',
  LandDelete = 'land_delete',
  LandTransfer = 'land_transfer',
  LandgreenhouseRead = 'landgreenhouse_read',
  LandgreenhouseCreate = 'landgreenhouse_create',
  LandgreenhouseUpdate = 'landgreenhouse_update',
  LandgreenhouseDelete = 'landgreenhouse_delete',
  LandgreenhouseparameterRead = 'landgreenhouseparameter_read',
  LandgreenhouseparameterUpdate = 'landgreenhouseparameter_update',
  LandgreenhousesettingRead = 'landgreenhousesetting_read',
  LandgreenhousesettingUpdate = 'landgreenhousesetting_update',
  LandareaRead = 'landarea_read',
  LandareaCreate = 'landarea_create',
  LandareaUpdate = 'landarea_update',
  LandareaDelete = 'landarea_delete',
  LandareaparameterRead = 'landareaparameter_read',
  LandareaparameterUpdate = 'landareaparameter_update',
  LandareasettingRead = 'landareasetting_read',
  LandareasettingUpdate = 'landareasetting_update',
  LandmemberRead = 'landmember_read',
  LandmemberUpdate = 'landmember_update',
  LandmemberDelete = 'landmember_delete',
  LandtaskRead = 'landtask_read',
  LandtaskCreate = 'landtask_create',
  LandtaskUpdate = 'landtask_update',
  LandtaskDelete = 'landtask_delete',
  LandtaskMarkAsDone = 'landtask_mark_as_done',
  LandtaskMarkAsInProgress = 'landtask_mark_as_in_progress',
  LandcultivationplanRead = 'landcultivationplan_read',
  LandcultivationplanCreate = 'landcultivationplan_create',
  LandcultivationplanUpdate = 'landcultivationplan_update',
  LandcultivationplanDelete = 'landcultivationplan_delete',
  LandroleRead = 'landrole_read',
  LandroleCreate = 'landrole_create',
  LandroleUpdate = 'landrole_update',
  LandroleDelete = 'landrole_delete',
  LandmemberinvitationRead = 'landmemberinvitation_read',
  LandmemberinvitationCreate = 'landmemberinvitation_create',
  LandmemberinvitationUpdate = 'landmemberinvitation_update',
  LandmemberinvitationDelete = 'landmemberinvitation_delete',
  LandsettingRead = 'landsetting_read',
  LandsettingUpdate = 'landsetting_update',
}

export interface LandRoleJsonldUserLandMemberCollection {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandRoleJsonldUserLandMemberCollectionHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  name: string;
}

export enum LandRoleJsonldUserLandMemberCollectionHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandRoleJsonldUserLandMemberInvitationCollection {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandRoleJsonldUserLandMemberInvitationCollectionHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  name: string;
}

export enum LandRoleJsonldUserLandMemberInvitationCollectionHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandRoleJsonldUserLandRoleCollection {
  '@id'?: string;
  '@type'?: string;
  landMembers?: string[];
  name: string;
  /** @example ["land_read","land_update","land_delete","land_transfer","landgreenhouse_read","landgreenhouse_create","landgreenhouse_update","landgreenhouse_delete","landgreenhouseparameter_read","landgreenhouseparameter_update","landgreenhousesetting_read","landgreenhousesetting_update","landarea_read","landarea_create","landarea_update","landarea_delete","landareaparameter_read","landareaparameter_update","landareasetting_read","landareasetting_update","landmember_read","landmember_update","landmember_delete","landtask_read","landtask_create","landtask_update","landtask_delete","landtask_mark_as_done","landtask_mark_as_in_progress","landcultivationplan_read","landcultivationplan_create","landcultivationplan_update","landcultivationplan_delete","landrole_read","landrole_create","landrole_update","landrole_delete","landmemberinvitation_read","landmemberinvitation_create","landmemberinvitation_update","landmemberinvitation_delete","landsetting_read","landsetting_update"] */
  permissions?: LandRoleJsonldUserLandRoleCollectionPermissionsEnum;
  position?: number;
  /** @format ulid */
  ulid?: string;
}

/** @example ["land_read","land_update","land_delete","land_transfer","landgreenhouse_read","landgreenhouse_create","landgreenhouse_update","landgreenhouse_delete","landgreenhouseparameter_read","landgreenhouseparameter_update","landgreenhousesetting_read","landgreenhousesetting_update","landarea_read","landarea_create","landarea_update","landarea_delete","landareaparameter_read","landareaparameter_update","landareasetting_read","landareasetting_update","landmember_read","landmember_update","landmember_delete","landtask_read","landtask_create","landtask_update","landtask_delete","landtask_mark_as_done","landtask_mark_as_in_progress","landcultivationplan_read","landcultivationplan_create","landcultivationplan_update","landcultivationplan_delete","landrole_read","landrole_create","landrole_update","landrole_delete","landmemberinvitation_read","landmemberinvitation_create","landmemberinvitation_update","landmemberinvitation_delete","landsetting_read","landsetting_update"] */
export enum LandRoleJsonldUserLandRoleCollectionPermissionsEnum {
  LandRead = 'land_read',
  LandUpdate = 'land_update',
  LandDelete = 'land_delete',
  LandTransfer = 'land_transfer',
  LandgreenhouseRead = 'landgreenhouse_read',
  LandgreenhouseCreate = 'landgreenhouse_create',
  LandgreenhouseUpdate = 'landgreenhouse_update',
  LandgreenhouseDelete = 'landgreenhouse_delete',
  LandgreenhouseparameterRead = 'landgreenhouseparameter_read',
  LandgreenhouseparameterUpdate = 'landgreenhouseparameter_update',
  LandgreenhousesettingRead = 'landgreenhousesetting_read',
  LandgreenhousesettingUpdate = 'landgreenhousesetting_update',
  LandareaRead = 'landarea_read',
  LandareaCreate = 'landarea_create',
  LandareaUpdate = 'landarea_update',
  LandareaDelete = 'landarea_delete',
  LandareaparameterRead = 'landareaparameter_read',
  LandareaparameterUpdate = 'landareaparameter_update',
  LandareasettingRead = 'landareasetting_read',
  LandareasettingUpdate = 'landareasetting_update',
  LandmemberRead = 'landmember_read',
  LandmemberUpdate = 'landmember_update',
  LandmemberDelete = 'landmember_delete',
  LandtaskRead = 'landtask_read',
  LandtaskCreate = 'landtask_create',
  LandtaskUpdate = 'landtask_update',
  LandtaskDelete = 'landtask_delete',
  LandtaskMarkAsDone = 'landtask_mark_as_done',
  LandtaskMarkAsInProgress = 'landtask_mark_as_in_progress',
  LandcultivationplanRead = 'landcultivationplan_read',
  LandcultivationplanCreate = 'landcultivationplan_create',
  LandcultivationplanUpdate = 'landcultivationplan_update',
  LandcultivationplanDelete = 'landcultivationplan_delete',
  LandroleRead = 'landrole_read',
  LandroleCreate = 'landrole_create',
  LandroleUpdate = 'landrole_update',
  LandroleDelete = 'landrole_delete',
  LandmemberinvitationRead = 'landmemberinvitation_read',
  LandmemberinvitationCreate = 'landmemberinvitation_create',
  LandmemberinvitationUpdate = 'landmemberinvitation_update',
  LandmemberinvitationDelete = 'landmemberinvitation_delete',
  LandsettingRead = 'landsetting_read',
  LandsettingUpdate = 'landsetting_update',
}

export interface LandRoleJsonldUserLandRoleGet {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandRoleJsonldUserLandRoleGetHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  createdAt?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  landMembers?: string[];
  name: string;
  /** @example ["land_read","land_update","land_delete","land_transfer","landgreenhouse_read","landgreenhouse_create","landgreenhouse_update","landgreenhouse_delete","landgreenhouseparameter_read","landgreenhouseparameter_update","landgreenhousesetting_read","landgreenhousesetting_update","landarea_read","landarea_create","landarea_update","landarea_delete","landareaparameter_read","landareaparameter_update","landareasetting_read","landareasetting_update","landmember_read","landmember_update","landmember_delete","landtask_read","landtask_create","landtask_update","landtask_delete","landtask_mark_as_done","landtask_mark_as_in_progress","landcultivationplan_read","landcultivationplan_create","landcultivationplan_update","landcultivationplan_delete","landrole_read","landrole_create","landrole_update","landrole_delete","landmemberinvitation_read","landmemberinvitation_create","landmemberinvitation_update","landmemberinvitation_delete","landsetting_read","landsetting_update"] */
  permissions?: LandRoleJsonldUserLandRoleGetPermissionsEnum;
  position?: number;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export enum LandRoleJsonldUserLandRoleGetHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/** @example ["land_read","land_update","land_delete","land_transfer","landgreenhouse_read","landgreenhouse_create","landgreenhouse_update","landgreenhouse_delete","landgreenhouseparameter_read","landgreenhouseparameter_update","landgreenhousesetting_read","landgreenhousesetting_update","landarea_read","landarea_create","landarea_update","landarea_delete","landareaparameter_read","landareaparameter_update","landareasetting_read","landareasetting_update","landmember_read","landmember_update","landmember_delete","landtask_read","landtask_create","landtask_update","landtask_delete","landtask_mark_as_done","landtask_mark_as_in_progress","landcultivationplan_read","landcultivationplan_create","landcultivationplan_update","landcultivationplan_delete","landrole_read","landrole_create","landrole_update","landrole_delete","landmemberinvitation_read","landmemberinvitation_create","landmemberinvitation_update","landmemberinvitation_delete","landsetting_read","landsetting_update"] */
export enum LandRoleJsonldUserLandRoleGetPermissionsEnum {
  LandRead = 'land_read',
  LandUpdate = 'land_update',
  LandDelete = 'land_delete',
  LandTransfer = 'land_transfer',
  LandgreenhouseRead = 'landgreenhouse_read',
  LandgreenhouseCreate = 'landgreenhouse_create',
  LandgreenhouseUpdate = 'landgreenhouse_update',
  LandgreenhouseDelete = 'landgreenhouse_delete',
  LandgreenhouseparameterRead = 'landgreenhouseparameter_read',
  LandgreenhouseparameterUpdate = 'landgreenhouseparameter_update',
  LandgreenhousesettingRead = 'landgreenhousesetting_read',
  LandgreenhousesettingUpdate = 'landgreenhousesetting_update',
  LandareaRead = 'landarea_read',
  LandareaCreate = 'landarea_create',
  LandareaUpdate = 'landarea_update',
  LandareaDelete = 'landarea_delete',
  LandareaparameterRead = 'landareaparameter_read',
  LandareaparameterUpdate = 'landareaparameter_update',
  LandareasettingRead = 'landareasetting_read',
  LandareasettingUpdate = 'landareasetting_update',
  LandmemberRead = 'landmember_read',
  LandmemberUpdate = 'landmember_update',
  LandmemberDelete = 'landmember_delete',
  LandtaskRead = 'landtask_read',
  LandtaskCreate = 'landtask_create',
  LandtaskUpdate = 'landtask_update',
  LandtaskDelete = 'landtask_delete',
  LandtaskMarkAsDone = 'landtask_mark_as_done',
  LandtaskMarkAsInProgress = 'landtask_mark_as_in_progress',
  LandcultivationplanRead = 'landcultivationplan_read',
  LandcultivationplanCreate = 'landcultivationplan_create',
  LandcultivationplanUpdate = 'landcultivationplan_update',
  LandcultivationplanDelete = 'landcultivationplan_delete',
  LandroleRead = 'landrole_read',
  LandroleCreate = 'landrole_create',
  LandroleUpdate = 'landrole_update',
  LandroleDelete = 'landrole_delete',
  LandmemberinvitationRead = 'landmemberinvitation_read',
  LandmemberinvitationCreate = 'landmemberinvitation_create',
  LandmemberinvitationUpdate = 'landmemberinvitation_update',
  LandmemberinvitationDelete = 'landmemberinvitation_delete',
  LandsettingRead = 'landsetting_read',
  LandsettingUpdate = 'landsetting_update',
}

export interface LandRoleJsonldUserLandRolePost {
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  name: string;
  /** @example ["land_read","land_update","land_delete","land_transfer","landgreenhouse_read","landgreenhouse_create","landgreenhouse_update","landgreenhouse_delete","landgreenhouseparameter_read","landgreenhouseparameter_update","landgreenhousesetting_read","landgreenhousesetting_update","landarea_read","landarea_create","landarea_update","landarea_delete","landareaparameter_read","landareaparameter_update","landareasetting_read","landareasetting_update","landmember_read","landmember_update","landmember_delete","landtask_read","landtask_create","landtask_update","landtask_delete","landtask_mark_as_done","landtask_mark_as_in_progress","landcultivationplan_read","landcultivationplan_create","landcultivationplan_update","landcultivationplan_delete","landrole_read","landrole_create","landrole_update","landrole_delete","landmemberinvitation_read","landmemberinvitation_create","landmemberinvitation_update","landmemberinvitation_delete","landsetting_read","landsetting_update"] */
  permissions?: LandRoleJsonldUserLandRolePostPermissionsEnum;
  /** @format ulid */
  ulid?: string;
}

/** @example ["land_read","land_update","land_delete","land_transfer","landgreenhouse_read","landgreenhouse_create","landgreenhouse_update","landgreenhouse_delete","landgreenhouseparameter_read","landgreenhouseparameter_update","landgreenhousesetting_read","landgreenhousesetting_update","landarea_read","landarea_create","landarea_update","landarea_delete","landareaparameter_read","landareaparameter_update","landareasetting_read","landareasetting_update","landmember_read","landmember_update","landmember_delete","landtask_read","landtask_create","landtask_update","landtask_delete","landtask_mark_as_done","landtask_mark_as_in_progress","landcultivationplan_read","landcultivationplan_create","landcultivationplan_update","landcultivationplan_delete","landrole_read","landrole_create","landrole_update","landrole_delete","landmemberinvitation_read","landmemberinvitation_create","landmemberinvitation_update","landmemberinvitation_delete","landsetting_read","landsetting_update"] */
export enum LandRoleJsonldUserLandRolePostPermissionsEnum {
  LandRead = 'land_read',
  LandUpdate = 'land_update',
  LandDelete = 'land_delete',
  LandTransfer = 'land_transfer',
  LandgreenhouseRead = 'landgreenhouse_read',
  LandgreenhouseCreate = 'landgreenhouse_create',
  LandgreenhouseUpdate = 'landgreenhouse_update',
  LandgreenhouseDelete = 'landgreenhouse_delete',
  LandgreenhouseparameterRead = 'landgreenhouseparameter_read',
  LandgreenhouseparameterUpdate = 'landgreenhouseparameter_update',
  LandgreenhousesettingRead = 'landgreenhousesetting_read',
  LandgreenhousesettingUpdate = 'landgreenhousesetting_update',
  LandareaRead = 'landarea_read',
  LandareaCreate = 'landarea_create',
  LandareaUpdate = 'landarea_update',
  LandareaDelete = 'landarea_delete',
  LandareaparameterRead = 'landareaparameter_read',
  LandareaparameterUpdate = 'landareaparameter_update',
  LandareasettingRead = 'landareasetting_read',
  LandareasettingUpdate = 'landareasetting_update',
  LandmemberRead = 'landmember_read',
  LandmemberUpdate = 'landmember_update',
  LandmemberDelete = 'landmember_delete',
  LandtaskRead = 'landtask_read',
  LandtaskCreate = 'landtask_create',
  LandtaskUpdate = 'landtask_update',
  LandtaskDelete = 'landtask_delete',
  LandtaskMarkAsDone = 'landtask_mark_as_done',
  LandtaskMarkAsInProgress = 'landtask_mark_as_in_progress',
  LandcultivationplanRead = 'landcultivationplan_read',
  LandcultivationplanCreate = 'landcultivationplan_create',
  LandcultivationplanUpdate = 'landcultivationplan_update',
  LandcultivationplanDelete = 'landcultivationplan_delete',
  LandroleRead = 'landrole_read',
  LandroleCreate = 'landrole_create',
  LandroleUpdate = 'landrole_update',
  LandroleDelete = 'landrole_delete',
  LandmemberinvitationRead = 'landmemberinvitation_read',
  LandmemberinvitationCreate = 'landmemberinvitation_create',
  LandmemberinvitationUpdate = 'landmemberinvitation_update',
  LandmemberinvitationDelete = 'landmemberinvitation_delete',
  LandsettingRead = 'landsetting_read',
  LandsettingUpdate = 'landsetting_update',
}

export interface LandRoleUserLandRolePatch {
  /** @format date-time */
  createdAt?: string;
  name: string;
  /** @example ["land_read","land_update","land_delete","land_transfer","landgreenhouse_read","landgreenhouse_create","landgreenhouse_update","landgreenhouse_delete","landgreenhouseparameter_read","landgreenhouseparameter_update","landgreenhousesetting_read","landgreenhousesetting_update","landarea_read","landarea_create","landarea_update","landarea_delete","landareaparameter_read","landareaparameter_update","landareasetting_read","landareasetting_update","landmember_read","landmember_update","landmember_delete","landtask_read","landtask_create","landtask_update","landtask_delete","landtask_mark_as_done","landtask_mark_as_in_progress","landcultivationplan_read","landcultivationplan_create","landcultivationplan_update","landcultivationplan_delete","landrole_read","landrole_create","landrole_update","landrole_delete","landmemberinvitation_read","landmemberinvitation_create","landmemberinvitation_update","landmemberinvitation_delete","landsetting_read","landsetting_update"] */
  permissions?: LandRoleUserLandRolePatchPermissionsEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

/** @example ["land_read","land_update","land_delete","land_transfer","landgreenhouse_read","landgreenhouse_create","landgreenhouse_update","landgreenhouse_delete","landgreenhouseparameter_read","landgreenhouseparameter_update","landgreenhousesetting_read","landgreenhousesetting_update","landarea_read","landarea_create","landarea_update","landarea_delete","landareaparameter_read","landareaparameter_update","landareasetting_read","landareasetting_update","landmember_read","landmember_update","landmember_delete","landtask_read","landtask_create","landtask_update","landtask_delete","landtask_mark_as_done","landtask_mark_as_in_progress","landcultivationplan_read","landcultivationplan_create","landcultivationplan_update","landcultivationplan_delete","landrole_read","landrole_create","landrole_update","landrole_delete","landmemberinvitation_read","landmemberinvitation_create","landmemberinvitation_update","landmemberinvitation_delete","landsetting_read","landsetting_update"] */
export enum LandRoleUserLandRolePatchPermissionsEnum {
  LandRead = 'land_read',
  LandUpdate = 'land_update',
  LandDelete = 'land_delete',
  LandTransfer = 'land_transfer',
  LandgreenhouseRead = 'landgreenhouse_read',
  LandgreenhouseCreate = 'landgreenhouse_create',
  LandgreenhouseUpdate = 'landgreenhouse_update',
  LandgreenhouseDelete = 'landgreenhouse_delete',
  LandgreenhouseparameterRead = 'landgreenhouseparameter_read',
  LandgreenhouseparameterUpdate = 'landgreenhouseparameter_update',
  LandgreenhousesettingRead = 'landgreenhousesetting_read',
  LandgreenhousesettingUpdate = 'landgreenhousesetting_update',
  LandareaRead = 'landarea_read',
  LandareaCreate = 'landarea_create',
  LandareaUpdate = 'landarea_update',
  LandareaDelete = 'landarea_delete',
  LandareaparameterRead = 'landareaparameter_read',
  LandareaparameterUpdate = 'landareaparameter_update',
  LandareasettingRead = 'landareasetting_read',
  LandareasettingUpdate = 'landareasetting_update',
  LandmemberRead = 'landmember_read',
  LandmemberUpdate = 'landmember_update',
  LandmemberDelete = 'landmember_delete',
  LandtaskRead = 'landtask_read',
  LandtaskCreate = 'landtask_create',
  LandtaskUpdate = 'landtask_update',
  LandtaskDelete = 'landtask_delete',
  LandtaskMarkAsDone = 'landtask_mark_as_done',
  LandtaskMarkAsInProgress = 'landtask_mark_as_in_progress',
  LandcultivationplanRead = 'landcultivationplan_read',
  LandcultivationplanCreate = 'landcultivationplan_create',
  LandcultivationplanUpdate = 'landcultivationplan_update',
  LandcultivationplanDelete = 'landcultivationplan_delete',
  LandroleRead = 'landrole_read',
  LandroleCreate = 'landrole_create',
  LandroleUpdate = 'landrole_update',
  LandroleDelete = 'landrole_delete',
  LandmemberinvitationRead = 'landmemberinvitation_read',
  LandmemberinvitationCreate = 'landmemberinvitation_create',
  LandmemberinvitationUpdate = 'landmemberinvitation_update',
  LandmemberinvitationDelete = 'landmemberinvitation_delete',
  LandsettingRead = 'landsetting_read',
  LandsettingUpdate = 'landsetting_update',
}

export interface LandSetting {
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  lookingForMember?: boolean;
  /** @format ulid */
  ulid?: string;
}

export interface LandSettingJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandSettingJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  lookingForMember?: boolean;
  /** @format ulid */
  ulid?: string;
}

export enum LandSettingJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface LandTask {
  content?: any[] | null;
  /** @format date-time */
  createdAt?: string;
  /** @format date-time */
  dueDate?: string | null;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landArea?: string | null;
  /** @format date-time */
  startDate?: string | null;
  /**
   * @default "to_be_done"
   * @example "to_be_done"
   */
  state?: LandTaskStateEnum;
  title: string;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export interface LandTaskGetCollectionParams {
  /** @default "asc" */
  'order[dueDate]'?: OrderDueDateEnum;
  'state[]'?: string[];
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /** Filter by land */
  land: string;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
  state?: string;
}

/** @default "asc" */
export enum LandTaskGetCollectionParams1OrderDueDateEnum {
  Asc = 'asc',
  Desc = 'desc',
}

export interface LandTaskJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: LandTaskJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  content?: any[] | null;
  /** @format date-time */
  createdAt?: string;
  /** @format date-time */
  dueDate?: string | null;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  land?: string;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  landArea?: string | null;
  /** @format date-time */
  startDate?: string | null;
  /**
   * @default "to_be_done"
   * @example "to_be_done"
   */
  state?: LandTaskJsonldStateEnum;
  title: string;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export enum LandTaskJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/**
 * @default "to_be_done"
 * @example "to_be_done"
 */
export enum LandTaskJsonldStateEnum {
  ToBeDone = 'to_be_done',
  InProgress = 'in_progress',
  Done = 'done',
}

export type LandTaskMarkAsDonePayload = object;

export type LandTaskMarkAsInProgressPayload = object;

/**
 * @default "to_be_done"
 * @example "to_be_done"
 */
export enum LandTaskStateEnum {
  ToBeDone = 'to_be_done',
  InProgress = 'in_progress',
  Done = 'done',
}

export interface LandUserLandPatch {
  /**
   * @default 1
   * @example 1
   */
  altitude?: number | null;
  /** @format date-time */
  createdAt?: string;
  landAreas?: string[];
  name?: string;
  /** @min 0 */
  surface?: number | null;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

/** @default "asc" */
export enum OrderDueDateEnum {
  Asc = 'asc',
  Desc = 'desc',
}

/** @default "asc" */
export enum OrderPositionEnum {
  Asc = 'asc',
  Desc = 'desc',
}

export interface Person {
  authId?: string;
  email?: string | null;
  familyName?: string | null;
  givenName?: string | null;
  id?: number;
  landMemberInvitations?: LandMemberInvitation[];
  landMembers?: LandMember[];
  landResearchRequests?: LandResearchRequest[];
  plantCustoms?: PlantCustom[];
  /** The user roles */
  roles?: string[];
  seedStocks?: SeedStock[];
  userIdentifier?: string;
}

export interface PersonJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: PersonJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  authId?: string;
  email?: string | null;
  familyName?: string | null;
  givenName?: string | null;
  id?: number;
  landMemberInvitations?: LandMemberInvitationJsonld[];
  landMembers?: LandMemberJsonld[];
  landResearchRequests?: LandResearchRequestJsonld[];
  plantCustoms?: PlantCustomJsonld[];
  /** The user roles */
  roles?: string[];
  seedStocks?: SeedStockJsonld[];
  userIdentifier?: string;
}

export enum PersonJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface PersonJsonldUserLandMemberCollection {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: PersonJsonldUserLandMemberCollectionHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  familyName?: string | null;
  givenName?: string | null;
}

export enum PersonJsonldUserLandMemberCollectionHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface PersonJsonldUserLandMemberGet {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: PersonJsonldUserLandMemberGetHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
}

export enum PersonJsonldUserLandMemberGetHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface PersonJsonldUserLandMemberInvitationCollection {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: PersonJsonldUserLandMemberInvitationCollectionHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
}

export enum PersonJsonldUserLandMemberInvitationCollectionHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface PersonJsonldUserLandMemberInvitationGet {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: PersonJsonldUserLandMemberInvitationGetHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
}

export enum PersonJsonldUserLandMemberInvitationGetHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface Plant {
  bio?: boolean;
  /** @format date-time */
  createdAt?: string;
  daysToGerminationAverage?: number | null;
  daysToHarvestMax?: number | null;
  daysToHarvestMin?: number | null;
  /**
   * @default "full-sun"
   * @example "full-sun"
   */
  exposure?: PlantExposureEnum;
  family?: any[] | null;
  harvestingMonths?: any[] | null;
  id?: number;
  landCultivationPlans?: string[];
  latinName?: string | null;
  /**
   * @default "standard"
   * @example "standard"
   */
  maturity?: PlantMaturityEnum;
  name?: string;
  perpetual?: boolean;
  plantingSpacingInCm?: number | null;
  seedStockEntries?: string[];
  soilType?: PlantSoilTypeEnum;
  sowingMinimalTemperature?: number | null;
  sowingMonths?: any[] | null;
  sowingOptimalTemperature?: number | null;
  species?: PlantSpeciesEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
  variety?: string | null;
  vegetationThreshold?: number | null;
}

export interface PlantConversionRequest {
  /** @format date-time */
  createdAt?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  mergeCandidate?: string | null;
  message?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  plantCustom?: string;
  /**
   * @default "opened"
   * @example "opened"
   */
  state?: PlantConversionRequestStateEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export interface PlantConversionRequestGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface PlantConversionRequestJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: PlantConversionRequestJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  createdAt?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  mergeCandidate?: string | null;
  message?: string | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  plantCustom?: string;
  /**
   * @default "opened"
   * @example "opened"
   */
  state?: PlantConversionRequestJsonldStateEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export enum PlantConversionRequestJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/**
 * @default "opened"
 * @example "opened"
 */
export enum PlantConversionRequestJsonldStateEnum {
  Opened = 'opened',
  Completed = 'completed',
  Published = 'published',
}

/**
 * @default "opened"
 * @example "opened"
 */
export enum PlantConversionRequestStateEnum {
  Opened = 'opened',
  Completed = 'completed',
  Published = 'published',
}

export interface PlantCustom {
  bio?: boolean;
  /** @format date-time */
  createdAt?: string;
  daysToGerminationAverage?: number | null;
  daysToHarvestMax?: number | null;
  daysToHarvestMin?: number | null;
  /**
   * @default "full-sun"
   * @example "full-sun"
   */
  exposure?: PlantCustomExposureEnum;
  family?: any[] | null;
  harvestingMonths?: any[] | null;
  id?: number;
  landCultivationPlans?: string[];
  latinName?: string | null;
  /**
   * @default "standard"
   * @example "standard"
   */
  maturity?: PlantCustomMaturityEnum;
  name?: string;
  perpetual?: boolean;
  person?: Person;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  plantConversionRequest?: string | null;
  plantingSpacingInCm?: number | null;
  seedStockEntries?: string[];
  soilType?: PlantCustomSoilTypeEnum;
  sowingMinimalTemperature?: number | null;
  sowingMonths?: any[] | null;
  sowingOptimalTemperature?: number | null;
  species?: PlantCustomSpeciesEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
  variety?: string | null;
  vegetationThreshold?: number | null;
}

/**
 * @default "full-sun"
 * @example "full-sun"
 */
export enum PlantCustomExposureEnum {
  FullSun = 'full-sun',
  PartialShade = 'partial-shade',
  Shade = 'shade',
  BrightIndirect = 'bright-indirect',
  Adaptable = 'adaptable',
}

export interface PlantCustomGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface PlantCustomJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: PlantCustomJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  bio?: boolean;
  /** @format date-time */
  createdAt?: string;
  daysToGerminationAverage?: number | null;
  daysToHarvestMax?: number | null;
  daysToHarvestMin?: number | null;
  /**
   * @default "full-sun"
   * @example "full-sun"
   */
  exposure?: PlantCustomJsonldExposureEnum;
  family?: any[] | null;
  harvestingMonths?: any[] | null;
  id?: number;
  landCultivationPlans?: string[];
  latinName?: string | null;
  /**
   * @default "standard"
   * @example "standard"
   */
  maturity?: PlantCustomJsonldMaturityEnum;
  name?: string;
  perpetual?: boolean;
  person?: PersonJsonld;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  plantConversionRequest?: string | null;
  plantingSpacingInCm?: number | null;
  seedStockEntries?: string[];
  soilType?: PlantCustomJsonldSoilTypeEnum;
  sowingMinimalTemperature?: number | null;
  sowingMonths?: any[] | null;
  sowingOptimalTemperature?: number | null;
  species?: PlantCustomJsonldSpeciesEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
  variety?: string | null;
  vegetationThreshold?: number | null;
}

/**
 * @default "full-sun"
 * @example "full-sun"
 */
export enum PlantCustomJsonldExposureEnum {
  FullSun = 'full-sun',
  PartialShade = 'partial-shade',
  Shade = 'shade',
  BrightIndirect = 'bright-indirect',
  Adaptable = 'adaptable',
}

export enum PlantCustomJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/**
 * @default "standard"
 * @example "standard"
 */
export enum PlantCustomJsonldMaturityEnum {
  VeryEarly = 'very_early',
  Early = 'early',
  MidEarly = 'mid-early',
  Standard = 'standard',
  MidLate = 'mid-late',
  Late = 'late',
  VeryLate = 'very_late',
}

export enum PlantCustomJsonldSoilTypeEnum {
  Sandy = 'sandy',
  HumusRich = 'humus-rich',
  Clay = 'clay',
  Silty = 'silty',
  Loamy = 'loamy',
  Stony = 'stony',
  Peaty = 'peaty',
  Chalky = 'chalky',
}

export enum PlantCustomJsonldSpeciesEnum {
  LactucaSativa = 'lactuca-sativa',
  BrassicaOleracea = 'brassica-oleracea',
  SolanumLycopersicum = 'solanum-lycopersicum',
  DaucusCarota = 'daucus-carota',
  PhaseolusVulgaris = 'phaseolus-vulgaris',
  CucumisSativus = 'cucumis-sativus',
}

/**
 * @default "standard"
 * @example "standard"
 */
export enum PlantCustomMaturityEnum {
  VeryEarly = 'very_early',
  Early = 'early',
  MidEarly = 'mid-early',
  Standard = 'standard',
  MidLate = 'mid-late',
  Late = 'late',
  VeryLate = 'very_late',
}

export enum PlantCustomSoilTypeEnum {
  Sandy = 'sandy',
  HumusRich = 'humus-rich',
  Clay = 'clay',
  Silty = 'silty',
  Loamy = 'loamy',
  Stony = 'stony',
  Peaty = 'peaty',
  Chalky = 'chalky',
}

export enum PlantCustomSpeciesEnum {
  LactucaSativa = 'lactuca-sativa',
  BrassicaOleracea = 'brassica-oleracea',
  SolanumLycopersicum = 'solanum-lycopersicum',
  DaucusCarota = 'daucus-carota',
  PhaseolusVulgaris = 'phaseolus-vulgaris',
  CucumisSativus = 'cucumis-sativus',
}

/**
 * @default "full-sun"
 * @example "full-sun"
 */
export enum PlantExposureEnum {
  FullSun = 'full-sun',
  PartialShade = 'partial-shade',
  Shade = 'shade',
  BrightIndirect = 'bright-indirect',
  Adaptable = 'adaptable',
}

export interface PlantGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface PlantGlobal {
  bio?: boolean;
  /** @format date-time */
  createdAt?: string;
  daysToGerminationAverage?: number | null;
  daysToHarvestMax?: number | null;
  daysToHarvestMin?: number | null;
  /**
   * @default "full-sun"
   * @example "full-sun"
   */
  exposure?: PlantGlobalExposureEnum;
  family?: any[] | null;
  harvestingMonths?: any[] | null;
  id?: number;
  landCultivationPlans?: string[];
  latinName?: string | null;
  /**
   * @default "standard"
   * @example "standard"
   */
  maturity?: PlantGlobalMaturityEnum;
  name?: string;
  perpetual?: boolean;
  plantConversionRequests?: string[];
  plantingSpacingInCm?: number | null;
  seedStockEntries?: string[];
  soilType?: PlantGlobalSoilTypeEnum;
  sowingMinimalTemperature?: number | null;
  sowingMonths?: any[] | null;
  sowingOptimalTemperature?: number | null;
  species?: PlantGlobalSpeciesEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
  variety?: string | null;
  vegetationThreshold?: number | null;
}

/**
 * @default "full-sun"
 * @example "full-sun"
 */
export enum PlantGlobalExposureEnum {
  FullSun = 'full-sun',
  PartialShade = 'partial-shade',
  Shade = 'shade',
  BrightIndirect = 'bright-indirect',
  Adaptable = 'adaptable',
}

export interface PlantGlobalGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface PlantGlobalJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: PlantGlobalJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  bio?: boolean;
  /** @format date-time */
  createdAt?: string;
  daysToGerminationAverage?: number | null;
  daysToHarvestMax?: number | null;
  daysToHarvestMin?: number | null;
  /**
   * @default "full-sun"
   * @example "full-sun"
   */
  exposure?: PlantGlobalJsonldExposureEnum;
  family?: any[] | null;
  harvestingMonths?: any[] | null;
  id?: number;
  landCultivationPlans?: string[];
  latinName?: string | null;
  /**
   * @default "standard"
   * @example "standard"
   */
  maturity?: PlantGlobalJsonldMaturityEnum;
  name?: string;
  perpetual?: boolean;
  plantConversionRequests?: string[];
  plantingSpacingInCm?: number | null;
  seedStockEntries?: string[];
  soilType?: PlantGlobalJsonldSoilTypeEnum;
  sowingMinimalTemperature?: number | null;
  sowingMonths?: any[] | null;
  sowingOptimalTemperature?: number | null;
  species?: PlantGlobalJsonldSpeciesEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
  variety?: string | null;
  vegetationThreshold?: number | null;
}

/**
 * @default "full-sun"
 * @example "full-sun"
 */
export enum PlantGlobalJsonldExposureEnum {
  FullSun = 'full-sun',
  PartialShade = 'partial-shade',
  Shade = 'shade',
  BrightIndirect = 'bright-indirect',
  Adaptable = 'adaptable',
}

export enum PlantGlobalJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/**
 * @default "standard"
 * @example "standard"
 */
export enum PlantGlobalJsonldMaturityEnum {
  VeryEarly = 'very_early',
  Early = 'early',
  MidEarly = 'mid-early',
  Standard = 'standard',
  MidLate = 'mid-late',
  Late = 'late',
  VeryLate = 'very_late',
}

export enum PlantGlobalJsonldSoilTypeEnum {
  Sandy = 'sandy',
  HumusRich = 'humus-rich',
  Clay = 'clay',
  Silty = 'silty',
  Loamy = 'loamy',
  Stony = 'stony',
  Peaty = 'peaty',
  Chalky = 'chalky',
}

export enum PlantGlobalJsonldSpeciesEnum {
  LactucaSativa = 'lactuca-sativa',
  BrassicaOleracea = 'brassica-oleracea',
  SolanumLycopersicum = 'solanum-lycopersicum',
  DaucusCarota = 'daucus-carota',
  PhaseolusVulgaris = 'phaseolus-vulgaris',
  CucumisSativus = 'cucumis-sativus',
}

/**
 * @default "standard"
 * @example "standard"
 */
export enum PlantGlobalMaturityEnum {
  VeryEarly = 'very_early',
  Early = 'early',
  MidEarly = 'mid-early',
  Standard = 'standard',
  MidLate = 'mid-late',
  Late = 'late',
  VeryLate = 'very_late',
}

export enum PlantGlobalSoilTypeEnum {
  Sandy = 'sandy',
  HumusRich = 'humus-rich',
  Clay = 'clay',
  Silty = 'silty',
  Loamy = 'loamy',
  Stony = 'stony',
  Peaty = 'peaty',
  Chalky = 'chalky',
}

export enum PlantGlobalSpeciesEnum {
  LactucaSativa = 'lactuca-sativa',
  BrassicaOleracea = 'brassica-oleracea',
  SolanumLycopersicum = 'solanum-lycopersicum',
  DaucusCarota = 'daucus-carota',
  PhaseolusVulgaris = 'phaseolus-vulgaris',
  CucumisSativus = 'cucumis-sativus',
}

export interface PlantJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: PlantJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  bio?: boolean;
  /** @format date-time */
  createdAt?: string;
  daysToGerminationAverage?: number | null;
  daysToHarvestMax?: number | null;
  daysToHarvestMin?: number | null;
  /**
   * @default "full-sun"
   * @example "full-sun"
   */
  exposure?: PlantJsonldExposureEnum;
  family?: any[] | null;
  harvestingMonths?: any[] | null;
  id?: number;
  landCultivationPlans?: string[];
  latinName?: string | null;
  /**
   * @default "standard"
   * @example "standard"
   */
  maturity?: PlantJsonldMaturityEnum;
  name?: string;
  perpetual?: boolean;
  plantingSpacingInCm?: number | null;
  seedStockEntries?: string[];
  soilType?: PlantJsonldSoilTypeEnum;
  sowingMinimalTemperature?: number | null;
  sowingMonths?: any[] | null;
  sowingOptimalTemperature?: number | null;
  species?: PlantJsonldSpeciesEnum;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
  variety?: string | null;
  vegetationThreshold?: number | null;
}

/**
 * @default "full-sun"
 * @example "full-sun"
 */
export enum PlantJsonldExposureEnum {
  FullSun = 'full-sun',
  PartialShade = 'partial-shade',
  Shade = 'shade',
  BrightIndirect = 'bright-indirect',
  Adaptable = 'adaptable',
}

export enum PlantJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

/**
 * @default "standard"
 * @example "standard"
 */
export enum PlantJsonldMaturityEnum {
  VeryEarly = 'very_early',
  Early = 'early',
  MidEarly = 'mid-early',
  Standard = 'standard',
  MidLate = 'mid-late',
  Late = 'late',
  VeryLate = 'very_late',
}

export enum PlantJsonldSoilTypeEnum {
  Sandy = 'sandy',
  HumusRich = 'humus-rich',
  Clay = 'clay',
  Silty = 'silty',
  Loamy = 'loamy',
  Stony = 'stony',
  Peaty = 'peaty',
  Chalky = 'chalky',
}

export enum PlantJsonldSpeciesEnum {
  LactucaSativa = 'lactuca-sativa',
  BrassicaOleracea = 'brassica-oleracea',
  SolanumLycopersicum = 'solanum-lycopersicum',
  DaucusCarota = 'daucus-carota',
  PhaseolusVulgaris = 'phaseolus-vulgaris',
  CucumisSativus = 'cucumis-sativus',
}

/**
 * @default "standard"
 * @example "standard"
 */
export enum PlantMaturityEnum {
  VeryEarly = 'very_early',
  Early = 'early',
  MidEarly = 'mid-early',
  Standard = 'standard',
  MidLate = 'mid-late',
  Late = 'late',
  VeryLate = 'very_late',
}

export enum PlantSoilTypeEnum {
  Sandy = 'sandy',
  HumusRich = 'humus-rich',
  Clay = 'clay',
  Silty = 'silty',
  Loamy = 'loamy',
  Stony = 'stony',
  Peaty = 'peaty',
  Chalky = 'chalky',
}

export enum PlantSpeciesEnum {
  LactucaSativa = 'lactuca-sativa',
  BrassicaOleracea = 'brassica-oleracea',
  SolanumLycopersicum = 'solanum-lycopersicum',
  DaucusCarota = 'daucus-carota',
  PhaseolusVulgaris = 'phaseolus-vulgaris',
  CucumisSativus = 'cucumis-sativus',
}

export interface SeedStock {
  /** @format date-time */
  createdAt?: string;
  id?: number;
  name?: string;
  person?: Person;
  seedStockEntries?: string[];
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export interface SeedStockEntry {
  /** @format date-time */
  createdAt?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  plant?: string;
  publiclyShared?: boolean;
  /** @format date-time */
  purchaseDate?: string | null;
  quantityInGram?: number | null;
  quantityInNumberOfSeed?: number | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  seedStock?: string;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export interface SeedStockEntryGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface SeedStockEntryJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: SeedStockEntryJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  createdAt?: string;
  id?: number;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  plant?: string;
  publiclyShared?: boolean;
  /** @format date-time */
  purchaseDate?: string | null;
  quantityInGram?: number | null;
  quantityInNumberOfSeed?: number | null;
  /**
   * @format iri-reference
   * @example "https://example.com/"
   */
  seedStock?: string;
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export enum SeedStockEntryJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface SeedStockGetCollectionParams {
  /**
   * The number of items per page
   * @min 0
   * @default 30
   */
  itemsPerPage?: number;
  /**
   * The collection page number
   * @default 1
   */
  page?: number;
  /** Enable or disable pagination */
  pagination?: boolean;
}

export interface SeedStockJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: SeedStockJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
  /** @format date-time */
  createdAt?: string;
  id?: number;
  name?: string;
  person?: PersonJsonld;
  seedStockEntries?: string[];
  /** @format ulid */
  ulid?: string;
  /** @format date-time */
  updatedAt?: string | null;
}

export enum SeedStockJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}

export interface StaticJsonld {
  '@context'?:
    | string
    | {
        '@vocab': string;
        hydra: StaticJsonldHydraEnum;
        [key: string]: any;
      };
  '@id'?: string;
  '@type'?: string;
}

export enum StaticJsonldHydraEnum {
  HttpWwwW3OrgNsHydraCore = 'http://www.w3.org/ns/hydra/core#',
}
