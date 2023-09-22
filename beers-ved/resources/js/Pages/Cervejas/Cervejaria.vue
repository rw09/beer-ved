<template>
    <div>
        <div class="p-4">
            <h1 class="font-bold text-2xl underline text-slate-900 pb-1">{{ cervejaria.name }}</h1>
            <h5>{{ cervejaria.address1 }}, {{ cervejaria.city }} {{ cervejaria.state }} - {{ cervejaria.country }}</h5>
            <h5 class="text-sm">Phone: {{ cervejaria.phone }}</h5>
            <h5 class="text-sm pb-2">Website: {{ cervejaria.website }}</h5>
            <hr>
            <p class="text-xs py-4 px-2">{{ cervejaria.descript }}</p>
        </div>
        <div class="bg-red-200">
            <div v-for="cerveja in cervejas.data" v-bind:key="cerveja.id">
                <h3 class="font-bold">{{ cerveja.name }}</h3>
                <h5 v-if="cerveja.category" class="text-sm">Categoria: {{ cerveja.category.cat_name }}</h5>
                <h5 v-if="cerveja.style" class="text-sm">Estilo: {{ cerveja.style.style_name }}</h5>
                <h5 class="text-sm">Amargor: {{ cerveja.abv }}</h5>
                <details v-if="cerveja.descript" class="text-sm">
                    <summary>Descrição:</summary>
                    <p class="text-xs">{{ cerveja.descript }}</p>
                </details>
            </div>
        </div>
        <Pagination v-bind:data="cervejas"/>
    </div>
</template>

<script>
import Pagination from '../Shared/Pagination.vue';
    export default {
        name: "Cervejaria",
        props: {
            cervejaria: Object,
            cervejas: Object
        },
        components: { Pagination }
    }
</script>
