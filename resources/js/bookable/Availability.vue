<template>
    <div>
        <h6 class="text-uppercase text-secondary font-weight-bolder">Check Availability
            <span v-if="noAvailability" class="text-danger">(NOT AVAILABLE)</span>
            <span v-if="hasAvailability" class="text-success">(AVAILABLE)</span>
        </h6>

        <form class="row g-3">
            <div class="col-md-6">
                <label for="from" class="form-label">From</label>
                <input type="text" name="Start Date" class="form-control" placeholder="Start Date" v-model="from" @keyup.enter="check" :class="[{'is-invalid': this.errorFor('from')}]" />
                <div class="invalid-feedback" v-for="(error, index) in this.errorFor('from')" :key="'from'+index">{{ error }}</div>
            </div>
            <div class="col-md-6">
                <label for="to" class="form-label">To</label>
                <input type="text" name="End Date" class="form-control" placeholder="End Date" v-model="to" @keyup.enter="check" :class="[{'is-invalid': this.errorFor('to')}]"/>
                <div class="invalid-feedback" v-for="(error, index) in this.errorFor('to')" :key="'to'+index">{{ error }}</div>
            </div>
            <div class="d-grid">
                <button class="btn btn-secondary btn-sm" @click="check" :disabled="loading">Check!</button>
            </div>
        </form>
    </div>
</template>

<script>

export default {
    props: {
        bookableId: String
    },
    data() {
        return {
            from: null,
            to: null,
            loading: false,
            status: null,
            errors: null
        }
    },
    methods: {
        check() {
            this.loading = true;

            this.errors = null;

            axios.get(`/api/bookables/${this.bookableId}/availability?from=${this.from}&to=${this.to}`)
                .then(response => {
                    this.status = response.status;
                })
                .catch(error => {
                    if( 422 == error.response.status ) {
                        this.errors = error.response.data.errors;
                    }

                    this.status = error.response.status;
                })
                .then(() => { 
                    this.loading = false; 
                });
        },
        errorFor(field) {
            return this.hasErrors && this.errors[field] ? this.errors[field] : null;
        }
    },
    computed: {
        hasErrors() {
            return 422 == this.status && this.errors != null;
        },
        hasAvailability() {
            return 200 == this.status;
        },
        noAvailability() {
            return 404 == this.status;
        }
    }
}
</script>

<style scoped>
    label {
        text-transform: uppercase;
        color:gray;
        font-weight: bolder;
    }
</style>