<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { countries} from "@/Custom/countries.js";

const { props } = usePage();
</script>

<template>
    <Head title="Company Create" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Company Create</h2>
                <Link href="/company/all" class="px-4 py-2 bg-blue-600 text-white rounded">Back</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form method="POST" action="/company/store" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <input type="hidden" name="_token" :value="props.csrf_token">
                    <input type="text" name="name" placeholder="Name" class="p-2 border rounded" required>
                    <select name="calling_code" class="p-2 border rounded" required>
                        <option value="" disabled selected>Select Calling Code</option>
                        <option v-for="country in countries" :key="country.value" :value="country.callingCode">{{ country.label + ' (' + country.callingCode + ')' }}</option>
                    </select>
                    <input type="number" name="phone_number" placeholder="Phone Number" class="p-2 border rounded" required>
                    <input type="email" name="email" placeholder="Email" class="p-2 border rounded" required>
                    <input type="url" name="website" placeholder="Website" class="p-2 border rounded" required>
                    <input type="text" name="description" placeholder="Description" class="p-2 border rounded" required>
                    <input type="text" name="logo" placeholder="Logo" class="p-2 border rounded" required>
                    <select name="category" class="p-2 border rounded" required>
                        <option value="" disabled selected>Select Category</option>
                        <option value="Sole-Proprietorship">Sole Proprietorship</option>
                        <option value="Partnership">Partnership</option>
                        <option value="Private-Limited-Company">Private Limited Company</option>
                        <option value="Public-Limited-Company">Public Limited Company</option>
                        <option value="Government-Owned">Government-Owned</option>
                        <option value="Non-Profit-Organization">Non-Profit Organization</option>
                        <option value="Cooperative-Society">Cooperative Society</option>
                        <option value="Joint-Venture">Joint Venture</option>
                    </select>
                    <select name="industry" class="p-2 border rounded" required>
                        <option value="" disabled selected>Select Industry</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Telecommunications">Telecommunications</option>
                        <option value="Finance & Banking">Finance & Banking</option>
                        <option value="E-commerce & Retail">E-commerce & Retail</option>
                        <option value="Healthcare & Pharmaceuticals">Healthcare & Pharmaceuticals</option>
                        <option value="Education & EdTech">Education & EdTech</option>
                        <option value="Manufacturing & Industrial">Manufacturing & Industrial</option>
                        <option value="Real Estate & Construction">Real Estate & Construction</option>
                        <option value="Media & Entertainment">Media & Entertainment</option>
                        <option value="Agriculture & Agribusiness">Agriculture & Agribusiness</option>
                        <option value="Transportation & Logistics">Transportation & Logistics</option>
                        <option value="Energy & Utilities">Energy & Utilities</option>
                        <option value="Hospitality & Tourism">Hospitality & Tourism</option>
                        <option value="Legal & Consulting Services">Legal & Consulting Services</option>
                        <option value="Marketing & Advertising">Marketing & Advertising</option>
                        <option value="Automotive & Aerospace">Automotive & Aerospace</option>
                        <option value="Non-Profit & Social Enterprises">Non-Profit & Social Enterprises</option>
                        <option value="Government & Public Administration">Government & Public Administration</option>
                        <option value="Cybersecurity & Data Protection">Cybersecurity & Data Protection</option>
                        <option value="Food & Beverage Industry">Food & Beverage Industry</option>
                    </select>
                    <select name="size" class="p-2 border rounded" required>
                        <option value="" disabled selected>Select Company Size</option>
                        <option value="1-10">1-10 employees</option>
                        <option value="11-50">11-50 employees</option>
                        <option value="51-200">51-200 employees</option>
                        <option value="201-500">201-500 employees</option>
                        <option value="501-1000">501-1000 employees</option>
                        <option value="1001-5000">1001-5000 employees</option>
                        <option value="5001-10000">5001-10000 employees</option>
                        <option value="10001+">10001+ employees</option>
                    </select>
                    <input type="text" name="founded" placeholder="Founded Year" class="p-2 border rounded" required>
                    <select name="country" class="p-2 border rounded" required>
                        <option value="" disabled selected>Select Country</option>
                        <option v-for="country in countries" :key="country.value" :value="country.value">{{ country.label }}</option>
                    </select>
                    <input type="text" name="state" placeholder="State" class="p-2 border rounded" required>
                    <input type="text" name="city" placeholder="City" class="p-2 border rounded" required>
                    <input type="text" name="street" placeholder="Street" class="p-2 border rounded" required>
                    <input type="number" name="zip" placeholder="Zip/Post Code" class="p-2 border rounded" required>
                    <input type="text" name="trade_license" placeholder="Trade License No" class="p-2 border rounded" required>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Register Company</button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
