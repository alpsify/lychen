import axios, { type InternalAxiosRequestConfig } from 'axios';
import zitadelAuth from '@lychen/typescript-util-zitadel/ZitadelAuth';

const axiosInstance = axios.create({
  baseURL: 'https://api.tera.lychen.local/api/',
  withCredentials: true,
  headers: {
    'Content-Type': 'application/ld+json',
  },
});

function onFulfilled(config: InternalAxiosRequestConfig): InternalAxiosRequestConfig {
  if (!config.headers) {
    return config;
  }

  const token = zitadelAuth.oidcAuth.accessToken;

  if (token) {
    config.headers['Authorization'] = `Bearer ${token}`;
  }
  if (config.method === 'patch') {
    config.headers['Content-Type'] = 'application/merge-patch+json';
  }
  return config;
}

axiosInstance.interceptors.request.use(onFulfilled);

export default axiosInstance;
