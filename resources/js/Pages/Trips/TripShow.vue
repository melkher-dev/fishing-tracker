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
                    <h1>{{ trip.location }}</h1>
                    <h1>{{ trip.latitude }}</h1>
                    <h1>{{ trip.lontitude }}</h1>
                    <h1>{{ trip.fishing_details[0].fish }}</h1>
                    <img
                        :src="trip.fishing_details[0].image"
                        alt="photo"
                        style="width: 200px"
                    />
                    <h1>{{ trip.fishing_details[0].quantity }}</h1>
                    <h1>{{ trip.duration }}</h1>
                    <h1>{{ trip.notes }}</h1>
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
