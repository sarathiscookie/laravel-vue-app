<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bookable Component</div>

                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col">
                                <bookable-list-item
                                    item-title="iPhone"
                                    item-content="64 gb, 12 px, 3 ram"
                                    :price="50000"
                                ></bookable-list-item>
                            </div>
                        </div>

                        <div v-if="loading">Data is loading...</div>
                        <div v-else>
                            <div class="row mb-4" v-for="row in rows" :key="'row' + row">
                                <div
                                    class="col"
                                    v-for="(
                                        bookable, column
                                    ) in bookablesInRow(row)"
                                    :key="'row' + row + 'column' + column"
                                >
                                <bookable-list-item
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
            columns: 3,
        };
    },
    computed: {
        rows() {
            return this.bookables == null
                ? 0
                : Math.ceil(this.bookables.length / this.columns);
        },
    },
    methods: {
        bookablesInRow(row) {
            return this.bookables.slice((row - 1) * this.columns, row * this.columns)
        }
    },
    created() {
        this.loading = true;

        const promise_result = new Promise((resolve, reject) => {
            console.log(resolve);
            console.log(reject);
            setTimeout(() => resolve('Resolved'), 3000);
        })
            .then((result) => {console.log(`First result: ${result}`)})
            .catch((error) => {console.log(`Error ${error}`)});

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
                {
                    title: "Title Three",
                    content: "Content Three",
                    price: 1000,
                },
                {
                    title: "Title Four",
                    content: "Content Four",
                    price: 1000,
                },
                {
                    title: "Title Five",
                    content: "Content Five",
                    price: 1000,
                },
                {
                    title: "Title Six",
                    content: "Content Six",
                    price: 1000,
                },
            ];
            this.loading = false;
        }, 2000);
    },
};
</script>
