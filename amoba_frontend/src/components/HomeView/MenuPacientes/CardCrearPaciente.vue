<template>
    <t-card header="Crear Paciente">
        <div class="text-titulo text-xl text-center">Registrar Paciente</div>
        <hr />
        <div class="p-[24px]">
            <div>
                <div class="text-descripcion pl-[12px]">Nombres</div>
                <div class="py-[12px]">
                    <input-custom
                        v-model="formulario.first_name"
                        placeholder="Nombre"
                        type="text"
                        class="font-serif"
                    />
                </div>
            </div>
            <div>
                <div class="text-descripcion pl-[12px]">Apellidos</div>
                <div class="py-[12px]">
                    <input-custom
                        v-model="formulario.last_name"
                        placeholder="Apellidos"
                        type="text"
                        class="font-serif"
                    />
                </div>
            </div>
            <div>
                <div class="text-descripcion pl-[12px]">N° de historia</div>
                <div class="py-[12px]">
                    <input-custom
                        placeholder="N° de historia"
                        v-model="formulario.document"
                        type="text"
                        class="font-serif"
                    />
                </div>
            </div>
            <div>
                <div class="text-descripcion pl-[12px]">Fotografía</div>
                <div class="py-[12px] text-center">
                    <div
                        class="border rounded-full w-[200px] h-[200px] mx-auto"
                    >
                        <img
                            v-if="preview != ''"
                            :src="preview"
                            class="border rounded-full w-[200px] h-[200px]"
                        />
                    </div>
                    <div>
                        <input
                            v-show="true"
                            id="file"
                            required
                            type="file"
                            class="w-[154px] mt-[5px]"
                            @change="previewImage($event)"
                        />
                    </div>
                </div>
            </div>
            <div>

            </div>
            <div class=" h-[45px]">

            <div
                    class="
                    mb-0
                    w-4/5
                   
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
            </div>
            <div class="mt-[10px]" @click="validarFormulario()">
                <ButtonCustom
                    class="w-[130px] mx-auto"
                    
                >
                    Guardar
                </ButtonCustom>
            </div>
        </div>
    </t-card>
</template>

<script>
import InputCustom from "@/components/Generales/InputCustom.vue";
import ButtonCustom from "@/components/Generales/ButtonCustom.vue";
import axios from 'axios';
import { EventBus } from "@/event-bus";
export default {
    components: { InputCustom, ButtonCustom },
    data() {
        return {
            formulario: {
                first_name: "",
                last_name: "",
                document: "",
                avatar: "",
            },
            preview: "",
            error:{
                bool: false,
                message: ''
            }
        };
    },
    methods: {
        validarFormulario() {
            console.log('validar');
            let bool = (
                this.formulario.last_name.length >= 3 &&
                this.formulario.first_name.length >= 3 &&
                this.formulario.document.length >= 3 &&
                this.preview != ""
            );
            console.log(bool);
            if(bool){
                console.log('ok');
                this.enviarFormulario()
            }else{
                console.log('no');
                this.error.bool = true
                this.error.message = 'Debe llenar todos los campos'
            }
        },
        previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                this.formulario.avatar = input.files[0]
                var reader = new FileReader();
                reader.onload = (e) => {
                    this.preview = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        },
        enviarFormulario(){
            let url = 'api/persons'
             let file = new FormData();
            file.append("document", this.formulario.document);
            file.append("last_name", this.last_name);
            file.append("first_name", this.formulario.first_name);
            file.append("avatar", this.formulario.avatar);

            axios.post(url,this.formulario,{
                headers:{
                    Authorization: 'Bearer ' + localStorage.getItem('token'),
                     "Content-Type": "multipart/form-data",
                } 
            }).then((response) => {
                console.log(response);
                EventBus.$emit('reload_uno');
                this.$emit('cerrar')
            }).catch((error)=>{
                let e = error.response
                if(e.status == 401){
                    EventBus.$emit('logout')
                }
                if(e.status == 422){
                    this.error.bool = true
                    this.error.message = e.data.message
                }
            })
        }
    },
};
</script>

<style>
</style>