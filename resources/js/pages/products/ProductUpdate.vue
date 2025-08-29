
<script setup lang="ts">

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { useForm, usePage, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { ref, reactive } from 'vue'
import Pagmine from '../Pagmine.vue';




const props = defineProps<{
    meatGroup?: object,
    meatOrigin?: {id_grupo_carnes:string, id_origem_carnes:string, nome_origem_carnes:string}[],
    requestData?: { id_origem_carnes:string, id_grupo_carnes:string, nome_origem_carnes:string, preco_kg_carnes:string }[],
    id_origem: string,
    id_grupo: string,
    nome: string,
    preco_kg: string,
}>()


/// recriar aquele array ali com base no valor do meatOrigin
// const selectGroup = ref(props?.id_grupo); não aceitou receber a props do nome da origem, então ambos viram com valores null
const selectGroup = ref("");
const originOpt = ref();
const sucess = ref(false);
const close = ref(false);
const page = usePage();
const popup = ref(false);

const selectOrigin = ref(props.meatOrigin?.filter((item:any)=> item.nome_origem_carnes == props.nome));


const OnchangeGroup = ()=>{

     originOpt.value = props.meatOrigin?.filter((item:any)=> item.id_grupo_carnes == selectGroup.value)

}


const form = useForm({
      id_origem_carnes: "",
      nome_carnes: props.nome,
      preco_kg_carnes: props.preco_kg
 });

 //produto não encontrado
const submit = () => {

    form.post('/produtos/editar/novo',{
             onSuccess: ()=> {
                const message= page.props.message;
                if(message == "produto não encontrado"){
                    popup.value=true;
                }
                else{
                      sucess.value = true;
                      close.value=true;
                }

            },
            onError:()=>{
                close.value= true;
            }
    });

};



</script>

<template>
    <Pagmine>

          <div class='flex grow-4 bg-gray-800 h-full'>

          </div>
          <div class='flex grow-2 h-full'>
                 <form @submit.prevent="submit"  class="flex flex-col w-full gap-6 justify-center items-center">
                        <div class="flex flex-col justify-center gap-y-5 items-center">

                           <div class="flex justify-evenly gap-x-5">

                               <label class="w-25 pl-5" for="nome-prod">Nome </label>
                               <input v-model="form.nome_carnes" class='rounded-sm border-1 border-black outline-none w-52 h-7 text-right'
                                id="nome-prod"
                                required
                                autofocus
                                :tabindex="1"
                                :placeholder='selectOrigin'
                                />
                           </div>


                           <div class="flex justify-evenly  gap-x-5">
                               <label class="w-25 pl-5" for="group-prod">Grupo </label>
                            <select v-model="selectGroup" @change="OnchangeGroup"  class="rounded-sm border-1 border-black outline-none w-52 h-7 text-right">
                                     <option v-for="(options, index) in meatGroup" :key="index"  :value="index" class='outline-none'>{{options}}</option>
                                </select>
                           </div>

                            <div class="flex justify-evenly gap-x-5">
                               <label class="w-25 pl-5" for="orig-prod">Origem </label>
                                <select v-model="form.id_origem_carnes" id="" class="rounded-sm border-1 border-black outline-none w-52 h-7 text-right">
                                     <option v-for="(options, i) in originOpt" :key="i" :value="options.id_origem_carnes" class='outline-none'>{{options.nome_origem_carnes}} </option>
                                </select>
                           </div>


                           <div class="flex justify-evenly  gap-x-5">
                               <label class="w-25 pl-5" for="price-prod">Preço(kg)</label>
                               <input v-model="form.preco_kg_carnes" type="number" step="0.01" min="0" placeholder="0.00" class='rounded-sm border-1 border-black outline-none w-52 h-7 text-right'
                                id="price-prod"
                                required
                                autofocus
                                :tabindex="4"
                                />
                           </div>
                            <div v-if='sucess && close' class=" flex flex-row  bg-green-100 gap-3 border border-green-400 text-green-700 px-4 py-3 top-100 right-20 h-10 rounded absolute items-center justify-center " role="alert">
                                <span class="block sm:inline">Item alterado! </span>
                                <span class="">
                                  <svg  @click="sucess=!sucess; close=!close" class="fill-current h-6 w-6 text-green-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Fechar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                </span>
                           </div>
                            <div v-else-if='close' class=" flex flex-row gap-3 bg-red-100 border border-red-400 top-100 right-20 h-10 text-red-700 px-4 py-3 rounded absolute items-center justify-center " role="alert">
                                <span class="block sm:inline">Não foi possível alterar esse item! </span>
                                <span class="">
                                  <svg @click="close=!close" class="fill-current h-6 w-6 text-red-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Fechar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                </span>
                           </div>
                           <div v-else-if='popup' class=" flex flex-row gap-3  top-21 w-161 h-130 px-4 py-3 rounded absolute items-center justify-center " role="alert">
                                <div  class=" z-0 bg-white opacity-85 w-161 h-130 px-4 py-3 rounded absolute" role="alert"></div>
                                <div class="bg-white  shadow-lg border border-gray-200 w-80 rounded-md h-30 z-10 ">
                                   <div class="flex flex-row rounded-tl-md rounded-tr-md bg-slate-600 w-full items-center ">
                                           <span class="block sm:inline text-black text-white text-sm  pl-2 grow-3 ">Item não encontrado! </span>
                                           <span class=" bg-red-600 rounded-tr-md pr-2 pl-2">
                                               <svg @click="popup=!popup" class="fill-white h-6 w-6 text-red-500 cursor-pointer " role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Fechar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                           </span>
                                   </div>
                                   <h1 class="text-lg pl-2 pt-2">Deseja cadastrá-lo?</h1>
                                   <div class="items-end flex grow h-13 justify-end ">
                                             <Link href="/produtos/cadastrar/outro" method="post" :data="{id_origem_carnes: form.id_origem_carnes,  id_grupo_carnes: selectGroup,
                                              nome_carnes: form.nome_carnes, preco_kg_carnes: form.preco_kg_carnes,}" class='bg-slate-600 text-md w-2/6 rounded-sm h-7 mt-5 mr-2 hover text-white cursor-pointer' >
                                               OK
                                            </Link>

                                   </div>

                                </div>
                           </div>

                           <button type='submit' class='bg-slate-600  w-3/4 rounded-sm h-9 mt-5 hover text-white cursor-pointer hover:shadow-xl' >Alterar</button>
                        </div>
                </form>


          </div>

    </Pagmine>
</template>
