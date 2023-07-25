<template>
    <Head title="All Trips" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All Trips
            </h2>
        </template>
        <div class="grid grid-cols-4">
            <div
                v-for="(trip, index) in trips"
                :key="index"
                class="card w-96 bg-white text-gray-800 shadow-xl mt-5 mx-5"
            >
                <div class="card-body">
                    <h2 class="card-title">Location: {{ trip.location }}</h2>
                    <h2 class="card-title">
                        {{ new Date(trip.date).toDateString() }}
                    </h2>
                    <div class="card-actions justify-end">
                        <a :href="`/trip/${trip.id}`">
                            <button class="btn btn-primary btn-outline btn-sm">
                                Details
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    trips: {
        type: Object,
    },
});
</script>

<style lang="scss" scoped></style>
