<template>
  <div class=" rounded-[20px] m-[24px] p-[24px] bg-[rgba(255,255,255,.55)] h-[912px]">
    <div class="flex">
    <profile-iinit></profile-iinit>
      <menu-c></menu-c>
      <ConsultaCard />
      <MenuPacientes />
      <PacienteCard />
    </div>
  </div>
</template>

<script>
import MenuC from '../components/HomeView/MenuC.vue'
import ProfileIinit from '../components/HomeView/ProfileIinit.vue'
import ConsultaCard from '@/components/HomeView/ConsultaCard.vue'
import MenuPacientes from '@/components/HomeView/MenuPacientes.vue'
import PacienteCard from '@/components/HomeView/PacienteCard.vue'

export default {
  name: 'HomeView',
  components: {
    ProfileIinit,
    MenuC,
    ConsultaCard,
    MenuPacientes,
    PacienteCard
}
}
</script>

<style>
@import url("@/assets/template.css");
</style>