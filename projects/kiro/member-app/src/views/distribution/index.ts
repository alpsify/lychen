export { default as ViewDistribution } from "./ViewDistribution.vue";

export const RouteViewDistribution = {
  path: "/distribution/:uuid",
  component: () => import("./ViewDistribution.vue"),
  name: "distribution",
};
