<template>
    <div class="h-96 w-full">
        <div class="h-full p-2 flex flex-col-reverse overflow-scroll">
           <div v-for="mes in message" :key="mes.index">
               {{mes.user.name}} :  {{mes.message}}
           </div>
        </div>
    </div>
</template>

<script>
import messageItem from "./messageItem";
export default {
    components:{messageItem},
      props:[
          'message'
      ]
}
</script>
