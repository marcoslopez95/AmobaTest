<template>
    <div class="flex gap-[18px]">
        <div
            class="
                border
                border-descripcion_variant
                text-descripcion_variant
                p-[5px]
                rounded-[5px]
                w-[84px]
                h-[36px]
            "
        >
            <div class="px-[10px] py-auto">
                <div class="text-center">Borrar</div>
            </div>
        </div>
        <div
            class="
                bg-descripcion_variant
                p-[5px]
                rounded-[5px]
                text-white
                w-[66px]
                h-[36px]
            "
        >
            <div class="px-[10px] my-auto">
                <div class="text-center">Ver</div>
            </div>
        </div>
    </div>
</template>

<script>
/* eslint-disable */
export default {
    props: {
        id: Number,
    },
    methods: {
        Borrar() {
            let url = "/persons/" + this.id;
            axios
                .delete(url)
                .then((response) => {
                    let data = response.data;
                    console.log("ok_borrado", data);
                })
                .catch((error) => {
                    let e = error.response.data;
                    console.log("error_borrado", e);
                });
        },
        Mostrar() {
            let url = "/persons/" + this.id;
            axios
                .get(url)
                .then((response) => {
                    let data = response.data;
                    console.log("ok_mostrar", data);
                })
                .catch((error) => {
                    let e = error.response.data;
                    console.log("error_mostrar", e);
                });
        },
    },
};
</script>

<style>
</style>