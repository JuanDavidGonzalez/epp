new Vue ({
    el: '#request',
    data:{
        items:[],
        activity_id: -1
    },
    methods:{
        getItems: function () {
            axios.get(`/actividades/${this.activity_id}/list`).then(response => {
                this.items = response.data;
            })
        },
    }
});
