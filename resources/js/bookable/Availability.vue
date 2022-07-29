<template>
    <div>
        <h6 class="text-uppercase text-secondary font-weight-bolder">Check Availability</h6>

        <form class="row g-3">
            <div class="col-md-6">
                <label for="from" class="form-label">From</label>
                <input type="text" name="Start Date" class="form-control" placeholder="Start Date">
            </div>
            <div class="col-md-6">
                <label for="to" class="form-label">To</label>
                <input type="text" name="End Date" class="form-control" placeholder="End Date">
            </div>
            <div class="d-grid">
                <button class="btn btn-secondary btn-sm">Check!</button>
            </div>
        </form>
    </div>
</template>

<style scoped>
label {
    text-transform: uppercase;
    color:gray;
    font-weight: bolder;
}
</style>