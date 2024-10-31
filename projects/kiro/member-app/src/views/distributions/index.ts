export { default as ViewDistributions } from "./ViewDistributions.vue";

export const RouteViewDistributions = {
  path: "/distributions",
  component: () => import("./ViewDistributions.vue"),
  name: "distributions",
};
