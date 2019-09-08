<template>
  <div class="h-screen bg-white">
      <div class="flex">
        <div class="pl-6 bg-gray-200 w-48 h-screen border-r-2 border-gray-400">
         <nav class="pt-4">
           <router-link to="/">
                 <h1>Logo</h1>
           </router-link>
                  <p class="pt-12 text-gray-500 text-xs uppercase font-bold">Create</p>
                  <router-link to="/contacts/create" class="flex items-center py-2 hover:text-blue-600">
                    <div> + </div> <div class="pl-3"> Add New </div>
                  </router-link>

              <p class="pt-12 text-gray-500 text-xs uppercase font-bold">Create</p>
                  <router-link to="/" class="flex items-center py-2 hover:text-blue-600">
                    <div> + </div> <div class="pl-3"> Contacts</div>
                  </router-link>

                  <router-link to="/" class="flex items-center py-2 hover:text-blue-600">
                    <div> + </div> <div class="pl-3"> Birthdays </div>
                  </router-link>

                     <p class="pt-12 text-gray-500 text-xs uppercase font-bold">Settings</p>
                  <router-link to="/" class="flex items-center py-2 hover:text-blue-600">
                    <div> + </div> <div class="pl-3"> Logout </div>
                  </router-link>
                   
         </nav>
      </div>
      <div class="flex flex-col flex-1 h-screen overflow-y-hidden">
        <div class="h-16 px-6 border-b   border-gray-400 flex items-center justify-between">
          <div>
            Contacts
          </div>
          <div class="rounded-full border border-gray-400 text-white bg-blue-400 w-10 h-10 flex justify-center items-center">
            VG
          </div>
        </div>
        <div class="flex flex-col overflow-y-hidden flex-1">
        <router-view class=" p-6  overflow-x-hidden ">s</router-view>

        </div>
      </div>
      </div>
        <router-view></router-view>
  </div>
  
</template>

<script >
     export default {
       name:"App",
       props:['user'],
       mounted(){
         window.axios.interceptors.request.use(
           (config) => {
             config.data = {
               ...config.data,
               api_token : this.user.api_token
             };
             return config
           }
         )
       }
     }
</script>
<style scoped>

</style>