FROM nginx:alpine

ARG CACHE_DATE="$(date)"

COPY ./dist /usr/share/nginx/html
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf