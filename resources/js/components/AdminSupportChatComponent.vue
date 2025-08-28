<template>
    <div>
        <div class="chat-container" v-chat-scroll>
            <div v-for="(message, index) in messages" :key="index">
                <p class="chat chat-right" v-if="message.msg_by === '1'">
                    {{ message.message }}
                </p>
                <p class="chat chat-left" v-else>   
                    {{ message.message }}                             
                </p>
            </div>
        </div>
        <hr>
        <div class="row-fluid">
            <div>
                <button type="submit" @click="sendMessage" class="btn form-control">Send</button>
            </div>
            <div >
                <input
                    @keyup.enter="sendMessage"
                    v-model="newMessage"
                    type="text"
                    name="message"
                    placeholder="Message..."
                    autocomplete="false"
                    style="height: 32px;"
                    class="text-input"
                >
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        name: "admin-support-chat-component",  // using EXACTLY this name is essential

        props:['support_chat_room_id', 'admin'],

        data() {
            return {
                messages: [],
                newMessage: '',
                users:[],
                activeUser: false,
                typingTimer: false,
                timer: '',
            }
        },

        ready(){

            this.timer = setInterval(this.created, 1000); 
            window.setInterval(() => {
                this.created();
            },1000);
            

            Echo.join('support-chat')
                .listen('SupportMsgSend',(event) => {
                    this.messages.push(event.data);
                })
        },

        created() {
            axios.get('/admin/support-chat/msgs/get/'+this.support_chat_room_id).then(response => {
                this.messages = response.data;
            });

            window.setInterval(() => {
                axios.get('/admin/support-chat/msgs/get/'+this.support_chat_room_id).then(response => {
                    this.messages = response.data;
                });
            },1000);
        },

        methods: {

            sendMessage() {
                axios.post('/admin/support-chat/msgs/send', {
                    support_chat_room_id: this.support_chat_room_id,
                    message: this.newMessage
                });
                this.newMessage = '';

                axios.get('/admin/support-chat/msgs/get/'+this.support_chat_room_id).then(response => {
                    this.messages = response.data;
                });
            }
        }
    }
</script>
