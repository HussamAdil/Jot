<template>
   <div class="relative pb-5 ">
        <label :for="name" class="absolute pt-2 text-blue-500 uppercase text-xs font-bold"> {{ label}} </label>
        <input :placeholder="placeholder" :id="name" type="text" 
              class="text-gray-900 focus:outline-none focus:border-blue-400  pt-8 w-full border-b pb-2 "
                @input="UpdateField()" v-model="value"
           >
      </div>
</template>

<script>
export default {
    name:"InputField",
props:['name' , 'label' , 'placeholder'],
data:function(){
    return {

            value:''
    }
},
methods:{
    UpdateField:function()
    {   
        this.$emit('update:field' , this.value)
    }
}
}
</script>

<style>

</style>