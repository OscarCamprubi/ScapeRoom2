<template>
    <div>
        <form v-on:submit.prevent="addVoucher">
            <label for="nom" class="form-label"></label>
            <input type="text" v-model="voucher.nom" id="nom" class="form-control">
            <br>
            <input type="submit" class="btn btn-success">
        </form>
    </div>
</template>
<script>
import Layout from "./Layout";
export default {
    name: "CreaReserva",
    components: {Layout},
    data() {
        return {
            voucher:{},
        };


    },

    methods: {
        async addVoucher(){
            console.log(this.voucher);
            const params = {
                nom: this.nom
            };
            const res = await axios.get('/voucher').then(params);
            this.$emit('new',voucher);
            return res;
        }

    },
}

</script>

<style scoped>

</style>
