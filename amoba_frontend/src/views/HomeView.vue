<template>
    <div
        class="
            rounded-[20px]
            m-[24px]
            p-[24px]
            pl-0
            bg-[rgba(255,255,255,.55)]
            h-[912px]
        "
    >
        <div class="flex">
            <profile-iinit></profile-iinit>
            <menu-c></menu-c>
            <ConsultaCard :pacientes="pacientes_cero"/>
            <MenuPacientes />
            <PacienteCard :pacientes="pacientes_uno" />
        </div>
    </div>
</template>

<script>
/* eslint-disable */
import MenuC from "../components/HomeView/MenuC.vue";
import ProfileIinit from "../components/HomeView/ProfileIinit.vue";
import ConsultaCard from "@/components/HomeView/ConsultaCard.vue";
import MenuPacientes from "@/components/HomeView/MenuPacientes.vue";
import PacienteCard from "@/components/HomeView/PacienteCard.vue";
import axios from 'axios';

export default {
    name: "HomeView",
    components: {
        ProfileIinit,
        MenuC,
        ConsultaCard,
        MenuPacientes,
        PacienteCard,
    },
    data() {
        return {
            pacientes_cero: [],
            pacientes_uno: [],
        };
    },
    mounted(){
      this.CargarCero()
      this.CargarUno()
    },
    methods:{
      CargarCero(){
        let url = 'api/persons'
        let filtro = {
          type_person : '0'
        }
        axios.get(url,{params:filtro}).then((response)=>{
          let data = response.data.data
          this.pacientes_cero.push(data)
        }).catch((error)=>{
          let e = error.response.data.data
          console.log('error_paciente_cero',e);
        })
      },
      CargarUno(){
        let url = 'api/persons'
        let filtro = {
          type_person : '1'
        }
        axios.get(url,{params:filtro}).then((response)=>{
          let data = response.data.data
          this.pacientes_uno.push(data)
        }).catch((error)=>{
          let e = error.response.data.data
          console.log('error_paciente_uno',e);
        })
      }
    }
};
</script>

<style scoped lang="postcss">
@import url("@/assets/template.css");
</style>