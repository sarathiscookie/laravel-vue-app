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
                                    item-description="64 gb, 12 px, 3 ram"
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
                                    :item-description="bookable.description"
                                    :price="bookable.price"
                                ></bookable-list-item>
                                </div>

                                <div class="col" v-for="p in placeholdersInRow(row)" :key="'placeholder'+row+p"></div>
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
            return this.bookables.slice((row - 1) * this.columns, row * this.columns);
        },
        placeholdersInRow(row) {
            return this.columns - this.bookablesInRow(row).length;
        }
    },
    created() {
        this.loading = true;

        const request = axios.get('/api/bookables').then((response) => {
            this.bookables = response.data;
            this.loading = false;
        });
        
    },
};
</script>
