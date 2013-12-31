<template>
    <div class="relative h-10 m-1">
       <div style="border-top: 1px solid #e6e6e6" class="grid grid-cols-6">
          <input type="text" v-model="message" @keyup.enter="sendMessage()" placeholder="say something ..." class="col-span-5 focus:outline-none p-1">
          <button @click="sendMessage()" class="bg-blue">Send</button>
       </div>
    </div>
</template>

<script>
export default {
        props:[
            'room'
        ],
    data:function (){
            return{
                message:''
            }
    },
    methods:{
      sendMessage(){
          if (this.message == ''){
              return ;
          }

          axios.post('/chat/room/' + this.room.id + '/message',{
              message: this.message
          }).then(response =>{
              this.messages = ''
              if (response.status == 201){
                  this.messages = ''
                  this.emit('messageSent');
              }
          }).catch(error => {
              console.log(error);
          })
      }
    }
}
</script>
