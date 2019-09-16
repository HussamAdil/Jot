<template>
<div>
    <div v-if="focus" @click="focus = false" class="bg-black opacity-25 absolute right-0 left-0 top-0 bottom-0 z-10">

    </div>
    <div class="absolute z-10">
        <i class="fa fa-pen"></i>
    </div>
    <div class="relative">
 <input class="w-64 border focus:outline-none focus:bg-gray-100 focus:border-blue-500 border-gray-400 pl-8 pr-3 py-1 rounded-full bg-gray-300 mr-5" 
   type="text" placeholder="search ..."  v-model="searchTerm"  @input="search" id="searchTerm" @focus="focus = true">

<div v-if="focus" class="absolute w-96  bg-blue-900 text-white rounded-lg p-4 right-0   mr-6 mt-2 shadow z-20 ">
    <div v-if="results == 0 ">
            No result found '{{ searchTerm }}'
    </div>
    <div v-for="result in results" :key="result.data.contact_id" @click="focus = false" >
            <router-link :to="result.links.self" class="block py-2">
                 <div class="flex items-center">
                     <UserCircle :name="result.data.name"></UserCircle>
                     <div class="pl-3">
                         <p>{{ result.data.name}}</p>
                         <p>{{ result.data.company}}</p>
                     </div>
                 </div>
            </router-link>
    </div>

</div>
    </div>
 
    </div>
 

</template>

<script>
import  UserCircle from './UserCircle' 
import _ from 'lodash';

export default {
    components:{UserCircle},
data:function(){
    return {
        searchTerm:'',
        focus:false,
        results:[],
        
    }
},
methods:{
    search:_.debounce(
        function()
    {
        if (this.searchTerm.length < 3 ){
            return ;
        }
        axios.post('/api/search' , {searchTerm:this.searchTerm})
        .then(response => {
            this.results = response.data.data
        })
        .catch(error => {

        })
    } , 300)
}
}
</script>

<style>

</style> 