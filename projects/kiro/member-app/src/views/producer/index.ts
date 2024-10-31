export { default as ViewProducer } from "./ViewProducer.vue";

export const RouteViewProducer = {
  path: "/producer/:uuid",
  component: () => import("./ViewProducer.vue"),
  name: "producer",
};
