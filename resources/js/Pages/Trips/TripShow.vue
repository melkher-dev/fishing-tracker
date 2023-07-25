<template>
    <Head title="Show Trip" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Show Trip
            </h2>
        </template>

        <div class="flex justify-center">
            <div class="card bg-white w-2/3 text-gray-800 shadow-xl m-5">
                <div class="card-body">
                    <div class="card-actions justify-center">
                        <h1>
                            <strong>Location: {{ trip.location }}</strong>
                        </h1>
                    </div>
                    <div>
                        <h1>Latitude: {{ trip.latitude }}</h1>
                        <h1>Lontitude: {{ trip.lontitude }}</h1>
                    </div>
                    <div class="card-actions justify-center">
                        <h1>Fishing Details</h1>
                    </div>
                    <div
                        class="grid grid-cols-3 card-actions justify-center"
                        v-for="(fishing_detail, index) in trip.fishing_details"
                        :key="index"
                    >
                        <div>
                            <h1>Fish: {{ fishing_detail.fish }}</h1>
                        </div>
                        <div>
                            <img
                                :src="fishing_detail.image"
                                alt="photo"
                                style="width: 100px"
                            />
                        </div>
                        <div>
                            <h1>Quantity: {{ fishing_detail.quantity }}</h1>
                        </div>
                    </div>
                    <h1>Duration: {{ trip.duration }}</h1>
                    <h1>Notes: {{ trip.notes }}</h1>
                    <h1>{{ new Date(trip.date).toDateString() }}</h1>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    trip: {
        type: Object,
        required: true,
    },
});

const trip = ref(props.trip);
</script>

<style lang="scss" scoped></style>
