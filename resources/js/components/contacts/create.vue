<template>
  <div>
    <form>
      
      <div class="relative pb-5 ">
        <label for="name" class="absolute pt-2 text-blue-500 uppercase text-xs font-bold"> Contact Name</label>
        <input id="name" type="text" class="text-gray-900 focus:outline-none focus:border-blue-400  pt-8 w-full border-b pb-2 " >
      </div>

      <div class="flex justify-end">
          <button class=" py-2 px-4 rounded text-red-700 mr-5 border hover:border-red-700"> cancel</button>
           <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-400"> Add New Contact</button>
      </div>

    </form>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>