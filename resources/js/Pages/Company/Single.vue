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
                            <img :src="props.company.logo" alt="Company Logo" class="w-80 h-80 object-cover rounded-full">
                        </div>
                        <div class="w-full md:w-2/3 p-6 text-gray-900">
                            <p class="mb-4">

                                <strong class="text-2xl">{{ props.company.name }}</strong>
                                <span v-if="props.company.verification_status === 'verified'" class="text-blue-600 inline-flex items-center ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                      <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"></path>
                                    </svg>
                                </span>

                            </p>
                            <p class="mb-4"><strong>Description:</strong> {{ props.company.description }}</p>
                            <p class="mb-4"><strong>Email:</strong> {{ props.company.email }}</p>
                            <p class="mb-4"><strong>Website:</strong> <a :href="props.company.website" class="text-blue-600">{{ props.company.website }}</a></p>
                            <p class="mb-4"><strong>Phone Number:</strong> +{{ props.company.calling_code }} {{ props.company.phone_number }}</p>
                            <p class="mb-4"><strong>Category:</strong> {{ props.company.category }}</p>
                            <p class="mb-4"><strong>Industry:</strong> {{ props.company.industry }}</p>
                            <p class="mb-4"><strong>Company Size:</strong> {{ props.company.size }}</p>
                            <p class="mb-4"><strong>Founded at:</strong> {{ props.company.founded }}</p>
                            <p class="mb-4"><strong>Address:</strong> {{ props.company.street }}, {{ props.company.city }} - {{ props.company.zip }}, {{ props.company.state }}, {{ props.company.country }}</p>
                            <p class="mb-4"><strong>Trade License:</strong> {{ props.company.trade_license }}</p>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-4 p-4">
                        <form v-if="props.company.verification_status === 'pending' && props.authUser.id === 1" method="POST" action="/company/verify" class="flex justify-center items-center">
                            <input type="hidden" name="_token" :value="props.csrf_token">
                            <input type="hidden" name="company_id" :value="props.company.id">
                            <input type="submit" value="Mark As Verified" class="px-4 py-2 bg-green-600 text-black rounded">
                        </form>
                        <Link :href="`/company/${props.company.id}/jobs`" class="px-4 py-2 bg-yellow-600 text-black rounded">View Circulars</Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
