<template>
    <div>
        <select class="form-select" aria-label="Default select example">
            <option selected></option>
            <option v-for="empleat in empleats" :key="empleat.id">empleat.id</option>

        </select>
    </div>
</template>

<script>
export default {
    name: "CreaReserva",

    data() {
        return {
            empleats: []
        }
    },

    mounted() {
        this.list();
    },

    methods: {
        async list() {
            const res = await axios.get('empleats');
            this.empleats = res.data;
        }
    },
}

</script>

<style scoped>

</style>
