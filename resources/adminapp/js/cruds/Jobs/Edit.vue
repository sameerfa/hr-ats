<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.job.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.job.fields.job_title')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.job_title,
                        'is-focused': activeField == 'job_title'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.job.fields.job_title_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.job_title"
                        @input="updateJobTitle"
                        @focus="focusField('job_title')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <label>{{ $t('cruds.job.fields.company') }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_id !== null,
                      'is-focused': activeField == 'company'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.job.fields.company_helper')
                    }}</label>
                    <v-select
                      name="company"
                      label="company_name"
                      :key="'company-field'"
                      :value="entry.company_id"
                      :options="lists.company"
                      :reduce="entry => entry.id"
                      @input="updateCompany"
                      @search.focus="focusField('company')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.job.fields.expected_experience')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.expected_experience,
                        'is-focused': activeField == 'expected_experience'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.job.fields.expected_experience_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.expected_experience"
                        @input="updateExpectedExperience"
                        @focus="focusField('expected_experience')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.job.fields.ctc')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.ctc,
                        'is-focused': activeField == 'ctc'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.job.fields.ctc_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="number"
                        step="0.01"
                        :value="entry.ctc"
                        @input="updateCtc"
                        @focus="focusField('ctc')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.job.fields.city')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.city,
                        'is-focused': activeField == 'city'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.job.fields.city_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.city"
                        @input="updateCity"
                        @focus="focusField('city')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.job.fields.job_description')
                    }}</label>
                    <div class="form-group bmd-form-group has-items">
                      <label class="bmd-label-floating">{{
                        $t('cruds.job.fields.job_description_helper')
                      }}</label>
                      <ckeditor
                        :editor="editor"
                        :value="entry.job_description"
                        @input="updateJobDescription"
                        required
                      >
                      </ckeditor>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.job.fields.responsibilities')
                    }}</label>
                    <div class="form-group bmd-form-group has-items">
                      <label class="bmd-label-floating">{{
                        $t('cruds.job.fields.responsibilities_helper')
                      }}</label>
                      <ckeditor
                        :editor="editor"
                        :value="entry.responsibilities"
                        @input="updateResponsibilities"
                        required
                      >
                      </ckeditor>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.job.fields.skills')
                    }}</label>
                    <ckeditor
                      :editor="editor"
                      :value="entry.skills"
                      @input="updateSkills"
                      required
                    >
                    </ckeditor>
                  </div>
                  <label class="required">{{
                    $t('cruds.job.fields.priority')
                  }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.priority,
                      'is-focused': activeField == 'priority'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.job.fields.priority_helper')
                    }}</label>
                    <v-select
                      name="priority"
                      :key="'priority-field'"
                      :value="entry.priority"
                      :options="lists.priority"
                      :reduce="entry => entry.value"
                      @input="updatePriority"
                      @search.focus="focusField('priority')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <label class="required">{{
                    $t('cruds.job.fields.status')
                  }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.status,
                      'is-focused': activeField == 'status'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.job.fields.status_helper')
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
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

export default {
  components: {
    ClassicEditor
  },
  data() {
    return {
      status: '',
      activeField: '',
      editor: ClassicEditor
    }
  },
  computed: {
    ...mapGetters('JobsSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('JobsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setJobTitle',
      'setCompany',
      'setExpectedExperience',
      'setCtc',
      'setCity',
      'setJobDescription',
      'setResponsibilities',
      'setSkills',
      'setPriority',
      'setStatus'
    ]),
    updateJobTitle(e) {
      this.setJobTitle(e.target.value)
    },
    updateCompany(value) {
      this.setCompany(value)
    },
    updateExpectedExperience(e) {
      this.setExpectedExperience(e.target.value)
    },
    updateCtc(e) {
      this.setCtc(e.target.value)
    },
    updateCity(e) {
      this.setCity(e.target.value)
    },
    updateJobDescription(value) {
      this.setJobDescription(value)
    },
    updateResponsibilities(value) {
      this.setResponsibilities(value)
    },
    updateSkills(value) {
      this.setSkills(value)
    },
    updatePriority(value) {
      this.setPriority(value)
    },
    updateStatus(value) {
      this.setStatus(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'jobs.index' })
          this.$eventHub.$emit('update-success')
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
