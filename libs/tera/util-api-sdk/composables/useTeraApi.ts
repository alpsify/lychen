import createClient, { type Middleware } from 'openapi-fetch';
import type { paths } from '../generated/tera-api';
import zitadelAuth from '@lychen/typescript-util-zitadel/ZitadelAuth';

const myMiddleware: Middleware = {
  async onRequest({ request, options }) {
    const { isAuthenticated, accessToken } = zitadelAuth.oidcAuth;
    if (isAuthenticated) {
      request.headers.set('Authorization', `Bearer ${accessToken}`);
    }
    return request;
  },
  async onResponse({ request, response, options }) {
    if (!response.ok) {
      // Will produce error messages like "https://example.org/api/v1/example: 404 Not Found".
      throw new Error(`${response.url}: ${response.status} ${response.statusText}`);
    }
    return response;
  },
  async onError({ error }) {},
};

const client = createClient<paths>({ baseUrl: import.meta.env.VITE_API_URL });

client.use(myMiddleware);

export function useTeraApi() {
  return { api: client };
}
