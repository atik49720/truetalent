<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const { props } = usePage();
</script>

<template>
    <Head :title="props.company.name" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ props.company.name }} Company Details</h2>
                <Link href="/company/all" class="px-4 py-2 bg-blue-600 text-white rounded">Back</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/3 p-6 text-gray-900 flex justify-center items-center">
                            <img :src="props.company.logo" alt="Company Logo" class="w-32 h-32 object-cover rounded-full">
                        </div>
                        <div class="w-full md:w-2/3 p-6 text-gray-900">
                            <p class="mb-4"><strong>Company Name:</strong> {{ props.company.name }}</p>
                            <p class="mb-4"><strong>Description:</strong> {{ props.company.description }}</p>
                            <p class="mb-4"><strong>Email:</strong> {{ props.company.email }}</p>
                            <p class="mb-4"><strong>Website:</strong> <a :href="props.company.website" class="text-blue-600">{{ props.company.website }}</a></p>
                            <p class="mb-4"><strong>Phone Number:</strong> +{{ props.company.calling_code }} {{ props.company.phone_number }}</p>
                            <p class="mb-4"><strong>Category:</strong> {{ props.company.category }}</p>
                            <p class="mb-4"><strong>Industry:</strong> {{ props.company.industry }}</p>
                            <p class="mb-4"><strong>Company Size:</strong> {{ props.company.size }}</p>
                            <p class="mb-4"><strong>Founded at:</strong> {{ props.company.founded }}</p>
                            <p class="mb-4"><strong>Address:</strong> {{ props.company.street }}, {{ props.company.city }}, {{ props.company.state }}, {{ props.company.country }} - {{ props.company.zip }}</p>
                            <p class="mb-4"><strong>Trade License:</strong> {{ props.company.trade_license }}</p>
                            <p class="mb-4"><strong>Verification Status:</strong> {{ props.company.verification_status }}</p>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-4 p-4">
                        <Link href="/company/{{ props.company.id }}/employees" class="px-4 py-2 bg-green-600 text-black rounded">View Employees</Link>
                        <Link href="/company/{{ props.company.id }}/circulars" class="px-4 py-2 bg-yellow-600 text-black rounded">View Circulars</Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
