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

    methods: {
        addItem (event) {
          event.group = event.group || ''
          if (this.group !== event.group) {
            return
          }
          if (event.clean || event.clear) {
            this.destroyAll()
            return
          }

          notifyClass (item) {
     return [
       'notification',
       this.classes,
       item.type
     ]
   },

   export default Component
</script>
<style>
.notifications {
  display: block;
  position: fixed;
  z-index: 5000;
}

.vue-notification {
  font-size: 10px;
  padding: 10px;
  margin: 0 5px 5px;
  color: white;
  background: #;
  border-left: 5px solid #;
}
.vue-notification.warn {
  background: #ffb648;
  border-left-color: #f48a06;
}
.vue-notification.error {
  background: #;
  border-left-color: #;
}
.vue-notification.success {
  background: #;
  border-left-color: #;
}

export default Notify
