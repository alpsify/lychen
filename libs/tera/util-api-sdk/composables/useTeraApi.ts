import zitadelAuth from '@lychen/typescript-util-zitadel/ZitadelAuth';
import { HttpClient } from '../generated/http-client';
import * as generatedApi from '../generated';

type ApiKey = keyof typeof generatedApi;
type ApiClasses = typeof generatedApi;

export function useTeraApi<T extends ApiKey>(apiName: T): InstanceType<ApiClasses[T]> {
  const httpClient = new HttpClient({
    baseUrl: import.meta.env.VITE_API_URL,
    securityWorker: async () => {
      const { isAuthenticated, accessToken } = zitadelAuth.oidcAuth;

      return isAuthenticated
        ? {
            headers: {
              Authorization: `Bearer ${accessToken}`,
            },
          }
        : {};
    },
  });

  const ApiClass = generatedApi[apiName];

  if (typeof ApiClass !== 'function') {
    throw new Error(`Invalid API class name: ${apiName}`);
  }

  return new ApiClass(httpClient) as InstanceType<ApiClasses[T]>;
}

export function useAllTeraApi() {
  const httpClient = new HttpClient({
    baseUrl: import.meta.env.VITE_API_URL,
    securityWorker: async () => {
      const { isAuthenticated, accessToken } = zitadelAuth.oidcAuth;

      return isAuthenticated
        ? {
            headers: {
              Authorization: `Bearer ${accessToken}`,
            },
          }
        : {};
    },
  });

  const allApi: { [key in ApiKey]?: InstanceType<ApiClasses[key]> } = {};

  for (const key in generatedApi) {
    if (typeof generatedApi[key as ApiKey] === 'function') {
      allApi[key as ApiKey] = new generatedApi[key as ApiKey](httpClient) as InstanceType<
        ApiClasses[typeof key]
      >;
    }
  }

  return allApi as { [key in ApiKey]-?: InstanceType<ApiClasses[key]> };
}
