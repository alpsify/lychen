/* tslint:disable */
/*
 * ---------------------------------------------------------------
 * ## THIS FILE WAS GENERATED VIA SWAGGER-TYPESCRIPT-API        ##
 * ##                                                           ##
 * ## AUTHOR: acacode                                           ##
 * ## SOURCE: https://github.com/acacode/swagger-typescript-api ##
 * ---------------------------------------------------------------
 */

import type { LandMemberSetting, LandMemberSettingJsonld } from './data-contracts';
import { ContentType, HttpClient, type RequestParams } from './http-client';

export class LandMemberSetting<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
   * @description Retrieves a LandMemberSetting resource.
   *
   * @tags LandMemberSetting
   * @name LandMemberSettingGet
   * @summary Retrieves a LandMemberSetting resource.
   * @request GET:/api/land_member_settings/{ulid}
   * @secure
   * @response `200` `LandMemberSettingJsonld` LandMemberSetting resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landMemberSettingGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandMemberSettingJsonld, void>({
      path: `/api/land_member_settings/${ulid}`,
      method: 'GET',
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Updates the LandMemberSetting resource.
   *
   * @tags LandMemberSetting
   * @name LandMemberSettingPatch
   * @summary Updates the LandMemberSetting resource.
   * @request PATCH:/api/land_member_settings/{ulid}
   * @secure
   * @response `200` `LandMemberSettingJsonld` LandMemberSetting resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landMemberSettingPatch = (ulid: string, data: LandMemberSetting, params: RequestParams = {}) =>
    this.http.request<LandMemberSettingJsonld, void>({
      path: `/api/land_member_settings/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.JsonMergePatch,
      format: 'json',
      ...params,
    });
}
