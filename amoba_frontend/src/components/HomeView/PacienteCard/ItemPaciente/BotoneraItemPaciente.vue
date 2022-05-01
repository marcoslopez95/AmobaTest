<template>
    <div class="flex gap-[18px]">
        <div
            class="
                border
                border-descripcion_variant
                hover:bg-red-600
                hover:cursor-pointer
                hover:text-white
                text-descripcion_variant
                p-[5px]
                rounded-[5px]
                w-[84px]
                h-[36px]
            "
            @click="modal = true"
        >
            <div class="px-[10px] py-auto">
                <div class="text-center">Borrar</div>
            </div>
            
        </div>
<TModal
                v-model="modal"
                :variants="variants"
                :classes="classes"
                :fixedClasses="fixedClasses"
                @closed="modal = false"
            >
                <div class="text-titulo text-xl text-center">
                    ¿Está seguro de eliminar el registro?
                </div>
                <div class="mt-[24px]">
                    <div class="flex justify-center gap-[10px]">
                        <div
                            class="
                                bg-descripcion_variant
                                hover:bg-link-hover hover:cursor-pointer
                                p-[5px]
                                rounded-[10px]
                                text-white
                                w-[66px]
                                h-[36px]
                            "
                            @click="modal=false"
                        >
                            <div class="px-[10px] my-auto">
                                <div class="text-center text-lg">No</div>
                            </div>
                        </div>

                        <div
                            class="
                                bg-red-500
                                hover:bg-red-600 hover:cursor-pointer
                                p-[5px]
                                rounded-[10px]
                                text-white
                                w-[66px]
                                h-[36px]
                            "
                            @click="Borrar()"
                        >
                            <div class="px-[10px] my-auto">
                                <div class="text-center text-lg">Sí</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" h-[45px]">

            <div
                    class="
                    mb-0
                    w-4/5
                   
                    ml-14
                        bg-red-100
                        border border-red-400
                        text-red-700
                        px-4
                        py-3
                        rounded
                    "
                    v-show="error.bool"
                    role="alert"
                >
                    <span class="block sm:inline"
                        >{{error.message}}</span
                    >
                    
                </div>
            </div>
            </TModal>
        <div
            class="
                bg-descripcion_variant
                hover:bg-link-hover hover:cursor-pointer
                p-[5px]
                rounded-[5px]
                text-white
                w-[66px]
                h-[36px]
            "
            @click="Mostrar()"
        >
            <div class="px-[10px] my-auto">
                <div class="text-center">Ver</div>
            </div>
        </div>
    </div>
</template>

<script>
import { EventBus } from "@/event-bus";
import { TModal } from "vue-tailwind/dist/components";
import axios from "axios";
/* eslint-disable */
export default {
    components: {
        TModal,
    },
    props: {
        id: Number,
    },
    data() {
        return {
            persona: "",
            modal: false,
            error:{
                bool : false,
                message: ''
            }
        };
    },
    methods: {
        mostrarModal() {
            EventBus.$emit("mostrar_modal_item", this.persona);
        },

        Borrar() {
            let url = "api/persons/" + this.id;
            axios
                .delete(url,{
                    headers: {
                        Authorization:
                            "Bearer " + localStorage.getItem("token"),
                    },
                })
                .then((response) => {
                    let data = response.data;
                    console.log("ok_borrado", data);
                    EventBus.$emit('reload_uno');
                })
                .catch((error) => {
                    let e = error.response.data;
                    console.log("error_borrado", e);
                });
        },
        Mostrar() {
            let url = "api/persons/" + this.id;
            axios
                .get(url, {
                    headers: {
                        Authorization:
                            "Bearer " + localStorage.getItem("token"),
                    },
                })
                .then((response) => {
                    this.error.bool = false
                    this.error.message = ''
                    let data = response.data;
                    this.persona = data.data;
                    //console.log('mostrar',this.persona);
                    this.mostrarModal();
                    console.log("ok_mostrar", data);
                })
                .catch((error) => {
                    let e = error.response.data;
                    this.error.bool = true
                    this.error.message = e.message
                    console.log("error_mostrar", e);
                });
        },
    },
};
</script>

<style>
</style>