<template>
    <div>
        <div>
            <h3 >Talk With Support</h3>
        </div>
        <hr>
        <div class="chat-container" v-chat-scroll>
            <p class="chat chat-left">
                Hello! How may I help you?
            </p>
            <div v-for="(message, index) in messages" :key="index">
                <p class="chat chat-left" v-if="message.msg_by === '1'">
                    {{ message.message }}
                </p>
                <p class="chat chat-right" v-else>   
                    {{ message.message }}                             
                </p>
            </div>
        </div>
        <hr>
        <div class="row form-group">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <input
                    @keyup.enter="sendMessage"
                    v-model="newMessage"
                    type="text"
                    name="message"
                    placeholder="Message..."
                    autocomplete="false"
                    class="form-control"
                    style="height: 35px;"
                >
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <button type="submit" @click="sendMessage" class="btn form-control"><span class="fa fa-paper-plane-o"></span></button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        name: "support-chat-component",  // using EXACTLY this name is essential

        props:['front_user', 'admin'],

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
            axios.get('/get/support-chat/msgs').then(response => {
                this.messages = response.data;
            });

            window.setInterval(() => {
                axios.get('/get/support-chat/msgs').then(response => {
                    this.messages = response.data;
                });
            },1000);
            
        },

        methods: {

            sendMessage() {
                axios.post('/send/support-chat/msgs', {
                    front_user: this.front_user,
                    to_id: this.admin,
                    message: this.newMessage
                });
                this.newMessage = '';

                axios.get('/get/support-chat/msgs').then(response => {
                    this.messages = response.data;
                });
            }
        }
    }
</script>
