<template>
    <div
        class="
            w-[658px]
            h-[591px]
            mt-[164px]
            p-[48px]
            mx-auto
            bg-gradient-to-t
            from-[#EEF0F6]
            to-white
            rounded-[20px]
            drop-shadow-[0px_115px_120px_rgba(124,132,152,0.20)]
        "
    >
        <div class="font-medium text-xl text-center text-titulo">
            INICIAR SESIÓN
        </div>
        <div class="px-[48px]">
            <div class="flex justify-center py-[24px]">
                <ico-google />
                <ico-linkedin class="ml-[24px]" />
            </div>
            <div class="flex justify-center items-center h-[68px]">
                <linea-separador></linea-separador>
                <div
                    class="mx-[10px] w-[148.67px] text-center text-descripcion"
                >
                    o inicia con
                </div>
                <linea-separador></linea-separador>
            </div>
            <div class="text-descripcion pl-[12px]">Correo electrónico</div>
            <div class="py-[12px]">
                <input-custom
                    required
                    placeholder="Nombre"
                    type="text"
                    class="font-serif"
                    @keypress="SetearError()"
                    v-model="formulario.email"
                />
            </div>
            <div class="text-descripcion pl-[12px] pt-[12px]">Contraseña</div>
            <div class="py-[12px]">
                <input-custom
                    placeholder="Cédula"
                    type="password"
                    @keypress="SetearError()"
                    v-model="formulario.password"
                />
            </div>
               
            <div class="w-full h-[90px]">
                 <div
                    class="
                    fixed
                    mb-0
                    w-1/2
                    ml-14
                        bg-red-100
                        border border-red-400
                        text-red-700
                        px-4
                        py-3
                        rounded
                    "
                    v-show="error.bool"
                    role="alert"
                >
                    <span class="block sm:inline"
                        >{{error.message}}</span
                    >
                    
                </div>
                <div class="h-full flex items-end" @click="Validar($event)">
                    <button-custom class="mx-auto w-[142px]"
                        >Siguiente</button-custom
                    >
                </div>
            </div>
            <div class="w-full py-[24px]">
                <div class="text-descripcion text-center">
                    No tienes cuenta?
                    <a
                        class="
                            text-bold text-link
                            cursor-pointer
                            hover:text-link-hover
                        "
                        >Regístrate</a
                    >
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
/* eslint-disable */
import ButtonCustom from "../Generales/ButtonCustom.vue";
import InputCustom from "../Generales/InputCustom.vue";
import IcoGoogle from "./Iconos/IcoGoogle.vue";
import IcoLinkedin from "./Iconos/IcoLinkedin.vue";
import LineaSeparador from "./Iconos/LineaSeparador.vue";
import axios from "axios";

export default {
    components: {
        IcoGoogle,
        IcoLinkedin,
        LineaSeparador,
        ButtonCustom,
        InputCustom,
    },
    data() {
        return {
            formulario: {
                email: "",
                password: "",
            },
            validate: {
                email: false,
                password: false,
            },
            error:{
                bool: false,
                message: ''
            }
        };
    },
    methods: {
        Validar(e = false) {
            if (this.formulario.email.length >= 6) {
                this.validate.email = true;
            }
            if (this.formulario.password.length >= 6) {
                this.validate.password = true;
            }
            if (
                this.validate.email === true &&
                this.validate.password === true
            ) {
                console.log("si");
                this.Login();
                return true;
            } else {
                console.log("no");
                event.preventDefault();
                return false;
            }
        },
        SetearError(){
            this.error.bool = false;
            this.error.message = ''
        },
        Login() {
            console.log("login");
            this.error.bool = false;
            this.error.message = '';
            let url = "/api/login";
            axios
                .post(url, this.formulario)
                .then((response) => {
                    let data = response.data;
                    console.log('login',data);
                    axios.defaults.headers.common['Authorization'] = data.data.token_type +' ' + data.data.access_token;
                    localStorage.setItem("token", data.access_token);
                    localStorage.setItem("expired_at", data.expires_at);
                    this.$router.push("/home");
                })
                .catch((error) => {
                    let data = error.response.data;
                    this.error.message = data.message
                    this.error.bool = true
                    console.log("error_sesion", data.message);
                });
        },
    },
};
</script>

<style>
</style>