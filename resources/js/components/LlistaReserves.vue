<template>
    <div>
        <h1 class="text-center">Llistat de Reserves</h1>
        <a class="btn btn-success" href="create-reserva">Crea</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="reserva in reserves" :key="reserva.id">
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "LlistaReserves",

    data() {
        return {
            reserves: []
        }
    },

    mounted() {
        this.list();
    },

    methods: {
        async list() {
            const res = await axios.get('reserves');
            this.reserves = res.data;
        }
    },
}
</script>

<style scoped>

</style>
