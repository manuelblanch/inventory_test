import Notifications from './Notifications.vue'
import { events }    from './events'

var Notify = {
  install(Vue, params = {}) {
    if (this.installed) {
      return
    }

    this.installed = true
    this.params = params

    Vue.component('notifications', Notifications)

    Vue.prototype.$notify = (params) => {
      if (typeof params === 'string') {
        params = { title: '', text: params }
      }

      if (typeof params === 'object') {
        events.$emit('add', params)
      }
    }
  }
}

styles () {
      let { x, y } = listToDirection(this.position)
      let width = this.actualWidth.value
      let suffix = this.actualWidth.type
      let styles = {
        width: width + suffix,
        [y]: '0px'
      }
      if (x === 'center') {
        styles['left'] = `calc(50% - ${width/2}${suffix})`
      } else {
        styles[x] = '0px'
      }
      return styles
    },


export default Notify
