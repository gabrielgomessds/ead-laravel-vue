import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/home/HomeView.vue'
import MySupports from '@/views/supports/MySupports.vue'
import ModulesAndLessons from '@/views/modules/ModulesAndLessons.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
      {
        path: '/campus',
        component: () => import('@/layouts/DefaultTemplate.vue'),
        children: [
          {
            path: 'modulos',
            name: 'campus.modules',
            component: ModulesAndLessons
          },
          {
            path: 'minhas-duvidas',
            name: 'campus.my.supports',
            component: MySupports
          },
          {
            path: '',
            name: 'campus.home',
            component: HomeView
          }
        ]
      }
  ]
})

export default router
