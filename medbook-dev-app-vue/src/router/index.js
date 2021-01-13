import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../auth/Login.vue'
import Main from '../views/Layouts/Main.vue';
import NProgress from 'nprogress'

Vue.use(VueRouter)

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/main',
    name: 'Home',
    component: Main
  },
  {
    path: '/',
    name: 'dash',
    component: () => import(/* webpackChunkName: "about" */ '../views/Layouts/Main.vue'),
    children: [
      {
        path: 'profile',
        // Lazy-loaded only when router is visited
        component: () => import(/* webpackChunkName: "profile" */'../views/Profile.vue'),
        meta : {
          name : 'Profile'
        }
      },
      {
        path: 'Patient',
        // Lazy-loaded only when router is visited
        component: () => import(/* webpackChunkName: "profile" */'../views/Patient.vue'),
        meta : {
          name : 'Patient Health Record'
        }
      },
    ]
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})


router.beforeResolve((to, from, next) => {
  // If this isn't an initial page load.
  if (to.name) {
    // Start the route progress bar.
    NProgress.start()
  }
  next()
})

router.afterEach(() => {
  // Complete the animation of the route progress bar.
  NProgress.done()
})


router.beforeEach((to, from, next) => {
  const publicPages = ['/login'];
  const authRequired = !publicPages.includes(to.path);
  const loggedIn = sessionStorage.getItem('token');
  /* 
   * Try to access a restricted page without login
   * Redirect to login page 
   */
  if (authRequired && !loggedIn) {
    // Redirect to requested path
    const loginpath = to.path;
    next({ name: 'Login', query: { from: loginpath } });
    /*
     * Try accessing login page while logedin - redirect to profile page
     */
  } else if (loggedIn && (to.path).includes('/login')) {    
    next('/patient');
  }
  else {
    next();
  }
});



export default router