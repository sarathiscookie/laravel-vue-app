<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Bookable Component</div>

                <div class="card-body">
                    <div v-if="loading">Data is loading...</div>
                    <div v-else>
                        <div class="row mb-4" v-for="row in rows" :key="'row' + row">
                            <div class="col d-flex align-items-stretch" v-for="(bookable, column) in bookablesInRow(row)" :key="'row' + row + 'column' + column">
                                <bookable-list-item v-bind="bookable"></bookable-list-item>
                            </div>

                            <div class="col" v-for="p in placeholdersInRow(row)" :key="'placeholder'+row+p"></div>
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

        axios.get('/api/bookables').then((response) => {
            //this.bookables = response.data.data; //Purpose for Eloquent API Resource.
            this.bookables = response.data;
            this.loading = false;
        });
        
    },
};
</script>
