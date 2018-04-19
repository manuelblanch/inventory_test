Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

  el: '#manage-vue',

  data: {
    items: [],
    pagination: {
        total: 0,
        per_page: 2,
        from: 1,
        to: 0,
        current_page: 1
      },
    offset: 4,
    formErrors:{},
    formErrorsUpdate:{},
    newItem : {'name':'','shortname':'','description':'','date_entrance':'', 'last_update':''},
    fillItem : {'name':'','shortname':'','description':'','date_entrance':'', 'last_update':''}
  },

  computed: {
         isActived: function () {
             return this.pagination.current_page;
         },
         pagesNumber: function () {
             if (!this.pagination.to) {
                 return [];
             }
             var from = this.pagination.current_page - this.offset;
             if (from < 1) {
                 from = 1;
             }
             var to = from + (this.offset * 2);
             if (to >= this.pagination.last_page) {
                 to = this.pagination.last_page;
             }
             var pagesArray = [];
             while (from <= to) {
                 pagesArray.push(from);
                 from++;
             }
             return pagesArray;
         }
     },

     ready : function(){
  		this.getVueItems(this.pagination.current_page);
  },

  methods :{
    getVueItems: function(page){
          this.$http.get('/vueitems?page='+page).then((response) => {
            this.$set('items', response.data.data.data);
            this.$set('pagination', response.data.pagination);
          });
        },

        createItem: function(){
    		  var input = this.newItem;
    		  this.$http.post('/vueitems',input).then((response) => {
    		    this.changePage(this.pagination.current_page);
    			this.newItem = {'name':'','shortname':'','description':'','date_entrance':'', 'last_update':''};
    			$("#create-item").modal('hide');
    			toastr.success('Creat de forma correcta.', 'Success Alert', {timeOut: 5000});
    		  }, (response) => {
    			this.formErrors = response.data;
    	    });
    	},

      updateItem: function(id){
        var input = this.fillItem;
        this.$http.put('/vueitems/'+id,input).then((response) => {
            this.changePage(this.pagination.current_page);
            this.fillItem = {'title':'','description':'','id':''};
            $("#edit-item").modal('hide');
            toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
          }, (response) => {
              this.formErrorsUpdate = response.data;
          });
      },

      editItem: function(item){
            this.fillItem.title = item.title;
            this.fillItem.id = item.id;
            this.fillItem.description = item.description;
            this.fillItem.date_entrance = item.date_entrance;
            this.fillItem.last_update = item.last_update;
            $("#edit-item").modal('show');
        },

        deleteItem: function(item){
            this.$http.delete('/vueitems/'+item.id).then((response) => {
                this.changePage(this.pagination.current_page);
                toastr.success('Esborrat de forma correcta.', 'Success Alert', {timeOut: 5000});
            });
          },
  }
