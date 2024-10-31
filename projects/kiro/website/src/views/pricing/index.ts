export { default as ViewPricing } from "./ViewPricing.vue";

export const RouteViewPricing = {
  path: "/",
  component: () => import("./ViewPricing.vue"),
  name: "pricing",
};
