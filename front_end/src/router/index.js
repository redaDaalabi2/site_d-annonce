import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "register",
    component: () => import("../views/RgisterView.vue")
  },
  {
    path: "/Login",
    name: "login",
    component: () => import("../views/LoginView.vue")
  },
  {
    path: "/offre/offrehome",
    name: "offrehome",
    component: () => import("../views/OffreView.vue")
  },
  {
    path: "/demande/demandehome",
    name: "demandehome",
    component: () => import("../views/DemandeView.vue")
  },
  {
    path: "/offre/addoffre",
    name: "addoffre",
    component: () => import("../views/AddOffreView.vue")
  },
  {
    path: "/demande/adddemande",
    name: "adddemande",
    component: () => import("../views/AddDemandeView.vue")
  },
  {
    path: "/offre/updatehome/:id",
    name: "updateoffre",
    component: () => import("../views/UpdateOffreView.vue")
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
