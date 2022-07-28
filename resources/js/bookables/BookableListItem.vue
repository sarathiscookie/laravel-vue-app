<template>
    <div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ itemTitle }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    {{ price }}
                </h6>
                <p class="card-text">{{ itemDescription }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        itemTitle: String,
        itemDescription: String,
        price: Number,
    },
};
</script>
