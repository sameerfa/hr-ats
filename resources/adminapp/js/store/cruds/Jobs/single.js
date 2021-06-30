function initialState() {
  return {
    entry: {
      id: null,
      job_title: '',
      company_id: null,
      expected_experience: '',
      ctc: '',
      city: '',
      job_description: '',
      responsibilities: '',
      skills: '',
      priority: null,
      status: null,
      created_at: '',
      updated_at: '',
      deleted_at: '',
      owner_id: null
    },
    lists: {
      company: [],
      priority: [],
      status: [],
      owner: []
    },
    loading: false
  }
}

const route = 'jobs'

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
  setJobTitle({ commit }, value) {
    commit('setJobTitle', value)
  },
  setCompany({ commit }, value) {
    commit('setCompany', value)
  },
  setExpectedExperience({ commit }, value) {
    commit('setExpectedExperience', value)
  },
  setCtc({ commit }, value) {
    commit('setCtc', value)
  },
  setCity({ commit }, value) {
    commit('setCity', value)
  },
  setJobDescription({ commit }, value) {
    commit('setJobDescription', value)
  },
  setResponsibilities({ commit }, value) {
    commit('setResponsibilities', value)
  },
  setSkills({ commit }, value) {
    commit('setSkills', value)
  },
  setPriority({ commit }, value) {
    commit('setPriority', value)
  },
  setStatus({ commit }, value) {
    commit('setStatus', value)
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
  setJobTitle(state, value) {
    state.entry.job_title = value
  },
  setCompany(state, value) {
    state.entry.company_id = value
  },
  setExpectedExperience(state, value) {
    state.entry.expected_experience = value
  },
  setCtc(state, value) {
    state.entry.ctc = value
  },
  setCity(state, value) {
    state.entry.city = value
  },
  setJobDescription(state, value) {
    state.entry.job_description = value
  },
  setResponsibilities(state, value) {
    state.entry.responsibilities = value
  },
  setSkills(state, value) {
    state.entry.skills = value
  },
  setPriority(state, value) {
    state.entry.priority = value
  },
  setStatus(state, value) {
    state.entry.status = value
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
