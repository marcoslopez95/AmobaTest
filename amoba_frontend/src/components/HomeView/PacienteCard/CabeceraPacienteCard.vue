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
                        <option>Nombre</option>
                        <option>Apellido</option>
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
            mostrar_select: true
        }
    },
    methods:{
        ocultarSelect(){
            this.mostrar_select = false
        },
        mostrarSelect(){
            this.mostrar_select = true
        }
    }
};
</script>

<style>
</style>