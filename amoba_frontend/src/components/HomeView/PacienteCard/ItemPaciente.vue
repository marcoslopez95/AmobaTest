<template>
    <div class="border-t border-[#DAE1F2]">
        <div class="px-[24px] py-[19px] flex justify-between">
            <div class="">
                <div class="items-center flex gap-[48px]">
                    <!-- Avatar -->
                    <div>
                        <img :src="paciente.avatar" width="50" heigth="50" class="rounded-full border" />
                    </div>

                    <!-- Nombre -->
                    <div class="text-titulo">{{paciente.first_name}} {{paciente.last_name}}</div>

                    <!-- Documento -->
                    <div class="text-descripcion">{{paciente.document}}</div>
                </div>
            </div>
            <!-- Botonera -->
            <BotoneraItemPaciente class="items-center" :id="paciente.id" />
        </div>
    </div>
</template>

<script>
import BotoneraItemPaciente from "./ItemPaciente/BotoneraItemPaciente.vue";
export default { 
    components: { BotoneraItemPaciente } ,
props:{
    paciente: Object
},
mounted(){
   // console.log('paciente',this.paciente)
}
};

</script>

<style>
</style>