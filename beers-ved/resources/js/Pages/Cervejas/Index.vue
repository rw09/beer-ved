<template>
<div class="flex flex-col">
    <div class="self-end bg-slate-400 w-1/3 p-2 mb-1">
        <form @submit.prevent="onSubmit" class="flex justify-between">
            <input v-model="pesquisa" class="rounded p-1 mx-2 flex-grow" type="search" name="pesquisa" id="pesquisa" placeholder="Pesquise por país">
            <button class="px-2" type="submit">Pesquisar</button>
        </form>
    </div>
   <h1 class="headerCervejarias">Lista de Cervejarias</h1>
    <ul>
        <li v-for="cervejaria of cervejarias.data" v-bind:key="cervejaria.id">
            <Link class="block" v-bind:href="route('cervejaria-detalhe', {id: cervejaria.id})">
                <div class="bg-orange-300 px-8 py-4 mb-1 text-base font-bold">
                    <h3>{{ cervejaria.name }}</h3> 
                    <div class="flex justify-between font-light">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <p> {{ cervejaria.city }} - {{ cervejaria.country }}</p>
                        </div>
                        <div>
                            <p>
                                Quantidade de Marcas: {{ cervejaria.beers_count }}
                            </p>
                        </div>
                    </div>
                </div>
            </Link>
        </li>
    </ul>
    <Pagination v-bind:data="cervejarias"/>
</div>
</template>

<script>
import Pagination from '../Shared/Pagination.vue';

    export default {
        components: { Pagination },
        props: {
            cervejarias: Object
        },
        data() {
            return {
                pesquisa: ''
            }
        },
        methods: {
            onSubmit() {
                return this.$inertia.replace(this.route('cervejarias-index', {pesquisa: this.pesquisa}));
            }
        }
    }
</script>
