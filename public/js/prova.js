// General Vue configuration for easy debuggin.
Vue.config.debug = true

// General Firebase configuration
var embalses = { item: {
    "50010800" : {
        "adjustmentLevel" : 186,
        "city" : "Quebradillas",
        "controlLevel" : 184,
        "currentLevel" : 195,
        "currentLevelTime" : "2016-01-19 22:45",
        "datum-of-gage" : 659.48,
        "drainage-area" : 24.6,
        "last8HoursLevel" : 194.79,
        "latitude" : 18.400361,
        "longitude" : -66.923078,
        "name" : "Lago Guajataca",
        "observationLevel" : 190,
        "overflowLevel" : 196,
        "secureLevel" : 194
    },
    "50011088" : {
        "city" : "Isabela",
        "currentLevel" : 161.70,
        "currentLevelTime" : "2016-01-17 22:45",
        "datum-of-gage" : 460,
        "hydrologic-unit" : 21010002,
        "last8HoursLevel" : 161.69,
        "latitude" : 18.459289,
        "longitude" : -67.029533,
        "name" : "Lago regulador de Isabela"
    }
}
};

var vm = new Vue({
    el: '#app',
    data: {embalses,
        order: 1,
        sortKey: 'city'},
    methods: {
        sortBy: function(key){
            this.sortKey = key;
            this.order = this.order * -1;
        },
        changeBkColor: function () {
            event.currentTarget.classList.toggle('niceBackground');
        }
    },
    filters: {
        toDecimal: function(value) {
            return parseFloat(value).toFixed(2);
        }
    }
})


