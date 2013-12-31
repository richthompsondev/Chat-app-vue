<template>
    <div>
        <div class="grid grid-cols-6">
            <div class="font-bold text-xl">
                {{selected.name}} chat
            </div>
            <select v-model="selected" @change="$emit('roomchanged',selected)" style="float: right">
                <option v-for="room in rooms" :key="room.index" :value="room">
                    {{room.name}}
                </option>
            </select>
        </div>
    </div>
</template>

<script>
export default {
   props:['rooms','currentRoom'],
    data:function (){
       return {
           selected:''
       }
    },
    created() {
       this.selected = this.currentRoom;
    }
}
</script>
