<template>
    <div>
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title">{{ title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    {{ id }}
                </h6>
                <p class="card-text">{{ description }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        description: String,
        id: Number,
    },
};
</script>
