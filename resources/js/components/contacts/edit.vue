<template>
  <div>
    <form @submit.prevent="submitForm()">

    <div class="flex justify-between">
        <div class="text-black-500 bg-gray-200 py-1 px-2">
          <a href="#" @click="$router.back()">back</a>  
        </div>
    </div>
      <inputField name="name" label="Contact Name" 
      placeholder="Your Name" @update:field="form.name = $event " :errors="errors" :data="form.name"></inputField>

      <inputField name="email" label="Contact Email"
       placeholder="Your Cmail" @update:field="form.email = $event " :errors="errors" :data="form.email"></inputField>

      <inputField name="company" label="Contact Company" 
       placeholder="Your Company" @update:field="form.company = $event " :errors="errors" :data="form.company"></inputField>

      <inputField name="birthday" label="Contact Birthday" 
      placeholder="MM\DD\YYYY" @update:field="form.birthday = $event " :errors="errors" :data="form.birthday"></inputField>

      <div class="flex justify-end">
          <button class=" py-2 px-4 rounded text-red-700 mr-5 border hover:border-red-700"> Cancel</button>
           <button class="bg-green-500 text-white py-2 px-4 rounded hover:bg-blue-400"> Sava </button>
      </div>

    </form>
  </div>
</template>

<script>
import inputField from '../InputField'
export default {
components:{inputField},
    mounted(){
        axios.get('/api/contacts/'+this.$route.params.id)
        .then(response => {
            this.form = response.data.data
             this.loading  = false
        })
        .catch(error => {
            this.loading  = false
            if( error.response.status === 404)
            {
                this.$router.push('/contacts');
            }
        })
    },
data:function(){
  return {
      form : {
        'name' : ''  ,
        'email' : ''  ,
        'company' : ''  ,
        'birthday' : ''  ,
      } ,
      errors :null
  }
},
methods:{
  submitForm:function()
  {
    axios.patch('/api/contacts/' + this.$route.params.id , this.form)
    .then(response => {
        console.log(response)
        this.$router.push(response.data.links.self);
        })
    .catch(errors => {
      this.errors = errors.response.data.errors
    })

  }
}
}
</script>

<style>

</style>