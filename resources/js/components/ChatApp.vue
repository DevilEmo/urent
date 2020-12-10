<template>
    <div class="chat-app">
        <Coversation :contact="selectedContact" :message="messages"/>
        <ContactList :contacts="contacts"/>
    </div>
</template>


<script>
import Conversation from "./Conversation";
import ContactList from "./ContactList";

export default {
        name:"chat-app",
        props:{
            user:{
                type: Object,
                required: true
            }
        },
        data(){
            return{
                contact:null,
                message:[],
                contacts:[]
            }
        },
        mounted() {
            console.log(this.user);
            axios.get('/contacts')
            .then((response)=>{
                console.log(response.data);
                this.contacts = response.data;
            });
        },
        components: {
            'ContactList':ContactList,
            'Conversation':Conversation,
        }
    }
</script>
