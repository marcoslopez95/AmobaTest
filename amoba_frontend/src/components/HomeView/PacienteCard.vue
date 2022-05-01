<template>
  <div class="bg-white w-[778px] h-[726px] mt-[137px] ml-[24px] rounded-[16px]">
      <CabeceraPacienteCard />
      <div>
        <ItemPaciente />
      </div>
  </div>
</template>

<script>
import CabeceraPacienteCard from "./PacienteCard/CabeceraPacienteCard.vue";
import ItemPaciente from "./PacienteCard/ItemPaciente.vue";
export default {
    components: { CabeceraPacienteCard, ItemPaciente }
}
</script>

<style>

</style>