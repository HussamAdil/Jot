<template>
            <div class="rounded-full border border-gray-400 text-white bg-blue-400 w-10 h-10 flex justify-center items-center">
           {{ Userletters }}
          </div>
</template>

<script>
export default {
props:['name'],
computed:{
    Userletters()
    {
        return this.name.match(/[A-Z]/g).slice(0.2).join('')

    }
}
}
</script>

<style>

</style>