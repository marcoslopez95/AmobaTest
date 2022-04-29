<template>
  <div class="w-[658px] h-[591px] mt-[164px] p-[48px] mx-auto bg-gradient-to-t from-[#EEF0F6] to-white rounded-[20px]">
      <div class="font-medium text-xl text-center text-[#3D465B]">
          INICIAR SESIÓN
      </div>
      <div class="px-[48px]">

      <div class=" flex justify-center py-[24px]">
          <ico-google />
          <ico-linkedin class="ml-[24px]"/>
      </div>
      <div class="flex justify-center items-center">
          <linea-separador></linea-separador>
          <div class="mx-[10px] w-[148.67px] text-center text-[#7C8498]">
          o inicia con
          </div>
          <linea-separador></linea-separador>
      </div>
      </div>
  </div>
</template>

<script>
import IcoGoogle from './Iconos/IcoGoogle.vue'
import IcoLinkedin from './Iconos/IcoLinkedin.vue'
import LineaSeparador from './Iconos/LineaSeparador.vue'
export default {
  components: { 
    IcoGoogle,
    IcoLinkedin,
    LineaSeparador,
},

}
</script>

<style>

</style>