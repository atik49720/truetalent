<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const { props } = usePage();
</script>

<template>
    <Head title="Job Create" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Job Create</h2>
                <Link href="/job/all" class="px-4 py-2 bg-blue-600 text-white rounded">Back</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form method="POST" action="/job/store" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <input type="hidden" name="_token" :value="props.csrf_token">
                    <select name="company_id" class="p-2 border rounded" required>
                        <option value="" disabled selected>Select Company</option>
                        <option v-for="company in props.companies" :key="company.id" :value="company.id">{{ company.name }}</option>
                    </select>
                    <input type="text" name="title" placeholder="Title" class="p-2 border rounded" required>
                    <input type="text" name="description" placeholder="Description" class="p-2 border rounded" required>
                    <select name="category" class="p-2 border rounded" required>
                        <option value="" disabled selected>Select Category</option>
                        <option value="IT">IT</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                        <option value="HR">HR</option>
                        <option value="Sales">Sales</option>
                    </select>
                    <input type="text" name="location" placeholder="Location" class="p-2 border rounded" required>
                    <input type="text" name="salary" placeholder="Salary" class="p-2 border rounded" required>
                    <select name="currency" class="p-2 border rounded" required>
                        <option value="" disabled selected>Select Currency</option>
                        <option value="BDT">BDT</option>
                        <option value="USD">USD</option>
                    </select>
                    <select name="type" class="p-2 border rounded" required>
                        <option value="" disabled selected>Select Type</option>
                        <option value="full-time">Full-Time</option>
                        <option value="part-time">Part-Time</option>
                        <option value="contract">Contract</option>
                        <option value="internship">Internship</option>
                    </select>
                    <select name="shift" class="p-2 border rounded" required>
                        <option value="" disabled selected>Select Shift</option>
                        <option value="morning">Morning</option>
                        <option value="afternoon">Afternoon</option>
                        <option value="evening">Evening</option>
                        <option value="night">Night</option>
                    </select>
                    <input type="number" name="working_exp_year" placeholder="Working Experience (Years)" class="p-2 border rounded" required>
                    <input type="number" name="working_hours" placeholder="Working Hours Daily" class="p-2 border rounded" required>
                    <input type="number" name="vacancies" placeholder="Vacancies" class="p-2 border rounded" required>
                    <input type="date" name="deadline" placeholder="Deadline" class="p-2 border rounded" required>
                    <select name="qualification" class="p-2 border rounded" required>
                        <option value="" disabled selected>Select Qualification</option>
                        <option value="none">None</option>
                        <option value="ssc">SSC</option>
                        <option value="hsc">HSC</option>
                        <option value="diploma">Diploma</option>
                        <option value="bachelor">Bachelor's Degree</option>
                        <option value="masters">Master's Degree</option>
                        <option value="phd">PhD</option>
                    </select>
                    <input type="text" name="skills" placeholder="Skills" class="p-2 border rounded" required>
                    <input type="text" name="responsibilities" placeholder="Responsibilities" class="p-2 border rounded" required>
                    <input type="text" name="benefits" placeholder="Benefits" class="p-2 border rounded" required>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Create Job</button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
