function initialState() {
  return {
    entry: {
      id: null,
      company_name: '',
      address: '',
      city: '',
      contact_name: '',
      contact_email: null,
      contact_mobile: '',
      contact_designation: '',
      company_website: '',
      created_at: '',
      updated_at: '',
      deleted_at: '',
      owner_id: null
    },
    lists: {
      owner: []
    },
    loading: false
  }
}

const route = 'companies'

const getters = {
  entry: state => state.entry,
  lists: state => state.lists,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  setCompanyName({ commit }, value) {
    commit('setCompanyName', value)
  },
  setAddress({ commit }, value) {
    commit('setAddress', value)
  },
  setCity({ commit }, value) {
    commit('setCity', value)
  },
  setContactName({ commit }, value) {
    commit('setContactName', value)
  },
  setContactEmail({ commit }, value) {
    commit('setContactEmail', value)
  },
  setContactMobile({ commit }, value) {
    commit('setContactMobile', value)
  },
  setContactDesignation({ commit }, value) {
    commit('setContactDesignation', value)
  },
  setCompanyWebsite({ commit }, value) {
    commit('setCompanyWebsite', value)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  setOwner({ commit }, value) {
    commit('setOwner', value)
  },
  fetchCreateData({ commit }) {
    axios.get(`${route}/create`).then(response => {
      commit('setLists', response.data.meta)
    })
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
      commit('setLists', response.data.meta)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setCompanyName(state, value) {
    state.entry.company_name = value
  },
  setAddress(state, value) {
    state.entry.address = value
  },
  setCity(state, value) {
    state.entry.city = value
  },
  setContactName(state, value) {
    state.entry.contact_name = value
  },
  setContactEmail(state, value) {
    state.entry.contact_email = value
  },
  setContactMobile(state, value) {
    state.entry.contact_mobile = value
  },
  setContactDesignation(state, value) {
    state.entry.contact_designation = value
  },
  setCompanyWebsite(state, value) {
    state.entry.company_website = value
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setOwner(state, value) {
    state.entry.owner_id = value
  },
  setLists(state, lists) {
    state.lists = lists
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
