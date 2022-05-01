import LoginViewVue from "@/views/LoginView.vue";
import HomeView from "@/views/HomeView.vue";
import Vue from "vue";
import VueRouter from "vue-router";
import dayjs from "dayjs";
Vue.use(VueRouter);

const routes = [{
    path: "/",
    name: "login",
    component: LoginViewVue,
  },
  {
    path: "/home",
    name: "home",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: HomeView,
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

const isAuthenticated = () => {
  if (localStorage.getItem("token")) {
    return true;
  } else {
    return false;
  }
};
const checkedExpired = () => {
  let expired = localStorage.getItem("expired_at");
  expired = dayjs(expired);
  let now = dayjs();
  if (now.isSame(expired) || now.isAfter(expired)) {
    localStorage.removeItem("token");
    localStorage.removeItem("expired_at");
  }
};
router.beforeEach(async (to, from, next) => {
 await checkedExpired();

  if (to.name !== "login" && (await !isAuthenticated()))
       next({
      name: "login"
    });
  else next();
});
export default router;