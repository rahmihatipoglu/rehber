import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import RehberListView from '@/views/RehberListView.vue'
import RehberAddView from '@/views/RehberAddView.vue'
import RehberKayitView from '@/views/RehberKayitView.vue'
import RehberEditView from '@/views/RehberEditView.vue'
import RehberSearchView from '@/views/RehberSearchView.vue'
import ContinueView from '@/views/ContinueView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      alias: ['/home', '/anasayfa'],
      meta: {
        requiresAuth: true,
        menuName: 'Home',
        title: 'Anasayfa'
      }
    },
    {
      path: '/list',
      name: 'list',
      component: RehberListView,
      meta: {
        requiresAuth: true,
        menuName: 'List',
        title: 'Listeleme Sayfası'
      }
    },
    {
      path: '/yeni',
      name: 'yeni',
      component: RehberAddView
    },
    {
      path: '/yeni2',
      name: 'yeni2',
      component: RehberKayitView
    },
    {
      path: '/edit/:id',
      name: 'edit',
      component: RehberEditView,
      meta: {
        requiresAuth: true,
        menuName: 'Edit',
        title: 'Düzeltme Sayfası'
      }
    },
    {
      path: '/search',
      name: 'search',
      component: RehberSearchView
    },
    {
      path: '/continue',
      name: 'continue',
      component: ContinueView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('@/views/AboutView.vue'),
      meta: {
        requiresAuth: true,
        menuName: 'Hakkımızda',
        title: 'Hakkımızda Sayfası'
      }
    }
  ]
})
const DEFAULT_TITLE = 'Rehber Projesi'

router.afterEach((to) => {
  document.title = to.meta.title ? String(to.meta.title) : DEFAULT_TITLE // TS nedeniyle, String çağırmazsam document.title'a atama yapamıyorum
})

export default router
