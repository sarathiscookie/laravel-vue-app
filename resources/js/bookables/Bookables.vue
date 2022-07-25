<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bookable Component</div>

                    <div class="card-body">
                        <bookable-list-item item-title="iPhone" item-content="64 gb, 12 px, 3 ram" :price="50000"></bookable-list-item>
                        <bookable-list-item item-title="Samsung" item-content="128 gb, 45 px, 8 ram" :price="60000"></bookable-list-item>
                        <bookable-list-item item-title="One Plus" item-content="128 gb, 60 px, 12 ram" :price="70000"></bookable-list-item>
                        <bookable-list-item item-title="Nokia" item-content="32 gb, 12 px, 8 ram" :price="40000"></bookable-list-item>
                        <bookable-list-item item-title="Vivo" item-content="64 gb, 12 px, 8 ram" :price="30000"></bookable-list-item>
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