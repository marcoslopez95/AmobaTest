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

            <TModal
                v-model="show_modal_mod"
                :variants="variants"
                :classes="classes"
                :fixedClasses="fixedClasses"
                @closed="cerrarModal()"
                >
                <CardUpdatePaciente :persona="persona" @cerrar_modal="CerrarModal"/>
                </TModal
            >
    </div>
</template>

<script>
import { EventBus } from "@/event-bus";
import CabeceraPacienteCard from "./PacienteCard/CabeceraPacienteCard.vue";
import ItemPaciente from "./PacienteCard/ItemPaciente.vue";
import { TModal } from "vue-tailwind/dist/components";
import CardUpdatePaciente from "./MenuPacientes/CardUpdatePaciente.vue";
export default {
    components: { CabeceraPacienteCard, ItemPaciente, TModal, CardUpdatePaciente },
    props:{
        pacientes: Array
    },
    data(){
        return {
            persona: '',
            degradado: true,
show_modal_mod: false,
            fixedClasses: {
                overlay:
                    "z-40  overflow-auto scrolling-touch left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-opacity-50",
                wrapper: "relative mx-auto z-50 max-w-lg px-3 py-12",
                modal: "overflow-visible relative  rounded",
                body: "p-3",
                header: "border-b p-3 rounded-t",
                footer: " p-3 rounded-b",
                close: "flex items-center justify-center rounded-full absolute right-0 top-0 -m-3 h-8 w-8 transition duration-100 ease-in-out focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50",
            },
            classes: {
                overlay: "bg-black",
                wrapper: "",
                modal: "bg-white shadow",
                body: "p-3",
                header: "border-gray-100",
                footer: "bg-gray-100",
                close: "bg-gray-100 text-gray-600 hover:bg-gray-200",
                closeIcon: "fill-current h-4 w-4",
                overlayEnterClass: "opacity-0",
                overlayEnterActiveClass: "transition ease-out duration-100",
                overlayEnterToClass: "opacity-100",
                overlayLeaveClass: "opacity-100",
                overlayLeaveActiveClass: "transition ease-in duration-75",
                overlayLeaveToClass: "opacity-0",
                enterClass: "",
                enterActiveClass: "",
                enterToClass: "",
                leaveClass: "",
                leaveActiveClass: "",
                leaveToClass: "",
            },
            variants: {
                danger: {
                    overlay: "bg-red-100",
                    header: "border-red-50 text-red-700",
                    close: "bg-red-50 text-red-700 hover:bg-red-200 border-red-100 border",
                    modal: "bg-white border border-red-100 shadow-lg",
                    footer: "bg-red-50",
                },
            },
        }
    },
    mounted(){
        EventBus.$on('mostrar_modal_item',this.mostrarModal)
        EventBus.$on('ocultar_modal_item',this.cerrarModal)
        EventBus.$on('degrad',this.ocultarDegrad)
        EventBus.$on('show_degrad',this.mostrarDegrad)
        
    },
    methods:{
        cerrarModal(){
            this.show_modal_mod = false
            EventBus.$emit('show_degrad')
            EventBus.$emit('mostrar_select')
        },
        mostrarModal(persona){
            console.log(persona);
            this.show_modal_mod = true
            this.persona = persona
            EventBus.$emit('show_degrad')
            EventBus.$emit('mostrar_select')
        },
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