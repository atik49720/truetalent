<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    companies: Array,
    hiringJobs: Array,
    jobApplications: Array,
});

console.log(props.hiringJobs)

const hasCompanies = computed(() => props.companies.length > 0);
const hasJobApplications = computed(() => props.jobApplications.length > 0);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Your Companies</h3>
                        <div v-if="hasCompanies">
                            <ul class="list-disc pl-5">
                                <li v-for="company in props.companies" :key="company.id">
                                    <a :href="`/company/${company.id}`" class="text-blue-500 hover:underline">
                                        {{ company.name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div v-else>
                            <p>You have not created any companies yet.</p>
                        </div>

                        <h3 class="text-lg font-medium text-gray-900 mt-8 mb-4">Your Hiring Jobs</h3>
                        <div v-if="props.hiringJobs.length > 0">
                            <ul class="list-disc pl-5">
                                <li v-for="job in props.hiringJobs" :key="job.id">
                                    <a :href="`/job/${job.id}`" class="text-blue-500 hover:underline">
                                        {{ job.title }}
                                    </a>
                                    <span> at </span>
                                    <a :href="`/company/${job.company_id}`" class="text-blue-500 hover:underline">
                                        {{ job.company_name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div v-else>
                            <p>You are not currently hiring for any jobs.</p>
                        </div>

                        <h3 class="text-lg font-medium text-gray-900 mt-8 mb-4">Your Job Applications</h3>
                        <div v-if="hasJobApplications">
                            <ul class="list-disc pl-5">
                                <li v-for="application in props.jobApplications" :key="application.id">
                                    <span>Applied for: </span>
                                    <a :href="`/job/${application.job_id}`" class="text-blue-500 hover:underline">
                                        {{ application.job_title }}
                                    </a>
                                    <span> at </span>
                                    <a :href="`/company/${application.company_id}`" class="text-blue-500 hover:underline">
                                        {{ application.company_name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div v-else>
                            <p>You have not applied for any jobs yet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
