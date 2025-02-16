<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const { props } = usePage();
</script>

<template>
    <Head title="Company List" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Company List</h2>
                <Link href="/company/create" class="px-4 py-2 bg-blue-600 text-white rounded">Create Company</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <div v-for="company in props.companies" :key="company.id" class="bg-white overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900">
                            <img :src="company.logo" alt="Company Logo" class="w-full h-32 object-cover mb-4 rounded">
                            <h3 class="font-semibold text-lg mb-2">{{ company.name }}</h3>
                            <p class="mb-4">{{ company.description }}</p>
                            <Link :href="`/company/${company.id}`" class="px-4 py-2 bg-blue-600 text-white rounded">View Details</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
