<template>
    <div>
        <ul class="list-group">
            <li class="list-group-item">{{ itemTitle }}</li>
            <li class="list-group-item">{{ itemContent }}</li>
            <li class="list-group-item">{{ price }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        itemTitle: String,
        itemContent: String,
        price: Number,
    },
};
</script>
