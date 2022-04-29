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
    <div
      class="
        bg-[#3568F0]
        rounded-[10px]
        text-white
        font-semibold
        w-[190px]
        h-[40px]
        py-[12px]
        pl-[20px]
        flex
        items-center
      "
    >
      <div class="text-base">Regístrate gratis</div>
      <div class="flex ml-[10px]">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="3"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9 5l7 7-7 7"
          />
        </svg>
      </div>
    </div>
  </div>
</template>

<script>
import AmobaMedic from './Iconos/AmobaMedic.vue';
export default {
  components: { AmobaMedic },
  name: "nav-bar-login",
};
</script>

<style>
</style>