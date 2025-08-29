<script setup lang="ts">

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

import { ref } from 'vue'

const openSales = ref(false)
const openProd = ref(false)
const openUsers = ref(false)

</script>

<template>

 <div class="flex flex-col h-screen w-screen items-center bg-gray-200 ">
    <Head title="Pagmine" />

         <nav class="bg-gray-50 w-screen ">
             <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
               <div class="relative flex h-16 items-center justify-between">

                 <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                   <div class="flex shrink-0 items-center">
                     <!-- <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="h-8 w-auto" /> -->
                   </div>
                   <div class="hidden sm:ml-6 sm:block">
                     <div class="flex space-x-4">
                       <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                       <a href="#" aria-current="page" class="rounded-md bg-slate-600 px-3 py-2 text-sm font-medium text-white">Dashboard</a>


                        <div class="relative inline-block text-left">
                           <button
                             @click="openSales=!openSales"
                             class="inline-flex justify-center w-full rounded-md px-3 py-2 text-sm font-medium text-stone-900 hover:text-slate-600"
                           >
                             Vendas
                             <svg
                               class="w-4 h-4 ml-2"
                               fill="none"
                               stroke="currentColor"
                               stroke-width="2"
                               viewBox="0 0 24 24"
                               xmlns="http://www.w3.org/2000/svg"
                             >
                               <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                             </svg>
                           </button>
                           <div
                             v-if="openSales"
                             class="absolute shadow-md  z-10 mt-2 w-30 origin-top-right rounded-md bg-white sh  focus:outline-none"
                           >
                             <div class="py-1">
                                <Link
                                   :href="route('login')"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >
                                 Cadastrar
                               </Link>
                                <Link
                                   :href="route('sales.show')"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >
                                 Visualizar
                               </Link>
                                <Link
                                   :href="route('login')"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >
                                 Acompanhar
                               </Link>

                             </div>
                           </div>
                       </div>

                       <div class="relative inline-block text-left">
                           <button
                             @click="openProd=!openProd"
                             class="inline-flex justify-center w-full rounded-md px-3 py-2 text-sm font-medium text-stone-900 hover:text-slate-600"
                           >
                             Produtos
                             <svg
                               class="w-4 h-4 ml-2"
                               fill="none"
                               stroke="currentColor"
                               stroke-width="2"
                               viewBox="0 0 24 24"
                               xmlns="http://www.w3.org/2000/svg"
                             >
                               <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                             </svg>
                           </button>
                           <div
                             v-if="openProd"
                             class="absolute z-10 mt-2 w-30 origin-top-right rounded-md bg-white shadow-md focus:outline-none"
                           >
                             <div class="py-1">

                               <Link
                                   :href="route('prod-regist.show')"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >
                                 Cadastrar
                               </Link>
                                 <Link
                                   :href="route('login')"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >
                                 Visualizar
                               </Link>

                             </div>
                           </div>
                       </div>

                        <div class="relative inline-block text-left">
                           <button
                             @click="openUsers=!openUsers"
                             class="inline-flex justify-center w-full rounded-md px-3 py-2 text-sm font-medium text-stone-900 hover:text-slate-600"
                           >
                             Usuários
                             <svg
                               class="w-4 h-4 ml-2"
                               fill="none"
                               stroke="currentColor"
                               stroke-width="2"
                               viewBox="0 0 24 24"
                               xmlns="http://www.w3.org/2000/svg"
                             >
                               <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                             </svg>
                           </button>
                           <div
                             v-if="openUsers"
                             class="absolute  z-10 mt-2 w-30 origin-top-right rounded-md bg-white shadow-md focus:outline-none"
                           >
                             <div class="py-1">
                                <Link
                                      :href="route('login')"
                                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                   >
                                    Cadastrar
                                  </Link>
                                   <Link
                                      :href="route('login')"
                                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                   >
                                    Visualizar
                                  </Link>

                             </div>
                           </div>
                       </div>

                     </div>
                   </div>


                 </div>
                 <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                   <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                     <span class="absolute -inset-1.5"></span>
                     <span class="sr-only">View notifications</span>
                     <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                       <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                   </button>
                 </div>
               </div>

             </div>

        </nav>


        <div class="flex flex-1 flex-col items-center w-full ">

            <div class="flex w-7xl mt-5 h-130 bg-gray-50 rounded-sm justify-center items-center">
                <slot/>
            </div>


        </div>

    </div>

</template>



