<template>
    <Head title="Create Trip" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Trip
            </h2>
        </template>

        <div class="flex justify-center">
            <div class="card bg-white w-2/3 text-gray-800 shadow-xl m-5">
                <div class="card-body">
                    <div>
                        <input
                            v-model="form.location"
                            type="text"
                            placeholder="Location"
                            class="input bg-white input-bordered input-primary w-full"
                        />
                    </div>

                    <div>
                        <input
                            v-model="form.latitude"
                            type="text"
                            placeholder="Latitude"
                            class="input bg-white input-bordered input-primary w-full"
                        />
                    </div>

                    <div>
                        <input
                            v-model="form.longitude"
                            type="text"
                            placeholder="Longitude"
                            class="input bg-white input-bordered input-primary w-full"
                        />
                    </div>

                    <div
                        v-for="(fishing_detail, index) in form.fishing_details"
                        :key="index"
                        class="grid grid-cols-3"
                    >
                        <div class="mr-1">
                            <select
                                v-model="fishing_detail.fish"
                                class="select select-primary bg-white w-full"
                            >
                                <option value="" disabled selected hidden>
                                    Select your fish
                                </option>
                                <option :value="fish.type" v-for="fish in fish">
                                    {{ fish.type }}
                                </option>
                            </select>
                        </div>
                        <div class="mx-2">
                            <input
                                v-model="fishing_detail.quantity"
                                type="number"
                                placeholder="Quantity"
                                class="input input-bordered input-primary bg-white w-full"
                            />
                        </div>
                        <div class="ml-1">
                            <input
                                v-on:change="fileUpload($event, index)"
                                type="file"
                                class="file-input file-input-bordered file-input-primary bg-white w-full"
                            />
                        </div>
                    </div>

                    <div>
                        <input
                            v-model="form.duration"
                            type="number"
                            placeholder="Duration"
                            class="input bg-white input-bordered input-primary w-full"
                        />
                    </div>

                    <div>
                        <textarea
                            v-model="form.notes"
                            class="textarea textarea-primary bg-white w-full"
                            placeholder="Notes"
                        ></textarea>
                    </div>

                    <div>
                        <input
                            v-model="form.date"
                            type="date"
                            placeholder="Date"
                            class="input bg-white input-bordered input-primary w-full"
                        />
                    </div>

                    <div class="flex justify-center">
                        <button @click="handleTrip">
                            <span class="btn btn-primary btn-outline"
                                >Create Trip</span
                            >
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";
import { reactive, ref } from "vue";
import axios from "axios";

const form = reactive({
    location: "",
    latitude: "",
    longitude: "",
    fishing_details: [
        {
            fish: "",
            quantity: "",
            image: "",
        },
    ],
    duration: "",
    notes: "",
    date: "",
});

const props = defineProps({
    fish: {
        type: Array,
    },
});

const fish = ref(props.fish);

const handleTrip = async () => {
    const response = await axios.post("/trip/store", form);
    console.log(response.data);
    // router.push({ name: "trips.index" });
};

const fileUpload = async (e, index) => {
    const file = e.target.files[0];
    const formData = new FormData();
    formData.append("image", file);
    const config = {
        headers: {
            "content-type": "multipart/form-data",
        },
    };
    const response = await axios.post("/trip/upload", formData, config);

    form.fishing_details[index].image = response.data;
};
</script>

<style lang="scss" scoped></style>
