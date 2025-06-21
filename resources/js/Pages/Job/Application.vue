<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, router as $inertia } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const { props } = usePage();
const userInfo = ref({ ...props.userInfo });
const job = ref({ ...props.job });

console.log(job);

// Stepper state
const currentStep = ref(1);

// Job application form data
const jobApplication = ref({
    coverLetter: '',
});

// Computed property to check if all required fields in Step 1 are filled
const isProfileComplete = computed(() => {
    return (
        userInfo.value.father_name &&
        userInfo.value.mother_name &&
        userInfo.value.dob &&
        userInfo.value.calling_code &&
        userInfo.value.mobile &&
        userInfo.value.country &&
        userInfo.value.state &&
        userInfo.value.city &&
        userInfo.value.street &&
        userInfo.value.zip &&
        userInfo.value.present_country &&
        userInfo.value.present_state &&
        userInfo.value.present_city &&
        userInfo.value.present_street &&
        userInfo.value.present_zip &&
        userInfo.value.gender &&
        userInfo.value.nationality &&
        userInfo.value.religion &&
        userInfo.value.marital_status &&
        userInfo.value.blood_group &&
        userInfo.value.title &&
        userInfo.value.description
    );
});

function nextStep() {
    if (currentStep.value < 2) {
        currentStep.value++;
    }
}

function previousStep() {
    if (currentStep.value > 1) {
        currentStep.value--;
    }
}

function submitApplication() {
    // Submit the job application form using Inertia
    $inertia.post('/job-application/submit', jobApplication.value);
}
</script>

<template>
    <Head title="Job Application" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Job Application</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Progress Bar -->
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-6">
                            <div
                                class="bg-blue-600 h-2.5 rounded-full"
                                :style="{ width: currentStep === 1 ? '50%' : '100%' }"
                            ></div>
                        </div>

                        <!-- Step 1: Profile Information -->
                        <div v-if="currentStep === 1">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Step 1: Profile Information</h3>
                            <form method="POST" action="/profile/update" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <input type="hidden" name="_token" :value="props.csrf_token">
                                <div>
                                    <label for="father_name" class="block text-sm font-medium text-gray-700">Father's Name</label>
                                    <input
                                        id="father_name"
                                        v-model="userInfo.father_name"
                                        name="father_name"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="mother_name" class="block text-sm font-medium text-gray-700">Mother's Name</label>
                                    <input
                                        id="mother_name"
                                        v-model="userInfo.mother_name"
                                        name="mother_name"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                    <input
                                        id="dob"
                                        v-model="userInfo.dob"
                                        name="dob"
                                        type="date"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="calling_code" class="block text-sm font-medium text-gray-700">Calling Code</label>
                                    <input
                                        id="calling_code"
                                        v-model="userInfo.calling_code"
                                        name="calling_code"
                                        type="number"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                                    <input
                                        id="mobile"
                                        v-model="userInfo.mobile"
                                        name="mobile"
                                        type="number"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                    <input
                                        id="country"
                                        v-model="userInfo.country"
                                        name="country"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                                    <input
                                        id="state"
                                        v-model="userInfo.state"
                                        name="state"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input
                                        id="city"
                                        v-model="userInfo.city"
                                        name="city"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="street" class="block text-sm font-medium text-gray-700">Street</label>
                                    <input
                                        id="street"
                                        v-model="userInfo.street"
                                        name="street"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="zip" class="block text-sm font-medium text-gray-700">ZIP Code</label>
                                    <input
                                        id="zip"
                                        v-model="userInfo.zip"
                                        name="zip"
                                        type="number"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="present_country" class="block text-sm font-medium text-gray-700">Present Country</label>
                                    <input
                                        id="present_country"
                                        v-model="userInfo.present_country"
                                        name="present_country"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="present_state" class="block text-sm font-medium text-gray-700">Present State</label>
                                    <input
                                        id="present_state"
                                        v-model="userInfo.present_state"
                                        name="present_state"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="present_city" class="block text-sm font-medium text-gray-700">Present City</label>
                                    <input
                                        id="present_city"
                                        v-model="userInfo.present_city"
                                        name="present_city"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="present_street" class="block text-sm font-medium text-gray-700">Present Street</label>
                                    <input
                                        id="present_street"
                                        v-model="userInfo.present_street"
                                        name="present_street"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="present_zip" class="block text-sm font-medium text-gray-700">Present ZIP Code</label>
                                    <input
                                        id="present_zip"
                                        v-model="userInfo.present_zip"
                                        name="present_zip"
                                        type="number"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                    <input
                                        id="gender"
                                        v-model="userInfo.gender"
                                        name="gender"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                                    <input
                                        id="nationality"
                                        v-model="userInfo.nationality"
                                        name="nationality"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="religion" class="block text-sm font-medium text-gray-700">Religion</label>
                                    <input
                                        id="religion"
                                        v-model="userInfo.religion"
                                        name="religion"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="marital_status" class="block text-sm font-medium text-gray-700">Marital Status</label>
                                    <input
                                        id="marital_status"
                                        v-model="userInfo.marital_status"
                                        name="marital_status"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="blood_group" class="block text-sm font-medium text-gray-700">Blood Group</label>
                                    <input
                                        id="blood_group"
                                        v-model="userInfo.blood_group"
                                        name="blood_group"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                    <input
                                        id="title"
                                        v-model="userInfo.title"
                                        name="title"
                                        type="text"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea
                                        id="description"
                                        v-model="userInfo.description"
                                        name="description"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    ></textarea>
                                </div>

                                <div>
                                    <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                                    <input
                                        id="profile_image"
                                        type="file"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    />
                                </div>

                                <div>
                                    <label for="resume" class="block text-sm font-medium text-gray-700">Resume</label>
                                    <input
                                        id="resume"
                                        type="file"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    />
                                </div>

                                <!-- Other input fields remain unchanged -->

                                <div class="col-span-1 md:col-span-2 flex justify-end space-x-4">
                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-green-600 text-white rounded"
                                    >
                                        Update Profile
                                    </button>
                                    <button
                                        type="button"
                                        @click="nextStep"
                                        :disabled="!isProfileComplete"
                                        :title="!isProfileComplete ? 'Update your profile first' : ''"
                                        class="px-4 py-2 bg-blue-500 text-white rounded disabled:opacity-50"
                                    >
                                        Next Step
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Step 2: Job Application -->
                        <div v-if="currentStep === 2">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Step 2: Job Application</h3>
                            <form method="POST" action="">
                                <input type="hidden" name="_token" :value="props.csrf_token">

                                <div>
                                    <label for="cover_letter" class="block text-sm font-medium text-gray-700">Cover Letter</label>
                                    <textarea
                                        id="cover_letter"
                                        rows="15"
                                        v-model="jobApplication.coverLetter"
                                        name="cover_letter"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        required
                                    ></textarea>
                                </div>

                                <div class="mt-4 flex justify-between">
                                    <button
                                        type="button"
                                        @click="previousStep"
                                        class="px-4 py-2 bg-gray-600 text-white rounded"
                                    >
                                        Back
                                    </button>
                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-green-600 text-white rounded"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
