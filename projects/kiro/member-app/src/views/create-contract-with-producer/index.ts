export { default as ViewCreateContractWithProducer } from "./ViewCreateContractWithProducer.vue";

export const RouteViewCreateContractWithProducer = {
  path: "/create-contract-with-producer",
  component: () => import("./ViewCreateContractWithProducer.vue"),
  name: "create-contract-with-producer",
};
