const { createApp } = Vue;

createApp({
    data() {
        return {
            inboxData: [],
            conversationData: [],
            messageInput: '',
            search: '',
        }
    },
    methods: {
        getInboxData: function () {
            const vue = this;
            var data = new FormData();
            data.append("method", "getInboxData");
            axios.post('../includes/router.php', data)
                .then(function (res) {
                    console.log(res.data);
                    vue.inboxData = [...vue.inboxData, ...res.data];
                })
        },
        // getInboxById: function (inbox_id, sender_id, receiver_id) {
        //     const vue = this;
        //     var data = new FormData();
        //     data.append("method", "getInboxById");
        //     data.append("inbox_id", inbox_id);
        //     data.append("sender_id", sender_id);
        //     data.append("receiver_id", receiver_id);

        //     axios.post('/florafusionmarket/includes/router.php', data)
        //         .then(function (res) {
        //             if (res.data.result === 'fetchData') {
        //                 // Clear existing data before adding new messages
        //                 vue.conversationData = res.data.data;
        //             }
        //             console.log(vue.conversationData);
        //         });
        // },
        getInboxById: function (inbox_id, sender_id, receiver_id) {
            const vue = this;
        
            // Define a function to fetch conversation data
            const fetchConversationData = function () {
                var data = new FormData();
                data.append("method", "getInboxById");
                data.append("inbox_id", inbox_id);
                data.append("sender_id", sender_id);
                data.append("receiver_id", receiver_id);
        
                axios.post('../includes/router.php', data)
                    .then(function (res) {
                        if (res.data.result === 'fetchData') {
                            // Update conversationData with new messages
                            vue.conversationData = res.data.data;
                        }
                    });
            };
        
            // Fetch initial data
            fetchConversationData();
        
            // Set up polling to fetch new data every 5 seconds (adjust as needed)
            const pollingInterval = 1000; // 1 sec request
            setInterval(fetchConversationData, pollingInterval);
        },        
        sendChat: function (loggedUserId) {
            const vue = this;
            const message = this.messageInput;
            var data = new FormData();
            
            // Determine sender and receiver based on conversationData
            const inboxId = vue.conversationData[0].inbox_id;
            const receiverId = vue.conversationData[0].receiver_id;
            const senderId = vue.conversationData[0].sender_id;
            
            const finalReceiver = receiverId === loggedUserId ? senderId : receiverId;
            const finalSender = senderId === loggedUserId ? senderId : receiverId;
            
            data.append("method", "sendChat");
            data.append("inbox_id", inboxId);
            data.append("sender_id", finalSender);
            data.append("receiver_id", finalReceiver);
            data.append("message", message);
            
            axios.post('../includes/router.php', data)
                .then(function (res) {
                    console.log(res.data);
                });
            
        
            // Clear the input field after sending the message
            this.messageInput = '';
        }
           
    },
    computed:{
        searchData(){
            if(!this.search){
                return this.inboxData;
            }
            return this.inboxData.filter(inbox => inbox.other_user_name.toLowerCase().includes(this.search.toLowerCase()) );
        }
    },
    created: function () {
        this.getInboxData();
    },
}).mount('#chat');