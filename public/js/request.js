new Vue ({
    el: '#request',
    data:{
        activities:[],
        activity_id: $('#currentActivityId').val(),
        processes:[],
        process_id: $('#currentProcessId').val(),
        user_id: $('#currentUserId').val(),
        items:[],
        risks:[],
    },
    mounted(){
        this.getItems();
        this.getProcess();
        this.getActivities();
    },
    methods:{
        getItems: function () {
            if(this.activity_id !== "-1") {
                axios.get(`/actividades/${this.activity_id}/list`).then(response => {
                    this.items = response.data;
                });

                axios.get(`/actividades/${this.activity_id}/risks`).then(response => {
                    this.risks = response.data;
                })
            }
        },

        getProcess: function () {
            if(this.user_id !== "-1") {
                axios.get(`/usuarios/${this.user_id}/listProcesses`).then(response => {
                    this.processes = response.data;
                })
            }
        },

        getActivities: function () {
            if(this.process_id !== "-1") {
                axios.get(`/procesos/${this.process_id}/list`).then(response => {
                    this.activities = response.data;
                })
            }
        },

    }


});
