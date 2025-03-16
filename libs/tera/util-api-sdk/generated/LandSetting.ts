 
/* tslint:disable */
/*
 * ---------------------------------------------------------------
 * ## THIS FILE WAS GENERATED VIA SWAGGER-TYPESCRIPT-API        ##
 * ##                                                           ##
 * ## AUTHOR: acacode                                           ##
 * ## SOURCE: https://github.com/acacode/swagger-typescript-api ##
 * ---------------------------------------------------------------
 */

import type { LandSetting, LandSettingJsonld } from './data-contracts';
import { ContentType, HttpClient, type RequestParams } from './http-client';

export class LandSetting<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
   * @description Retrieves a LandSetting resource.
   *
   * @tags LandSetting
   * @name LandSettingGet
   * @summary Retrieves a LandSetting resource.
   * @request GET:/api/land_settings/{ulid}
   * @secure
   * @response `200` `LandSettingJsonld` LandSetting resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landSettingGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandSettingJsonld, void>({
      path: `/api/land_settings/${ulid}`,
      method: 'GET',
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Updates the LandSetting resource.
   *
   * @tags LandSetting
   * @name LandSettingPatch
   * @summary Updates the LandSetting resource.
   * @request PATCH:/api/land_settings/{ulid}
   * @secure
   * @response `200` `LandSettingJsonld` LandSetting resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landSettingPatch = (ulid: string, data: LandSetting, params: RequestParams = {}) =>
    this.http.request<LandSettingJsonld, void>({
      path: `/api/land_settings/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      format: 'json',
      ...params,
    });
}
