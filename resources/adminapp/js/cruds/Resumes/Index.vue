<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">
              <strong>{{ $t('cruds.resume.title') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <router-link
              class="btn btn-primary"
              v-if="$can(xprops.permission_prefix + 'create')"
              :to="{ name: xprops.route + '.create' }"
            >
              <i class="material-icons">
                add
              </i>
              {{ $t('global.add') }}
            </router-link>
            <button
              type="button"
              class="btn btn-default"
              @click="fetchIndexData"
              :disabled="loading"
              :class="{ disabled: loading }"
            >
              <i class="material-icons" :class="{ 'fa-spin': loading }">
                refresh
              </i>
              {{ $t('global.refresh') }}
            </button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-overlay" v-show="loading">
                  <div class="table-overlay-container">
                    <material-spinner></material-spinner>
                    <span>Loading...</span>
                  </div>
                </div>
                <datatable
                  :columns="columns"
                  :data="data"
                  :total="total"
                  :query="query"
                  :xprops="xprops"
                  :HeaderSettings="false"
                  :pageSizeOptions="[10, 25, 50, 100]"
                >
                  <global-search :query="query" class="pull-left" />
                  <header-settings :columns="columns" class="pull-right" />
                </datatable>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableActions from '@components/Datatables/DatatableActions'
import TranslatedHeader from '@components/Datatables/TranslatedHeader'
import HeaderSettings from '@components/Datatables/HeaderSettings'
import GlobalSearch from '@components/Datatables/GlobalSearch'
import DatatableEnum from '@components/Datatables/DatatableEnum'
import DatatableAttachments from '@components/Datatables/DatatableAttachments'

export default {
  components: {
    GlobalSearch,
    HeaderSettings
  },
  data() {
    return {
      columns: [
        {
          title: 'cruds.resume.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.resume.fields.title',
          field: 'title',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.resume.fields.name',
          field: 'name',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.resume.fields.address',
          field: 'address',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.resume.fields.city',
          field: 'city',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.resume.fields.mobile',
          field: 'mobile',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.resume.fields.email',
          field: 'email',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.resume.fields.experience',
          field: 'experience',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.resume.fields.education',
          field: 'education',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.resume.fields.skills',
          field: 'skills',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.resume.fields.current_employer',
          field: 'current_employer',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.resume.fields.current_position',
          field: 'current_position',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.resume.fields.resume',
          field: 'resume',
          thComp: TranslatedHeader,
          tdComp: DatatableAttachments
        },
        {
          title: 'cruds.resume.fields.status',
          field: 'status',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'global.actions',
          thComp: TranslatedHeader,
          tdComp: DatatableActions,
          visible: true,
          thClass: 'text-right',
          tdClass: 'text-right td-actions',
          colStyle: 'width: 150px;'
        }
      ],
      query: { sort: 'id', order: 'desc', limit: 50, s: '' },
      xprops: {
        module: 'ResumesIndex',
        route: 'resumes',
        permission_prefix: 'resume_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('ResumesIndex', ['data', 'total', 'loading'])
  },
  watch: {
    query: {
      handler(query) {
        this.setQuery(query)
        this.fetchIndexData()
      },
      deep: true
    }
  },
  methods: {
    ...mapActions('ResumesIndex', ['fetchIndexData', 'setQuery', 'resetState'])
  }
}
</script>
