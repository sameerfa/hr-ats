import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'resumes',
        name: 'resumes.index',
        component: () => import('@cruds/Resumes/Index.vue'),
        meta: { title: 'cruds.resume.title' }
      },
      {
        path: 'resumes/create',
        name: 'resumes.create',
        component: () => import('@cruds/Resumes/Create.vue'),
        meta: { title: 'cruds.resume.title' }
      },
      {
        path: 'resumes/:id',
        name: 'resumes.show',
        component: () => import('@cruds/Resumes/Show.vue'),
        meta: { title: 'cruds.resume.title' }
      },
      {
        path: 'resumes/:id/edit',
        name: 'resumes.edit',
        component: () => import('@cruds/Resumes/Edit.vue'),
        meta: { title: 'cruds.resume.title' }
      },
      {
        path: 'companies',
        name: 'companies.index',
        component: () => import('@cruds/Companies/Index.vue'),
        meta: { title: 'cruds.company.title' }
      },
      {
        path: 'companies/create',
        name: 'companies.create',
        component: () => import('@cruds/Companies/Create.vue'),
        meta: { title: 'cruds.company.title' }
      },
      {
        path: 'companies/:id',
        name: 'companies.show',
        component: () => import('@cruds/Companies/Show.vue'),
        meta: { title: 'cruds.company.title' }
      },
      {
        path: 'companies/:id/edit',
        name: 'companies.edit',
        component: () => import('@cruds/Companies/Edit.vue'),
        meta: { title: 'cruds.company.title' }
      },
      {
        path: 'jobs',
        name: 'jobs.index',
        component: () => import('@cruds/Jobs/Index.vue'),
        meta: { title: 'cruds.job.title' }
      },
      {
        path: 'jobs/create',
        name: 'jobs.create',
        component: () => import('@cruds/Jobs/Create.vue'),
        meta: { title: 'cruds.job.title' }
      },
      {
        path: 'jobs/:id',
        name: 'jobs.show',
        component: () => import('@cruds/Jobs/Show.vue'),
        meta: { title: 'cruds.job.title' }
      },
      {
        path: 'jobs/:id/edit',
        name: 'jobs.edit',
        component: () => import('@cruds/Jobs/Edit.vue'),
        meta: { title: 'cruds.job.title' }
      },
      {
        path: 'interviews',
        name: 'interviews.index',
        component: () => import('@cruds/Interviews/Index.vue'),
        meta: { title: 'cruds.interview.title' }
      },
      {
        path: 'interviews/create',
        name: 'interviews.create',
        component: () => import('@cruds/Interviews/Create.vue'),
        meta: { title: 'cruds.interview.title' }
      },
      {
        path: 'interviews/:id',
        name: 'interviews.show',
        component: () => import('@cruds/Interviews/Show.vue'),
        meta: { title: 'cruds.interview.title' }
      },
      {
        path: 'interviews/:id/edit',
        name: 'interviews.edit',
        component: () => import('@cruds/Interviews/Edit.vue'),
        meta: { title: 'cruds.interview.title' }
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          }
        ]
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
