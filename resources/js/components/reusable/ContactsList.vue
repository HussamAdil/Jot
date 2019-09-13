<template>
  <div>
      <div v-if="loading"> loading</div>
      <div v-else>
          <p v-if="contacts.length === 0">You Don't hava contacts Yet!</p>
          <div v-for="contact in contacts" :key="contact.contact_id">
              
              <router-link class="flex items-center border-b border-gray-400 p-4 hover:bg-gray-200  " :to="'/contacts/' + contact.data.contact_id ">
              <UserCircel  :name="contact.data.name"></UserCircel>
                 <div class="pl-4">
                 <p class="text-blue-400"> {{ contact.data.name}} </p>  
                <p class="text-gray-400"> {{ contact.data.company}} </p>  
              </div>
              </router-link>
          </div>
      </div>
  </div>
</template>
<script>
import UserCircel from '../reusable/UserCircel'
export default {
components:{UserCircel},
props:['endpoint'],
    mounted(){
        axios.get(this.endpoint)
        .then(response => {
            this.contacts = response.data.data
            this.loading = false
        })
        .catch( error => {
            alert('Error From Server ')
        })
    },
data:function(){
    return {
        contacts:null ,
        loading:true
    }
}
}
</script>

<style>

</style>