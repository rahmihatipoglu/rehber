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
      component: HomeView
    },
    {
      path: '/list',
      name: 'list',
      component: RehberListView
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
      path: '/edit',
      name: 'edit',
      component: RehberEditView
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
      component: () => import('@/views/AboutView.vue')
    }
  ]
})

export default router
