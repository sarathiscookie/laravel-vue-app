<template>
    <div>
        Hello I am bookable. My id is {{ this.$route.params.id }}
    </div>
</template>

<script>
export default {
    created() {
        console.log(this.$route.params.id);
    }
};
</script>