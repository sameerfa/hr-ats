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
                <strong>{{ $t('cruds.resume.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <label class="required">{{
                    $t('cruds.resume.fields.title')
                  }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.title,
                      'is-focused': activeField == 'title'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.resume.fields.title_helper')
                    }}</label>
                    <v-select
                      name="title"
                      :key="'title-field'"
                      :value="entry.title"
                      :options="lists.title"
                      :reduce="entry => entry.value"
                      @input="updateTitle"
                      @search.focus="focusField('title')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.resume.fields.name')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.name,
                        'is-focused': activeField == 'name'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.resume.fields.name_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.name"
                        @input="updateName"
                        @focus="focusField('name')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.resume.fields.address') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.address,
                        'is-focused': activeField == 'address'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.resume.fields.address_helper')
                      }}</label>
                      <textarea
                        class="form-control"
                        rows="5"
                        :value="entry.address"
                        @input="updateAddress"
                        @focus="focusField('address')"
                        @blur="clearFocus"
                      ></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.resume.fields.city')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.city,
                        'is-focused': activeField == 'city'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.resume.fields.city_helper')
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
                      $t('cruds.resume.fields.mobile')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.mobile,
                        'is-focused': activeField == 'mobile'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.resume.fields.mobile_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.mobile"
                        @input="updateMobile"
                        @focus="focusField('mobile')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.resume.fields.email')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.email,
                        'is-focused': activeField == 'email'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.resume.fields.email_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="email"
                        :value="entry.email"
                        @input="updateEmail"
                        @focus="focusField('email')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.resume.fields.experience')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.experience,
                        'is-focused': activeField == 'experience'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.resume.fields.experience_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.experience"
                        @input="updateExperience"
                        @focus="focusField('experience')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.resume.fields.education')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.education,
                        'is-focused': activeField == 'education'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.resume.fields.education_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.education"
                        @input="updateEducation"
                        @focus="focusField('education')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.resume.fields.skills') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.skills,
                        'is-focused': activeField == 'skills'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.resume.fields.skills_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.skills"
                        @input="updateSkills"
                        @focus="focusField('skills')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.resume.fields.current_employer')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.current_employer,
                        'is-focused': activeField == 'current_employer'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.resume.fields.current_employer_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.current_employer"
                        @input="updateCurrentEmployer"
                        @focus="focusField('current_employer')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.resume.fields.current_position')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.current_position,
                        'is-focused': activeField == 'current_position'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.resume.fields.current_position_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.current_position"
                        @input="updateCurrentPosition"
                        @focus="focusField('current_position')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.resume.fields.resume')
                    }}</label>
                    <div class="form-group bmd-form-group has-items">
                      <label class="bmd-label-floating">{{
                        $t('cruds.resume.fields.resume_helper')
                      }}</label>
                    </div>
                    <attachment
                      :route="getRoute('resumes')"
                      :collection-name="'resume_resume'"
                      :media="entry.resume"
                      :model-id="$route.params.id"
                      :max-file-size="5"
                      @file-uploaded="insertResumeFile"
                      @file-removed="removeResumeFile"
                    />
                  </div>
                  <label class="required">{{
                    $t('cruds.resume.fields.status')
                  }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.status,
                      'is-focused': activeField == 'status'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.resume.fields.status_helper')
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
import Attachment from '@components/Attachments/Attachment'

export default {
  components: {
    Attachment
  },
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('ResumesSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('ResumesSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setTitle',
      'setName',
      'setAddress',
      'setCity',
      'setMobile',
      'setEmail',
      'setExperience',
      'setEducation',
      'setSkills',
      'setCurrentEmployer',
      'setCurrentPosition',
      'insertResumeFile',
      'removeResumeFile',
      'setStatus'
    ]),
    updateTitle(value) {
      this.setTitle(value)
    },
    updateName(e) {
      this.setName(e.target.value)
    },
    updateAddress(e) {
      this.setAddress(e.target.value)
    },
    updateCity(e) {
      this.setCity(e.target.value)
    },
    updateMobile(e) {
      this.setMobile(e.target.value)
    },
    updateEmail(e) {
      this.setEmail(e.target.value)
    },
    updateExperience(e) {
      this.setExperience(e.target.value)
    },
    updateEducation(e) {
      this.setEducation(e.target.value)
    },
    updateSkills(e) {
      this.setSkills(e.target.value)
    },
    updateCurrentEmployer(e) {
      this.setCurrentEmployer(e.target.value)
    },
    updateCurrentPosition(e) {
      this.setCurrentPosition(e.target.value)
    },
    updateStatus(value) {
      this.setStatus(value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'resumes.index' })
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
