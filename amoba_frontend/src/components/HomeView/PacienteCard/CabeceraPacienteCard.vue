<template>
    <div class="p-[24px] gap-[10px] flex justify-between">
        <div class="w-[457px]">
            <div
                class="
                    
                    rounded-[10px]
                    border
                    shadow-[0_1px_5px_0_rgba(0,0,0,.24)]
                    py-[7px]
                    px-[14px]
                    gap-[10px]
                    h-[39px]
                    flex
                "
            >
                <div class="flex">
                    <select
                        class="
                            border-transparent
                            bg-transparent
                            ring-transparent
                            outline-0
                            drop-shadow-none
                            pr-[7px]
                            text-descripcion
                        "
                    >
                        <option>Nombre</option>
                        <option>Apellido</option>
                    </select>
                    <div class="ml-[10px]">
                        <svg
                            width="2"
                            height="25"
                            viewBox="0 0 2 25"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path d="M0.749207 0V25" stroke="#ACBADC" />
                        </svg>
                    </div>
                    <div>
                        <input
                            type="text"
                            
                            class="
                                border-transparent
                                bg-transparent
                                ring-transparent
                                outline-0
                                text-descripcion
                                ml-[7px]
                            "
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="my-auto">
            <div class="flex gap-[20px]">
                <CompactIcon />
                <ListIcon />
            </div>
        </div>
    </div>
</template>

<script>
import CompactIcon from "../Iconos/CompactIcon.vue";
import ListIcon from "../Iconos/ListIcon.vue";
export default { components: { CompactIcon, ListIcon } };
</script>

<style>
</style>