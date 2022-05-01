<template>
    <div>
        <div class="mt-0 ml-0 flex w-[212px] bg-container rounded-[20px] p-[5px]">
            <div class="font-medium bg-link rounded-[20px] text-white text-center w-[96px]">
                Citas
            </div>
            <div class="font-medium rounded-[20px] text-link text-center w-[96px]">
                Consultas
            </div>
        </div>
        <div class="mt-[24px] px-[12px] flex justify-between">
            <div>
                <span class=" h-[36px] text-link font-medium p-[10px]">Día</span> 
                <span class="font-extrabold text-descripcion_variant mx-[5px]">|</span>
                <span class="font-medium text-descripcion_variant p-[10px] h-[36px]">Mes</span>
            </div>
            <div class="flex w-[187px] items-center">
                <div>
                    <flecha-menor />
                </div>
                <div class="font-medium text-descripcion_variant mx-auto my-auto">
                    08.ABR.2022
                </div>
                <div>
                    <flecha-mayor />
                </div>
            </div>
        </div>
        <hr class="text-descripcion mt-[12px]">
    </div>
</template>

<script>
import FlechaMayor from '../Iconos/FlechaMayor.vue'
import FlechaMenor from '../Iconos/FlechaMenor.vue'
export default {
  components: { FlechaMenor, FlechaMayor },

}
</script>

<style>
</style>