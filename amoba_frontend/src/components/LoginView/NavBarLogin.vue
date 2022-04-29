<template>
  <div
    class="
      fixed
      top-0
      bg-white
      flex
      items-center
      justify-between
      w-full
      px-5
      py-[20px]
    "
  >
    <div>
      <amoba-medic></amoba-medic>
    </div>
    <button-custom>Regístrate gratis</button-custom>
  </div>
</template>

<script>
import ButtonCustom from '../Generales/ButtonCustom.vue';
import AmobaMedic from './Iconos/AmobaMedic.vue';
export default {
  components: { AmobaMedic, ButtonCustom },
  name: "nav-bar-login",
};
</script>

<style>

</style>