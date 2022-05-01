<template>
    <div
        class="
            bg-white
            rounded-[16px]
            p-[24px]
            w-[448px]
            h-[864px]
            left-[142px]
        "
    >
        <cabecera-consulta />
        <div class="mt-[24px] overflow-y-auto h-[648px]">
            <PacienteCard
                v-for="(paciente, i) in pacientes"
                :key="i"
                :class="[i == 1 ? '' : 'mt-[16px]']"
                :paciente="paciente"
            />
        </div>
    </div>
</template>

<script>
import CabeceraConsulta from "./ConsultaCard/CabeceraConsulta.vue";
import PacienteCard from "./ConsultaCard/ConsultaPacienteCard.vue";
export default {
    components: { CabeceraConsulta, PacienteCard },
    props: {
        pacientes: Array,
    },
};
</script>

<style>
</style>