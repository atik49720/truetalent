<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const { props } = usePage();

const showDetailsModal = ref(false);
const showCoverLetterModal = ref(false);
const selectedApplicant = ref(null);

const openDetailsModal = (applicant) => {
    selectedApplicant.value = applicant;
    showDetailsModal.value = true;
};

const openCoverLetterModal = (applicant) => {
    selectedApplicant.value = applicant;
    showCoverLetterModal.value = true;
};

const closeDetailsModal = () => {
    showDetailsModal.value = false;
    selectedApplicant.value = null;
};

const closeCoverLetterModal = () => {
    showCoverLetterModal.value = false;
    selectedApplicant.value = null;
};
</script>

<template>
    <Head :title="`Applicants for ${props.jobInfo.title}`" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Applicants for {{ props.jobInfo.title }}</h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Gender
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Age
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Religion
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Mobile
                                </th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <template v-if="props.applicants.length > 0">
                                <tr v-for="(applicant, index) in props.applicants" :key="applicant.id">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ applicant.name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ applicant.gender }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ new Date().getFullYear() - new Date(applicant.dob).getFullYear() }} Y
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ applicant.religion }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ applicant.email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">+{{ applicant.calling_code }} {{ applicant.mobile }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <button @click="openDetailsModal(applicant)" class="px-4 py-2 bg-blue-600 text-white rounded">View Details</button>
                                        <button @click="openCoverLetterModal(applicant)" class="ml-2 px-4 py-2 bg-green-600 text-white rounded">Cover Letter</button>
                                    </td>
                                </tr>
                            </template>
                            <template v-else>
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No applicants found.</td>
                                </tr>
                            </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Modal -->
        <div v-if="showDetailsModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded shadow-lg max-w-md w-full">
                <h3 class="text-lg font-bold mb-4">Applicant Details (#{{ selectedApplicant.id }})</h3>
                <p><strong>Father's Name:</strong> {{ selectedApplicant.father_name }}</p>
                <p><strong>Mother's Name:</strong> {{ selectedApplicant.mother_name }}</p>
                <p><strong>Date of Birth:</strong> {{ selectedApplicant.dob }}</p>
                <p><strong>Calling Code:</strong> {{ selectedApplicant.calling_code }}</p>
                <p><strong>Mobile:</strong> {{ selectedApplicant.mobile }}</p>
                <p><strong>Country:</strong> {{ selectedApplicant.country }}</p>
                <p><strong>State:</strong> {{ selectedApplicant.state }}</p>
                <p><strong>City:</strong> {{ selectedApplicant.city }}</p>
                <p><strong>Street:</strong> {{ selectedApplicant.street }}</p>
                <p><strong>Zip:</strong> {{ selectedApplicant.zip }}</p>
                <p><strong>Present Country:</strong> {{ selectedApplicant.present_country }}</p>
                <p><strong>Present State:</strong> {{ selectedApplicant.present_state }}</p>
                <p><strong>Present City:</strong> {{ selectedApplicant.present_city }}</p>
                <p><strong>Present Street:</strong> {{ selectedApplicant.present_street }}</p>
                <p><strong>Present Zip:</strong> {{ selectedApplicant.present_zip }}</p>
                <p><strong>Gender:</strong> {{ selectedApplicant.gender }}</p>
                <p><strong>Nationality:</strong> {{ selectedApplicant.nationality }}</p>
                <p><strong>Religion:</strong> {{ selectedApplicant.religion }}</p>
                <p><strong>Marital Status:</strong> {{ selectedApplicant.marital_status }}</p>
                <p><strong>Blood Group:</strong> {{ selectedApplicant.blood_group }}</p>
                <p><strong>Title:</strong> {{ selectedApplicant.title }}</p>
                <p><strong>Description:</strong> {{ selectedApplicant.description }}</p>
                <p><strong>Profile Image:</strong> {{ selectedApplicant.profile_image }}</p>
                <div class="mt-4 flex justify-end">
                    <button @click="closeDetailsModal" class="px-4 py-2 bg-gray-600 text-white rounded">Close</button>
                </div>
            </div>
        </div>

        <!-- Cover Letter Modal -->
        <div v-if="showCoverLetterModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded shadow-lg max-w-md w-full">
                <h3 class="text-lg font-bold mb-4">Cover Letter (#{{ selectedApplicant.id }})</h3>
                <p>{{ selectedApplicant.cover_letter }}</p>
                <div class="mt-4 flex justify-end">
                    <button @click="closeCoverLetterModal" class="px-4 py-2 bg-gray-600 text-white rounded">Close</button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
