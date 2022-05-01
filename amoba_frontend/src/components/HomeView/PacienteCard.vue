<template>
    <div
        class="bg-white w-[778px] h-[726px] mt-[137px] ml-[24px] rounded-[16px]"
    >
        <CabeceraPacienteCard />
        <div class="overflow-y-auto h-[592px]">
            <ItemPaciente v-for="(paciente,i) in pacientes[0]" :key="i" :paciente="paciente" />
        </div>
        <div
        v-show="degradado"
            class="
                right-[48px]
                bottom-[48px]
                bg-gradient-to-t
                from-white
                h-[110px]
                w-[756px]
                absolute
                rounded-[20px]
            "
        ></div>
    </div>
</template>

<script>
import { EventBus } from "@/event-bus";
import CabeceraPacienteCard from "./PacienteCard/CabeceraPacienteCard.vue";
import ItemPaciente from "./PacienteCard/ItemPaciente.vue";
export default {
    components: { CabeceraPacienteCard, ItemPaciente },
    props:{
        pacientes: Array
    },
    data(){
        return {
            degradado: true,

        }
    },
    mounted(){
        EventBus.$on('degrad',this.ocultarDegrad)
        EventBus.$on('show_degrad',this.mostrarDegrad)
        
    },
    methods:{
        ocultarDegrad(){
            this.degradado = false
        },
        mostrarDegrad(){
            this.degradado = true
        }
    }
};
</script>

<style>
</style>