import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import ResumesIndex from './cruds/Resumes'
import ResumesSingle from './cruds/Resumes/single'
import CompaniesIndex from './cruds/Companies'
import CompaniesSingle from './cruds/Companies/single'
import JobsIndex from './cruds/Jobs'
import JobsSingle from './cruds/Jobs/single'
import InterviewsIndex from './cruds/Interviews'
import InterviewsSingle from './cruds/Interviews/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    ResumesIndex,
    ResumesSingle,
    CompaniesIndex,
    CompaniesSingle,
    JobsIndex,
    JobsSingle,
    InterviewsIndex,
    InterviewsSingle
  },
  strict: debug
})
