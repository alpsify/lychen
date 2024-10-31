export { default as ViewHome } from "./ViewHome.vue";

export const RouteViewHome = {
  path: "/",
  component: () => import("./ViewHome.vue"),
  name: "home",
};
