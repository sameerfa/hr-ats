function initialState() {
  return {
    entry: {
      id: null,
      title: null,
      name: '',
      address: '',
      city: '',
      mobile: '',
      email: null,
      experience: '',
      education: '',
      skills: '',
      current_employer: '',
      current_position: '',
      resume: [],
      status: null,
      created_at: '',
      updated_at: '',
      deleted_at: '',
      owner_id: null
    },
    lists: {
      title: [],
      status: [],
      owner: []
    },
    loading: false
  }
}

const route = 'resumes'

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
  setTitle({ commit }, value) {
    commit('setTitle', value)
  },
  setName({ commit }, value) {
    commit('setName', value)
  },
  setAddress({ commit }, value) {
    commit('setAddress', value)
  },
  setCity({ commit }, value) {
    commit('setCity', value)
  },
  setMobile({ commit }, value) {
    commit('setMobile', value)
  },
  setEmail({ commit }, value) {
    commit('setEmail', value)
  },
  setExperience({ commit }, value) {
    commit('setExperience', value)
  },
  setEducation({ commit }, value) {
    commit('setEducation', value)
  },
  setSkills({ commit }, value) {
    commit('setSkills', value)
  },
  setCurrentEmployer({ commit }, value) {
    commit('setCurrentEmployer', value)
  },
  setCurrentPosition({ commit }, value) {
    commit('setCurrentPosition', value)
  },
  insertResumeFile({ commit }, file) {
    commit('insertResumeFile', file)
  },
  removeResumeFile({ commit }, file) {
    commit('removeResumeFile', file)
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
  setTitle(state, value) {
    state.entry.title = value
  },
  setName(state, value) {
    state.entry.name = value
  },
  setAddress(state, value) {
    state.entry.address = value
  },
  setCity(state, value) {
    state.entry.city = value
  },
  setMobile(state, value) {
    state.entry.mobile = value
  },
  setEmail(state, value) {
    state.entry.email = value
  },
  setExperience(state, value) {
    state.entry.experience = value
  },
  setEducation(state, value) {
    state.entry.education = value
  },
  setSkills(state, value) {
    state.entry.skills = value
  },
  setCurrentEmployer(state, value) {
    state.entry.current_employer = value
  },
  setCurrentPosition(state, value) {
    state.entry.current_position = value
  },
  insertResumeFile(state, file) {
    state.entry.resume.push(file)
  },
  removeResumeFile(state, file) {
    state.entry.resume = state.entry.resume.filter(item => {
      return item.id !== file.id
    })
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
