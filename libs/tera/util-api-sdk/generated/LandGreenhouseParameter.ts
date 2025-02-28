/* tslint:disable */
/*
 * ---------------------------------------------------------------
 * ## THIS FILE WAS GENERATED VIA SWAGGER-TYPESCRIPT-API        ##
 * ##                                                           ##
 * ## AUTHOR: acacode                                           ##
 * ## SOURCE: https://github.com/acacode/swagger-typescript-api ##
 * ---------------------------------------------------------------
 */

import type { LandGreenhouseParameter, LandGreenhouseParameterJsonld } from './data-contracts';
import type { ContentType, HttpClient, RequestParams } from './http-client';

export class LandGreenhouseParameter<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
   * @description Retrieves a LandGreenhouseParameter resource.
   *
   * @tags LandGreenhouseParameter
   * @name ApiLandGreenhouseParametersUlidGet
   * @summary Retrieves a LandGreenhouseParameter resource.
   * @request GET:/api/land_greenhouse_parameters/{ulid}
   * @secure
   * @response `200` `LandGreenhouseParameterJsonld` LandGreenhouseParameter resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  apiLandGreenhouseParametersUlidGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandGreenhouseParameterJsonld, void>({
      path: `/api/land_greenhouse_parameters/${ulid}`,
      method: 'GET',
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Updates the LandGreenhouseParameter resource.
   *
   * @tags LandGreenhouseParameter
   * @name ApiLandGreenhouseParametersUlidPatch
   * @summary Updates the LandGreenhouseParameter resource.
   * @request PATCH:/api/land_greenhouse_parameters/{ulid}
   * @secure
   * @response `200` `LandGreenhouseParameterJsonld` LandGreenhouseParameter resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  apiLandGreenhouseParametersUlidPatch = (
    ulid: string,
    data: LandGreenhouseParameter,
    params: RequestParams = {},
  ) =>
    this.http.request<LandGreenhouseParameterJsonld, void>({
      path: `/api/land_greenhouse_parameters/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
}
