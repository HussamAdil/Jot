 <template>
 <div>
     <div v-if="loading">

     </div>
     <div v-else>
              
    <div class="flex justify-between">
        <div class="text-blue-500">
          back  
        </div>
        <div class="relative">
           <router-link :to="'contact/' + contact.contact_id + '/edit'"  class="rounded  py-2 px-4 text-green-500 border border-green-500">Edit</router-link>
           <a href="#" class="rounded  py-2 px-4 text-red-500 border border-red -500"
           @click="modal = ! modal"> Delete</a>
           <div v-if="modal" class="absolute bg-blue-900 text-white rounded z-20 p-8 w-64 right-0 mt-2 mr-6">
               <p>Are You Sure ? </p>
               <div class="flex items-center mt-6 justify-end ">
                   <button @click="modal = ! modal" class="text-white px-3 py-1 mr-2 bg border border-white">Cancel</button>
                   <button  @click="destroy()" class="px-4 py-2 bg-red-500 rounded text-sm font-bold">Delete</button>
               </div>
           </div>
         </div>
    <div @click="modal = ! modal"  v-if="modal" class="z-10 bg-black opacity-50 absolute  right-0 left-0 top-0 bottom-0 ">

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
            if( error.response.status === 404)
            {
                this.$router.push('/contacts');
            }
        })
    },
    data:function()
    {
        return {
            contact:null,
            loading:true,
            modal:false
        }
    },
    methods:{
        destroy(){
            axios.delete('/api/contacts/'+ this.$route.params.id)
            .then(response => {
                this.$router.push('/contacts')
                
            })
            .catch(error=> {
                alert('Error Try Again')
                
            })
        }
    }
}
</script>

<style>

</style>