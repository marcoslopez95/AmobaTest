<template>
    <div
        class="
            grid grid-row-1 grid-flow-col
            fixed
            px-[24px]
            top-[136px]
            left-[614px]
            w-[778px]
            ml-[24px]
        "
    >
        <div class="flex gap-5 basis-1/3">
            <PersonIcon />
            <span
                class="text-titulo cursor-pointer hover:text-link-hover"
                data-modal-toggle="defaultModal"
                @click="mostrarModal()"
            >
                Nuevo Paciente
            </span>
            <TModal
                v-model="show_modal"
                :variants="variants"
                :classes="classes"
                :fixedClasses="fixedClasses"
                @closed="cerrarModal()"
                >
                <CardCrearPaciente @cerrar="cerrarModal"/>
                </TModal
            >
        </div>
        <div class="flex gap-5 basis-1/3">
            <ListIcon />
            <span class="text-link cursor-pointer hover:text-link-hover"
                >Historias Clínicas</span
            >
        </div>
        <div class="flex gap-5 basis-1/3">
            <CalendarIcon />
            <span class="text-titulo cursor-pointer hover:text-link-hover"
                >Agenda</span
            >
        </div>
    </div>
</template>

<script>
import PersonIcon from "./Iconos/PersonIcon.vue";
import ListIcon from "./Iconos/TablaListIcon.vue";
import CalendarIcon from "./Iconos/CalendarIcon.vue";
import { TModal } from "vue-tailwind/dist/components";
import { EventBus } from "@/event-bus";
import CardCrearPaciente from "./MenuPacientes/CardCrearPaciente.vue";

export default {
    components: { PersonIcon, ListIcon, CalendarIcon, TModal, CardCrearPaciente },
    data() {
        return {
            show_modal: false,
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
        };
    },
    methods:{
        mostrarModal(){
            EventBus.$emit('degrad')
            EventBus.$emit('ocultar_select')
            this.show_modal = true
        },
        cerrarModal(){
            this.show_modal = false
            EventBus.$emit('show_degrad')
            EventBus.$emit('mostrar_select')
        }
        
    }
};
</script>

<style>
</style>