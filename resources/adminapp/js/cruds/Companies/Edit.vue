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
                <strong>{{ $t('cruds.company.title_singular') }}</strong>
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
                      $t('cruds.company.fields.company_name')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.company_name,
                        'is-focused': activeField == 'company_name'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.company.fields.company_name_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.company_name"
                        @input="updateCompanyName"
                        @focus="focusField('company_name')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.address,
                      'is-focused': activeField == 'address'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.address')
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
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.company.fields.city')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.city,
                        'is-focused': activeField == 'city'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.company.fields.city_helper')
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
                      $t('cruds.company.fields.contact_name')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.contact_name,
                        'is-focused': activeField == 'contact_name'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.company.fields.contact_name_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.contact_name"
                        @input="updateContactName"
                        @focus="focusField('contact_name')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.company.fields.contact_email')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.contact_email,
                        'is-focused': activeField == 'contact_email'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.company.fields.contact_email_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="email"
                        :value="entry.contact_email"
                        @input="updateContactEmail"
                        @focus="focusField('contact_email')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.company.fields.contact_mobile')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.contact_mobile,
                        'is-focused': activeField == 'contact_mobile'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.company.fields.contact_mobile_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.contact_mobile"
                        @input="updateContactMobile"
                        @focus="focusField('contact_mobile')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.company.fields.contact_designation')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.contact_designation,
                        'is-focused': activeField == 'contact_designation'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.company.fields.contact_designation_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.contact_designation"
                        @input="updateContactDesignation"
                        @focus="focusField('contact_designation')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.company.fields.company_website')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.company_website,
                        'is-focused': activeField == 'company_website'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.company.fields.company_website_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.company_website"
                        @input="updateCompanyWebsite"
                        @focus="focusField('company_website')"
                        @blur="clearFocus"
                      />
                    </div>
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
    ...mapGetters('CompaniesSingle', ['entry', 'loading'])
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
    ...mapActions('CompaniesSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setCompanyName',
      'setAddress',
      'setCity',
      'setContactName',
      'setContactEmail',
      'setContactMobile',
      'setContactDesignation',
      'setCompanyWebsite'
    ]),
    updateCompanyName(e) {
      this.setCompanyName(e.target.value)
    },
    updateAddress(e) {
      this.setAddress(e.target.value)
    },
    updateCity(e) {
      this.setCity(e.target.value)
    },
    updateContactName(e) {
      this.setContactName(e.target.value)
    },
    updateContactEmail(e) {
      this.setContactEmail(e.target.value)
    },
    updateContactMobile(e) {
      this.setContactMobile(e.target.value)
    },
    updateContactDesignation(e) {
      this.setContactDesignation(e.target.value)
    },
    updateCompanyWebsite(e) {
      this.setCompanyWebsite(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'companies.index' })
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
