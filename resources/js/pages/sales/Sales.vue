
<script setup lang="ts">

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { useForm, usePage, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { ref, reactive } from 'vue'
import Pagmine from '../Pagmine.vue';

const saleReg = ref(true);

</script>

<template>
    <Pagmine>

          <div class='flex grow-4 bg-neutral-300 h-full rounded-md  flex-col items-center'>

                <div class='flex w-full h-1/7 items-center justify-start bg-gradient-to-r from-indigo-500 via-purple-400 to-pink-300 rounded-tl-md rounded-tr-md'>
                        <input class='rounded-sm  ml-11 outline-none w-52 h-6 text-left bg-white'
                                id="nome-prod"
                                required
                                autofocus
                                :tabindex="1"

                        />
                        <button class=" flex items-center justify-center bg-white h-6 w-25 ml-5 rounded-sm px-3 py-2 text-sm font-medium cursor-pointer text-stone-900 hover:text-slate-600"
                        > buscar</button>
                </div>
                <div class='flex w-full h-full  justify-center items-center rounded-br-md rounded-bl-md'>
                    <div class='flex grow-2 border-1 border-black  bg-gray-50 h-full items-center justify-center'>
                        <div class="bg-pink-300 w-6/7 h-full"></div>
                    </div>
                    <div v-if='saleReg' class='flex grow-1 flex-col   justify-center items-center h-7/8 '>
                        <div class="flex w-6/7 h-full flex-col  rounded-md items-center justify-center gap-2">



                            <div class="flex flex-row w-2/3 gap-2 justify-center text-sm text-purple-950">
                                <label class="w-30 h-6 text-left">Valor Total *</label>
                                <label class="w-30 h-6 text-left"> Quantidade(kg) *</label>
                                <label class="w-30 h-6 text-left">Data *</label>
                            </div>
                            <div class="flex flex-row w-2/3 gap-2 justify-center  text-purple-950  text-sm">
                                    <input class='rounded-sm  text-sm outline-none w-30 h-6 text-left bg-white border-1 border-purple-400'
                                            id="nome-prod"
                                            required
                                            autofocus
                                            :tabindex="1"
                                            type="number"
                                            min='1.00'
                                            step="0.01"

                                    />
                                    <input class='rounded-sm  text-sm outline-none w-30 h-6 text-left bg-white border-1 border-purple-400'
                                            id="nome-prod"
                                            required
                                            autofocus
                                            :tabindex="1"
                                            type="number"
                                            min='0.100'
                                            step="0.01"

                                    />
                                    <input class='rounded-sm  text-sm outline-none w-30 h-6 text-left bg-white border-1 border-purple-400'
                                            id="nome-prod"
                                            required
                                            autofocus
                                            :tabindex="1"
                                            type="date"


                                    />
                            </div>

                                <div class="flex flex-row w-2/3 gap-2 justify-center text-sm text-purple-950">
                                   <label class="w-30 h-6 text-left">Origem *</label>
                                   <label class="w-30 h-6 text-left">Tipo *</label>
                                   <label class="w-30 h-6 text-left">Nome *</label>
                                </div>
                                <div class="flex flex-row w-2/3 gap-2 justify-center items-center  text-purple-950  text-sm">

                                    <input class='rounded-sm  text-sm outline-none w-30 h-6 text-left bg-white border-1 border-purple-400'
                                            id="nome-prod"
                                            required
                                            autofocus
                                            :tabindex="1"

                                    />
                                    <input class='rounded-sm  text-sm outline-none w-30 h-6 text-left bg-white border-1 border-purple-400'
                                            id="nome-prod"
                                            required
                                            autofocus
                                            :tabindex="1"

                                    />
                                    <input class='rounded-sm  text-sm outline-none w-30 h-6 text-left bg-white border-1 border-purple-400'
                                            id="nome-prod"
                                            required
                                            autofocus
                                            :tabindex="1"

                                    />
                            </div>

                               <div class="flex flex-row w-2/3 gap-2 justify-center text-sm text-purple-950 ">
                                   <label class="w-30 h-6 text-left">Estação *</label>
                                   <label class="w-30 h-6 text-left">Comemoração</label>
                                   <label class="w-30 h-6 text-left">Campeonato</label>
                                </div>
                                <div class="flex flex-row w-2/3 gap-2 justify-center items-center  text-purple-950  text-sm">
                                    <input class='rounded-sm  text-sm outline-none w-30 h-6 text-left bg-white border-1 border-purple-400'
                                            id="nome-prod"
                                            required
                                            autofocus
                                            :tabindex="1"

                                    />
                                    <input class='rounded-sm  text-sm outline-none w-30 h-6 text-left bg-white border-1 border-purple-400'
                                            id="nome-prod"
                                            required
                                            autofocus
                                            :tabindex="1"

                                    />
                                         <input class='rounded-sm  text-sm outline-none w-30 h-6 text-left bg-white border-1 border-purple-400'
                                            id="nome-prod"
                                            required
                                            autofocus
                                            :tabindex="1"

                                    />
                            </div>
                            <div class="flex flex-row w-2/3 gap-2 justify-start text-sm text-purple-950">
                                   <label class="w-30 h-6 text-left ml-2">Descrição</label>
                             </div>
                             <div class="flex w-2/3 gap-2 items-center justify-center  text-purple-950  text-sm">

                                    <textarea class='rounded-sm  text-sm outline-none w-94 h-20  text-left bg-white border-1 border-purple-400 '>

                                    </textarea>
                             </div>

                              <button class=" flex items-center justify-center bg-purple-400 h-8 w-3/6  rounded-sm mt-4 text-sm text-white font-medium cursor-pointer text-stone-900 hover:shadow-md"
                              > Registrar
                              </button>
                        </div>


                    </div>
                </div>

          </div>

    </Pagmine>
 </template>

    <!--  -->
