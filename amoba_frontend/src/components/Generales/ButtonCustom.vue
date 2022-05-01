<template>
  <button
      class="
        bg-link
        rounded-[10px]
        text-white
        font-semibold
        w-[190px]
        h-[40px]
        py-[12px]
        pl-[20px]
        flex
        items-center
        cursor-pointer
        hover:bg-link-hover
      "
    >
      <div class="text-base"><slot></slot></div>
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
    </button>
</template>

<script>
export default {
  props:{}
}
</script>

<style>

</style>