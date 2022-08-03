<template>
    <div style="padding: 1.25rem">
        <h6 class="text-uppercase text-secondary font-weight-bolder pt-4">Review Listing</h6>

        <div v-if="loading">Loading...</div>
        <div v-else>
            <div class="border-bottom d-none d-md-block" v-for="(review, index) in reviews" :key="index">
                <div class="row pt-4">
                    <div class="col-md-6">Title</div>
                    <div class="col-md-6 d-flex justify-content-end">
                        {{ review.rating }}
                        <star-rating></star-rating>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">{{ review.created_at | fromNow }}</div>
                </div>
                <div class="row">
                    <div class="col-md-12 pt-4 pb-4">{{ review.content }}</div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import moment from 'moment';

export default {
    props: {
        bookableId: String
    },
    data() {
        return {
            loading: false,
            reviews: null
        }
    },
    created() {
        this.loading = true;
        axios.get(`/api/bookables/${this.bookableId}/reviews`)
            .then(response => {
                this.reviews = response.data.data; //Used for Eloquent API Resource.
                //this.reviews = response.data; //Normal eloquent controller response. 
            })
            .then(
                () => { this.loading = false }
            )
            .catch(error => {
                console.log(error);
            });
    },
    filters: {
        fromNow(value) {
            return moment(value).fromNow();
        }
    }
}
</script>