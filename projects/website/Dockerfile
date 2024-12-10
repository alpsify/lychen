FROM nginx:alpine

LABEL org.opencontainers.image.source=https://github.com/alpsify/lychen

ARG CACHE_DATE="$(date)"

COPY ./dist /usr/share/nginx/html
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf