<template>
  <div>
    <form @submit.prevent="submitForm()">

     
      <inputField name="name" label="Contact Name" 
      placeholder="Your Name" @update:field="form.name = $event " :errors="errors"></inputField>

      <inputField name="email" label="Contact Email"
       placeholder="Your Cmail" @update:field="form.email = $event " :errors="errors"></inputField>

      <inputField name="company" label="Contact Company" 
       placeholder="Your Company" @update:field="form.company = $event " :errors="errors"></inputField>

      <inputField name="birthday" label="Contact Birthday" 
      placeholder="MM\DD\YYYY" @update:field="form.birthday = $event " :errors="errors"></inputField>

      <div class="flex justify-end">
          <button class=" py-2 px-4 rounded text-red-700 mr-5 border hover:border-red-700"> cancel</button>
           <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-400"> Add New Contact</button>
      </div>

    </form>
  </div>
</template>

<script>
import inputField from '../InputField'
export default {
components:{inputField},
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
    axios.post('/api/contacts' , this.form)
    .then(response => {

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