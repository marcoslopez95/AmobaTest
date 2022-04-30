<template>
  <input
          class="
            border
            rounded-[10px]
            w-full
            drop-shadow-[0px_0px_1px_rgba(0,0,0,0.25)]
            h-[40px]
            px-[12px]
            py-[14px]
            focus:outline-none
            focus:border-sky-500 focus:ring-1 focus:ring-sky-500
          "
          :type="type"
          :placeholder="placeholder"
        />
</template>

<script>
export default {
    name:'input-custom',
    props:{
        placeholder: {type: String, default:'Ingrese...'},
        type: {type:String,default:'text'}
    }
}
</script>

<style>

</style>