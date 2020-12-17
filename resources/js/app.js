require('./bootstrap');

window.Vue = require('vue');

Vue.component('modal', {
    template: '#modal-template'
});

const app = new Vue({
    el: '#app',
    data: {
        newUrl: {'url': ''},
        hasError: true,
        urls: [],
        e_id: '',
        e_url: '',
    },
    mounted: function mounted(){
        this.getUrls();
    },
    methods: {
        createUrl: function createUrl() {
            var input = this.newUrl;
            var _this = this;
            if(input['url'] == '') {
                this.hasError = false;
            }
            else {
                this.hasError= true;
                axios.post('/storeUrl', input).then(function(response){
                    _this.newUrl = {'make': '', 'model': ''}
                    _this.getUrls();
                }).catch(error=>{
                    console.log("Insert: "+error);
                });
            }
        },
        getUrls: function getUrls(){
            var _this = this;
            axios.get('/getUrls').then(function(response){
                _this.urls = response.data;
            }).catch(error=>{
                console.log("Get All: "+error);
            });
        },
        setVal(val_id, val_url) {
            this.e_id = val_id;
            this.e_url = val_url;
        },
        editUrl: function(){
            var _this = this;
            var id_val_1 = document.getElementById('e_id');
            var url_val_1 = document.getElementById('e_url');
            //TODO: model might need to be url
            var model = document.getElementById('myModal').value;
            axios.post('/editUrls/' + id_val_1.value, {val_1: url_val_1.value})
            .then(response => {
                _this.getUrls();
            });
        },
        deleteUrl: function deleteUrl(url) {
                var _this = this;
                axios.post('/deleteUrl/' + url.id).then(function(response){
                _this.getUrls();
            }).catch(error=>{
                console.log("Delete url: "+error);
            });
        },
    }
});
