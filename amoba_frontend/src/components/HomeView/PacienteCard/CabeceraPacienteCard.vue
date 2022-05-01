<template>
    <div class="p-[24px] gap-[10px] flex justify-between">
        <div class="w-[457px]">
            <div
                class="
                    rounded-[10px]
                    border
                    shadow-[0_1px_5px_0_rgba(0,0,0,.24)]
                    py-[7px]
                    px-[14px]
                    gap-[10px]
                    h-[39px]
                    flex
                "
            >
                <div class="flex">
                    <select
                    v-show="mostrar_select"
                    v-model="campo"
                        class="
                            border-transparent
                            bg-transparent
                            ring-transparent
                            drop-shadow-none
                            pr-[7px]
                            gap-[10px]
                            w-[110px]
                            h-[35px]
                            mt-[-7px]
                            text-descripcion
                        "
                    >
                        <option value="first_name">Nombre</option>
                        <option value="last_name">Apellido</option>
                    </select>
                    <div class="ml-[10px]">
                        <svg
                            width="2"
                            height="25"
                            viewBox="0 0 2 25"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path d="M0.749207 0V25" stroke="#ACBADC" />
                        </svg>
                    </div>
                    <div>
                        <input
                            type="text"
                            v-model="valor"
                            class="
                             h-[35px]
                            mt-[-7px]
                            w-[314px]
                            rounded-[10px]
                                border-transparent
                                bg-transparent
                                ring-transparent
                                outline-0
                                text-descripcion
                                ml-[7px]
                            "
                        />
                    </div>
                    <div class="hover:cursor-pointer" @click="buscar">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
</svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-auto">
            <div class="flex gap-[20px]">
                <CompactIcon />
                <ListIcon />
            </div>
        </div>
    </div>
</template>

<script>
import { EventBus } from "@/event-bus";
import CompactIcon from "../Iconos/CompactIcon.vue";
import ListIcon from "../Iconos/ListIcon.vue";
export default { components: { CompactIcon, ListIcon },
    mounted(){
        EventBus.$on('ocultar_select',this.ocultarSelect)
        EventBus.$on('mostrar_select',this.mostrarSelect)
    },
    data(){
        return {
            mostrar_select: true,
            campo:'first_name',
            valor: '',
            filtro:{}
        }
    },
    methods:{
        ocultarSelect(){
            this.mostrar_select = false
        },
        mostrarSelect(){
            this.mostrar_select = true
        },
        buscar(){
            this.filtro[this.campo] = this.valor
            EventBus.$emit('filtro',this.filtro)
        }
    }
};
</script>

<style>
</style>