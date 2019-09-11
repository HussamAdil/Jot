 <template>
 <div>
     <div v-if="loading">

     </div>
     <div v-else>
              
    <div class="flex justify-between">
        <div class="text-blue-500">
          back  
        </div>
        <div>
           <router-link :to="'contact/' + contact.contact_id + '/edit'"  class="rounded  py-2 px-4 text-green-500 border border-green-500">Edit</router-link>
           <a href="" class="rounded  py-2 px-4 text-red-500 border border-red -500"> Delete</a>
         </div>
    </div> 
    <div class="flex items-center pt-6">
         <UserCircle :name="contact.name"></UserCircle>

        <p class="pl-5 text-xl">{{contact.name}}</p>
    </div>   
        <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Email</p>
        <p class="pt-2 text-blue-400 ">{{contact.email}}</p>

        <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Company</p>
        <p class="pt-2 text-blue-400 ">{{contact.company}}</p>
        
         <p class="pt-6 text-gray-600 font-bold uppercase text-sm">birthday</p>
        <p class="pt-2 text-blue-400 ">{{contact.birthday}}</p>
     
     </div>
 </div>
</template>

<script>
 import UserCircle from '../reusable/UserCircel'

export default {
    components:{UserCircle},
  
    mounted(){
        axios.get('/api/contacts/'+this.$route.params.id)
        .then(response => {
            this.contact = response.data.data
             this.loading  = false
        })
        .catch(error => {
            this.loading  = false
        })
    },
    data:function()
    {
        return {
            contact:null,
            loading:true
        }
    }
}
</script>

<style>

</style>