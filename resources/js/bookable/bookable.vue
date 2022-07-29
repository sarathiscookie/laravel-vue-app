<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div v-if="!loading">
                        <h5 class="card-title">
                            {{ bookable.title }}
                        </h5>
                        <hr />
                        <article>{{ bookable.description }}</article>
                    </div>
                    <div v-else>Data is Loading...</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Payment</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
    data() {
        return {
            bookable: null,
            loading: false
        }
    },
    created() {
        this.loading = true;
        axios.get(`/api/bookables/${this.$route.params.id}`).then( (response)=> {
            this.bookable = response.data;
            this.loading = false;
        });
    }
};
</script>