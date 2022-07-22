<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bookable Component</div>

                    <div class="card-body">
                        <bookable-list-item></bookable-list-item>
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
        BookableListItem
    }
}
</script>