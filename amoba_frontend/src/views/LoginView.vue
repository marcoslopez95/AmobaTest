<template>
    <div class="">
        <nav-bar-login></nav-bar-login>
        <card-login></card-login>
    </div>
</template>

<script>
import NavBarLogin from "@/components/LoginView/NavBarLogin.vue";
import CardLogin from "../components/LoginView/CardLogin.vue";
export default {
    components: {
        NavBarLogin,
        CardLogin,
    },
    name: "login-view",
};
</script>

<style scoped>
body {
    background-color:  #D7E1FC;
    background-image: none;
    /*color: white;*/
    
}
</style>