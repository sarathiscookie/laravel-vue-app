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
            <availability></availability>
        </div>
    </div>
    
</template>

<script>
import Availability from './Availability';

export default {
    components: {
        Availability,
    },
    data() {
        return {
            bookable: null,
            loading: false
        }
    },
    created() {
        this.loading = true;
        axios.get(`/api/bookables/${this.$route.params.id}`).then( (response)=> {
            //this.bookable = response.data.data; //Purpose for eloquent API Resource.
            this.bookable = response.data;
            this.loading = false;
        });
    }
};
</script>