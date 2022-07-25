<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bookable Component</div>

                    <div class="card-body">
                        <bookable-list-item
                            item-title="iPhone"
                            item-content="64 gb, 12 px, 3 ram"
                            :price="50000"
                        ></bookable-list-item>
                        <div v-if="loading">Data is loading...</div>
                        <div v-else>
                            <bookable-list-item
                                v-for="(bookable, index) in bookables"
                                :key="index"
                                :item-title="bookable.title"
                                :item-content="bookable.content"
                                :price="bookable.price"
                            ></bookable-list-item>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BookableListItem from "./BookableListItem";

export default {
    components: {
        BookableListItem,
    },
    data() {
        return {
            bookables: null,
            loading: false,
        };
    },
    created() {
        this.loading = true;
        setTimeout(() => {
            this.bookables = [
                {
                    title: "Title One",
                    content: "Content One",
                    price: 1000,
                },
                {
                    title: "Title Two",
                    content: "Content Two",
                    price: 1000,
                },
            ];
            this.loading = false;
        }, 2000);
    },
};
</script>
