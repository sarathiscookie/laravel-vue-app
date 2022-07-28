<template>
    <div>
        Hello I am bookable. My id is {{ this.$route.params.id }}
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            bookable: null 
        }
    },
    created() {
        axios.get(`/api/bookables/${this.$route.params.id}`).then( (response)=> {
            this.bookable = response.data;
        });
    }
};
</script>