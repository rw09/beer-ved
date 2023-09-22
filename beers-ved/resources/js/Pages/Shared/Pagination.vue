<template>
    <div class="pagination">
        <Link v-if="data.prev_page_url" v-bind:href="data.prev_page_url">Anterior</Link>
        <div class="flex justify-around flex-grow px-12">
            <Link v-for="link in cleanLinks" v-bind:key="link.label" v-bind:href="link.url" v-bind:class="{'text-yellow-400 font-bold underline decoration-2 underline-offset-4': link.active}">
                {{ link.label }}
            </Link>
        </div>
        <Link v-if="data.next_page_url" v-bind:href="data.next_page_url">Próxima</Link>
   </div>
</template>

<script>
    export default {
        props: {
            data: Object
        },
        computed: {
            cleanLinks() {
                const cleanLinks = [...this.data.links];
                cleanLinks.shift();
                cleanLinks.pop();
                return cleanLinks;
            }
        }
    }
</script>