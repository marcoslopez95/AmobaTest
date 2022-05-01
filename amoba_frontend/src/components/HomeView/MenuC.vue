<template>
    <div class="ml-0 my-auto w-[118px] gap-[44px]">
        <div class="px-[18.5px] py-[10px]">
            <div class="text-center text-link cursor-pointer to-link-hover">
                <home-icon class="mx-auto mb-[14px]" />
                Inicio
            </div>
        </div>
        <div class="px-[18.5px] py-[10px] mt-[54px]">
            <div class="text-center text-titulo cursor-pointer hover:text-link-hover">
                
                <ConfigurationIcon h="30" w="30" class="mx-auto mb-[14px]" />
                Configurar
            </div>
        </div>
        <div class="px-[18.5px] py-[10px] mt-[54px]">
            <div class="text-center text-titulo cursor-pointer hover:text-link-hover">
                <PlanIcon class="mx-auto mb-[14px]"/>
                Plan
            </div>
        </div>
    </div>
</template>

<script>
import HomeIcon from './Iconos/HomeIcon.vue'
import PlanIcon from './Iconos/PlanIcon.vue'
import ConfigurationIcon from './Iconos/ConfigurationIcon.vue'
export default {
    components: { HomeIcon, PlanIcon,  ConfigurationIcon },

}
</script>

<style>
</style>