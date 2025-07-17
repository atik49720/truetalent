<template>
    <Head title="TrueTalent - Trust in Every Hire" />
    <div class="font-sans bg-white text-gray-900">
        <!-- Header -->
        <header class="bg-white shadow-md sticky top-0 z-50">
            <nav class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3">
                <div class="flex items-center gap-3">
                    <ApplicationLogo alt="TrueTalent Logo" class="h-10 w-10 rounded-full shadow" />
                    <span class="text-2xl md:text-3xl font-extrabold text-blue-700 tracking-tight">TrueTalent</span>
                </div>
                <ul class="hidden md:flex gap-8 text-blue-700 font-semibold">
                    <li><a href="#home" @click.prevent="scrollTo('home')" class="hover:text-blue-500">Home</a></li>
                    <li><a href="#about" @click.prevent="scrollTo('about')" class="hover:text-blue-500">About</a></li>
                    <li><a href="#features" @click.prevent="scrollTo('features')" class="hover:text-blue-500">Features</a></li>
                    <li><a href="#pricing" @click.prevent="scrollTo('pricing')" class="hover:text-blue-500">Pricing</a></li>
                    <li><a href="#contact" @click.prevent="scrollTo('contact')" class="hover:text-blue-500">Contact</a></li>
                </ul>
                <div class="flex gap-2">
                    <a href="/login" class="px-4 py-2 rounded text-blue-700 border border-blue-700 hover:bg-blue-100 font-semibold transition">Login</a>
                    <a href="/register" class="px-4 py-2 rounded bg-blue-700 text-white hover:bg-blue-800 font-semibold transition">Register</a>
                </div>
            </nav>
        </header>

        <!-- Hero Section -->
        <section id="home" class="bg-blue-50 py-20 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-blue-800 mb-4 animate-fadein drop-shadow">Verified Talent. Trusted Companies.</h1>
            <p class="mt-4 text-gray-700 text-lg md:text-xl max-w-2xl mx-auto">TrueTalent connects verified professionals with legitimate employers through trust and transparency in hiring.</p>
            <div class="mt-8 flex flex-col md:flex-row justify-center gap-4">
                <a href="/register" class="bg-blue-700 text-white px-6 py-3 rounded shadow hover:bg-blue-800 transition font-semibold">Get Started</a>
            </div>
        </section>

        <!-- About Us -->
        <section id="about" class="py-16 px-4 bg-white">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-blue-700 mb-2">About TrueTalent</h2>
                <p class="mt-4 text-gray-600">TrueTalent is a verified recruitment platform addressing trust issues in hiring. We verify both candidates and companies, ensuring accurate credentials, real reviews, and reliable hires. Our mission is to bring transparency and efficiency into the recruitment process.</p>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="bg-gray-100 py-16 px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-center text-blue-700 mb-10">Platform Features</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- For Job Seekers -->
                    <div class="bg-white rounded-lg shadow p-8 hover:scale-105 transition">
                        <h3 class="text-xl font-semibold text-blue-700 flex items-center gap-2 mb-4">
                            <FontAwesomeIcon :icon="faUserCheck" class="text-blue-400 text-2xl" /> For Job Seekers
                        </h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-2">
                            <li>Verified job listings only</li>
                            <li>Build a verified profile</li>
                            <li>Get rated by previous employers</li>
                            <li>See company ratings before applying</li>
                        </ul>
                    </div>
                    <!-- For Recruiters -->
                    <div class="bg-white rounded-lg shadow p-8 hover:scale-105 transition">
                        <h3 class="text-xl font-semibold text-blue-700 flex items-center gap-2 mb-4">
                            <FontAwesomeIcon :icon="faBriefcase" class="text-blue-400 text-2xl" /> For Recruiters
                        </h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-2">
                            <li>Post jobs to a pool of verified talent</li>
                            <li>View candidate history and ratings</li>
                            <li>Build trust through employer reviews</li>
                            <li>Flexible pricing and hiring tools</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="pricing" class="py-16 bg-white px-4">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-blue-700 mb-2">Pricing Plans</h2>
                <p class="text-gray-600 mt-2 mb-10">Flexible options for startups, growing teams, and agencies.</p>
                <div class="grid md:grid-cols-3 gap-8 text-left">
                    <div class="border p-6 rounded-lg shadow hover:scale-105 transition">
                        <h3 class="text-xl font-bold text-blue-700 flex items-center gap-2">
                            <FontAwesomeIcon :icon="faGem" class="text-blue-400" /> Basic
                        </h3>
                        <p class="text-gray-700 mt-2">For Individuals</p>
                        <ul class="list-disc list-inside text-gray-600 mt-4 space-y-1">
                            <li>Access to verified jobs</li>
                            <li>Create profile and apply</li>
                        </ul>
                    </div>
                    <div class="border p-6 rounded-lg shadow hover:scale-105 transition">
                        <h3 class="text-xl font-bold text-blue-700 flex items-center gap-2">
                            <FontAwesomeIcon :icon="faRocket" class="text-blue-400" /> Pro
                        </h3>
                        <p class="text-gray-700 mt-2">For Companies</p>
                        <ul class="list-disc list-inside text-gray-600 mt-4 space-y-1">
                            <li>Unlimited job posts</li>
                            <li>Advanced filters</li>
                            <li>Employer dashboard</li>
                        </ul>
                    </div>
                    <div class="border p-6 rounded-lg shadow hover:scale-105 transition">
                        <h3 class="text-xl font-bold text-blue-700 flex items-center gap-2">
                            <FontAwesomeIcon :icon="faCrown" class="text-blue-400" /> Premium
                        </h3>
                        <p class="text-gray-700 mt-2">For Agencies</p>
                        <ul class="list-disc list-inside text-gray-600 mt-4 space-y-1">
                            <li>Candidate outreach tools</li>
                            <li>Premium placement</li>
                            <li>Dedicated support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="bg-gray-100 py-16 px-4">
            <div class="max-w-xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-blue-700 mb-2">Contact Us</h2>
                <p class="text-gray-600 mt-2">Got questions or want to partner with us?</p>
                <form class="mt-8 space-y-4" @submit.prevent="submitContact">
                    <input type="text" placeholder="Your Name" class="w-full p-3 border border-gray-300 rounded focus:outline-blue-700" />
                    <input type="email" placeholder="Your Email" class="w-full p-3 border border-gray-300 rounded focus:outline-blue-700" />
                    <textarea rows="4" placeholder="Your Message" class="w-full p-3 border border-gray-300 rounded focus:outline-blue-700"></textarea>
                    <button type="submit" class="bg-blue-700 text-white px-6 py-3 rounded hover:bg-blue-800 transition font-semibold">Send Message</button>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-blue-800 text-white py-8 text-center">
            <p>&copy; 2025 TrueTalent. All rights reserved.</p>
            <div class="mt-2">
                <a href="/login" class="underline text-white hover:text-blue-200">Login</a> |
                <a href="/register" class="underline text-white hover:text-blue-200">Register</a>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faUserCheck, faBriefcase, faGem, faRocket, faCrown } from '@fortawesome/free-solid-svg-icons';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

function scrollTo(id) {
    document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' });
}
function submitContact() {
    alert('Thank you for contacting TrueTalent!');
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
.font-sans { font-family: 'Montserrat', sans-serif; }
.animate-fadein {
    animation: fadein 1.2s cubic-bezier(.4,0,.2,1) both;
}
@keyframes fadein {
    0% { opacity: 0; transform: translateY(30px);}
    100% { opacity: 1; transform: translateY(0);}
}
.drop-shadow {
    text-shadow: 0 2px 8px rgba(0, 159, 227, 0.15);
}
</style>
