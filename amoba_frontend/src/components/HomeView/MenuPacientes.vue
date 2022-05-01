<template>
    <div class="grid grid-row-1 grid-flow-col fixed px-[24px] top-[136px] left-[614px] w-[778px] ml-[24px]">
        <div class="flex gap-5 basis-1/3">
            <PersonIcon />
            <span>Nuevo Paciente</span>
        </div>
        <div class="flex gap-5 basis-1/3">
            <ListIcon />
            <span>Historias Clínicas</span>
        </div>
        <div class="flex gap-5 basis-1/3">
            <CalendarIcon />
            <span>Agenda</span>
        </div>
    </div>
</template>

<script>
import PersonIcon from "./Iconos/PersonIcon.vue";
import ListIcon from "./Iconos/TablaListIcon.vue";
import CalendarIcon from "./Iconos/CalendarIcon.vue";
export default {
    components: { PersonIcon, ListIcon, CalendarIcon }
}
</script>

<style>
</style>