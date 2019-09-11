<template>
   <div class="relative pb-5 ">
        <label :for="name" class="absolute pt-2 text-blue-500 uppercase text-xs font-bold"> {{ label}} </label>
        <input :placeholder="placeholder" :id="name" type="text" 
              class="text-gray-900 focus:outline-none focus:border-blue-400  pt-8 w-full border-b pb-2 "
                @input="UpdateField()" v-model="value" :class="errorClassObject()"
           >
           <p class="pt-2 text-red-600 text-sm " v-text="errorMessage()">errors here </p>
      </div>
</template>

<script>
export default {
    name:"InputField",
props:['name' , 'label' , 'placeholder' ,'errors','data'],
data:function(){
    return {

            value:''
    }
},
computed:{
    hasError:function()
        {
            return  this.errors && this.errors[this.name] && this.errors[this.name].length > 0 
        }

}
,
watch:
{
    data:function(val)
    {
        this.value = val
    }
},
methods:{
    UpdateField:function()
    {   
        this.clearError(this.name)
        this.$emit('update:field' , this.value)
    },
    errorMessage:function()
    {
            if(this.hasError)
            {
                return this.errors[this.name][0]
            }
    },
        clearError:function()
    {
            if(this.hasError)
            {
                return this.errors[this.name]= null
            }
    },
    errorClassObject:function()
    {
        return {
            'error-field':this.hasError
        }
    }
},

}
</script>

<style>
.error-field {
    @apply .border-red-500 .border-b-2
}
</style>