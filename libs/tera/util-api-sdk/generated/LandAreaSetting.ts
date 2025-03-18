/* tslint:disable */
/*
 * ---------------------------------------------------------------
 * ## THIS FILE WAS GENERATED VIA SWAGGER-TYPESCRIPT-API        ##
 * ##                                                           ##
 * ## AUTHOR: acacode                                           ##
 * ## SOURCE: https://github.com/acacode/swagger-typescript-api ##
 * ---------------------------------------------------------------
 */

import type { LandAreaSetting, LandAreaSettingJsonld } from './data-contracts';
import { ContentType, HttpClient, type RequestParams } from './http-client';

export class LandAreaSetting<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
   * @description Retrieves a LandAreaSetting resource.
   *
   * @tags LandAreaSetting
   * @name LandAreaSettingGet
   * @summary Retrieves a LandAreaSetting resource.
   * @request GET:/api/land_area_settings/{ulid}
   * @secure
   * @response `200` `LandAreaSettingJsonld` LandAreaSetting resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landAreaSettingGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandAreaSettingJsonld, void>({
      path: `/api/land_area_settings/${ulid}`,
      method: 'GET',
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Updates the LandAreaSetting resource.
   *
   * @tags LandAreaSetting
   * @name LandAreaSettingPatch
   * @summary Updates the LandAreaSetting resource.
   * @request PATCH:/api/land_area_settings/{ulid}
   * @secure
   * @response `200` `LandAreaSettingJsonld` LandAreaSetting resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landAreaSettingPatch = (ulid: string, data: LandAreaSetting, params: RequestParams = {}) =>
    this.http.request<LandAreaSettingJsonld, void>({
      path: `/api/land_area_settings/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.JsonMergePatch,
      format: 'json',
      ...params,
    });
}
