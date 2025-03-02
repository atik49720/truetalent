<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const { props } = usePage();
console.log(props.job);
</script>

<template>
    <Head :title="props.job.title" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ props.job.title }} Job Details</h2>
                <Link href="/job/all" class="px-4 py-2 bg-blue-600 text-white rounded">Back</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="flex flex-wrap">
                        <div class="w-full p-6 text-gray-900">
                            <p class="mb-4">
                                <strong class="text-2xl">{{ props.job.title }}</strong>
                            </p>
                            <p class="mb-4"><strong>Description:</strong> {{ props.job.description }}</p>
                            <p class="mb-4"><strong>Location:</strong> {{ props.job.location }}</p>
                            <p class="mb-4"><strong>Salary:</strong> {{ props.job.salary }}</p>
                            <p class="mb-4"><strong>Posted at:</strong> {{ props.job.created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
