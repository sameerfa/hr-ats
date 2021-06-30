<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{ $t('cruds.interview.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.job_id !== null,
                      'is-focused': activeField == 'job'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.interview.fields.job')
                    }}</label>
                    <v-select
                      name="job"
                      label="job_title"
                      :key="'job-field'"
                      :value="entry.job_id"
                      :options="lists.job"
                      :reduce="entry => entry.id"
                      @input="updateJob"
                      @search.focus="focusField('job')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.resume_id !== null,
                      'is-focused': activeField == 'resume'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.interview.fields.resume')
                    }}</label>
                    <v-select
                      name="resume"
                      label="name"
                      :key="'resume-field'"
                      :value="entry.resume_id"
                      :options="lists.resume"
                      :reduce="entry => entry.id"
                      @input="updateResume"
                      @search.focus="focusField('resume')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.interview.fields.review')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.review,
                        'is-focused': activeField == 'review'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.interview.fields.review_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.review"
                        @input="updateReview"
                        @focus="focusField('review')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <label class="required">{{
                    $t('cruds.interview.fields.status')
                  }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.status,
                      'is-focused': activeField == 'status'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.interview.fields.status_helper')
                    }}</label>
                    <v-select
                      name="status"
                      :key="'status-field'"
                      :value="entry.status"
                      :options="lists.status"
                      :reduce="entry => entry.value"
                      @input="updateStatus"
                      @search.focus="focusField('status')"
                      @search.blur="clearFocus"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('InterviewsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('InterviewsSingle', [
      'storeData',
      'resetState',
      'setJob',
      'setResume',
      'setReview',
      'setStatus',
      'fetchCreateData'
    ]),
    updateJob(value) {
      this.setJob(value)
    },
    updateResume(value) {
      this.setResume(value)
    },
    updateReview(e) {
      this.setReview(e.target.value)
    },
    updateStatus(value) {
      this.setStatus(value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'interviews.index' })
          this.$eventHub.$emit('create-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
