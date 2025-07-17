<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-extrabold text-2xl text-blue-700 flex items-center gap-2 py-4">
                <FontAwesomeIcon :icon="faTachometerAlt" class="text-blue-400" />
                Dashboard
            </h2>
        </template>

        <div class="py-12 font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-blue-50 rounded-lg shadow p-6 flex flex-col items-center">
                        <FontAwesomeIcon :icon="faBuilding" class="text-blue-600 text-3xl mb-2" />
                        <div class="text-2xl font-bold text-blue-700">3</div>
                        <div class="text-gray-700">Companies</div>
                    </div>
                    <div class="bg-green-50 rounded-lg shadow p-6 flex flex-col items-center">
                        <FontAwesomeIcon :icon="faBriefcase" class="text-green-600 text-3xl mb-2" />
                        <div class="text-2xl font-bold text-green-700">7</div>
                        <div class="text-gray-700">Hiring Jobs</div>
                    </div>
                    <div class="bg-yellow-50 rounded-lg shadow p-6 flex flex-col items-center">
                        <FontAwesomeIcon :icon="faPaperPlane" class="text-yellow-600 text-3xl mb-2" />
                        <div class="text-2xl font-bold text-yellow-700">12</div>
                        <div class="text-gray-700">Applications</div>
                    </div>
                    <div class="bg-purple-50 rounded-lg shadow p-6 flex flex-col items-center">
                        <FontAwesomeIcon :icon="faBell" class="text-purple-600 text-3xl mb-2" />
                        <div class="text-2xl font-bold text-purple-700">4</div>
                        <div class="text-gray-700">Notifications</div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col md:flex-row justify-center gap-6 mb-10">
                    <a href="/company/create"
                       class="flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-400 text-white px-6 py-3 rounded-lg shadow-lg hover:from-blue-700 hover:to-blue-500 transition font-semibold text-base"
                    >
                        <FontAwesomeIcon :icon="faBuilding" />
                        Create Company
                    </a>
                    <a href="/job/create"
                       class="flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-400 text-white px-6 py-3 rounded-lg shadow-lg hover:from-green-700 hover:to-green-500 transition font-semibold text-base"
                    >
                        <FontAwesomeIcon :icon="faBriefcase" />
                        Create Job
                    </a>
                </div>

                <!-- Informative Sections -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Job Seeker Section -->
                    <div>
                        <div class="bg-white rounded-lg shadow p-6 mb-6">
                            <h3 class="text-xl font-bold text-blue-700 mb-4 flex items-center gap-2">
                                <FontAwesomeIcon :icon="faUserCheck" /> For Job Seekers
                            </h3>
                            <!-- Recent Jobs -->
                            <div class="mb-4">
                                <div class="font-semibold text-gray-700 mb-2">Recent Jobs</div>
                                <ul class="space-y-2">
                                    <li class="flex justify-between">
                                        <span>Frontend Developer</span>
                                        <span class="text-green-600">Open</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span>UI/UX Designer</span>
                                        <span class="text-green-600">Open</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span>PHP Backend Engineer</span>
                                        <span class="text-red-500">Closed</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Application Status -->
                            <div class="mb-4">
                                <div class="font-semibold text-gray-700 mb-2">Application Status</div>
                                <div class="flex items-center gap-2">
                                    <span class="text-yellow-600 font-bold">Pending: 2</span>
                                    <span class="text-green-600 font-bold">Accepted: 1</span>
                                    <span class="text-red-500 font-bold">Rejected: 1</span>
                                </div>
                            </div>
                            <!-- Interview Schedule -->
                            <div class="mb-4">
                                <div class="font-semibold text-gray-700 mb-2">Upcoming Interviews</div>
                                <ul class="space-y-1 text-sm">
                                    <li>Frontend Developer - 12 June, 10:00 AM</li>
                                    <li>UI/UX Designer - 15 June, 2:00 PM</li>
                                </ul>
                            </div>
                            <!-- Saved Jobs -->
                            <div class="mb-4">
                                <div class="font-semibold text-gray-700 mb-2">Saved Jobs</div>
                                <ul class="space-y-1 text-sm">
                                    <li>React Developer</li>
                                    <li>Laravel Engineer</li>
                                </ul>
                            </div>
                            <!-- Profile Completion -->
                            <div>
                                <div class="font-semibold text-gray-700 mb-2">Profile Completion</div>
                                <div class="w-full bg-gray-200 rounded-full h-4">
                                    <div class="bg-blue-600 h-4 rounded-full" style="width: 80%"></div>
                                </div>
                                <div class="text-sm text-gray-500 mt-1">80% completed</div>
                            </div>
                        </div>
                        <!-- Notifications -->
                        <div class="bg-blue-50 rounded-lg shadow p-4 mb-6">
                            <h4 class="font-bold text-blue-700 mb-2 flex items-center gap-2">
                                <FontAwesomeIcon :icon="faBell" /> Notifications
                            </h4>
                            <ul class="space-y-1 text-sm">
                                <li>Interview scheduled for Frontend Developer.</li>
                                <li>Your application for UI/UX Designer is pending.</li>
                                <li>New job posted: React Developer.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Recruiter Section -->
                    <div>
                        <div class="bg-white rounded-lg shadow p-6 mb-6">
                            <h3 class="text-xl font-bold text-green-700 mb-4 flex items-center gap-2">
                                <FontAwesomeIcon :icon="faBriefcase" /> For Recruiters
                            </h3>
                            <!-- Recent Applicants -->
                            <div class="mb-4">
                                <div class="font-semibold text-gray-700 mb-2">Recent Applicants</div>
                                <ul class="space-y-2">
                                    <li class="flex justify-between">
                                        <span>John Doe</span>
                                        <span class="text-blue-600">Frontend Developer</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span>Jane Smith</span>
                                        <span class="text-blue-600">UI/UX Designer</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span>Mike Lee</span>
                                        <span class="text-blue-600">PHP Backend Engineer</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Job Performance (Dummy Line Chart) -->
                            <div class="mb-4">
                                <div class="font-semibold text-gray-700 mb-2">Job Performance</div>
                                <div class="w-full h-24 flex items-end gap-2">
                                    <div class="bg-blue-400 w-4 rounded-t-lg" style="height: 30%"></div>
                                    <div class="bg-green-400 w-4 rounded-t-lg" style="height: 60%"></div>
                                    <div class="bg-yellow-400 w-4 rounded-t-lg" style="height: 80%"></div>
                                    <div class="bg-red-400 w-4 rounded-t-lg" style="height: 50%"></div>
                                    <div class="bg-blue-400 w-4 rounded-t-lg" style="height: 70%"></div>
                                </div>
                                <div class="flex justify-between text-xs text-gray-500 mt-1">
                                    <span>Mon</span>
                                    <span>Tue</span>
                                    <span>Wed</span>
                                    <span>Thu</span>
                                    <span>Fri</span>
                                </div>
                            </div>
                            <!-- Company Stats -->
                            <div class="mb-4">
                                <div class="font-semibold text-gray-700 mb-2">Company Stats</div>
                                <div class="flex gap-6">
                                    <div>
                                        <div class="text-lg font-bold text-blue-700">5</div>
                                        <div class="text-gray-500 text-sm">Active Jobs</div>
                                    </div>
                                    <div>
                                        <div class="text-lg font-bold text-green-700">20</div>
                                        <div class="text-gray-500 text-sm">Applicants</div>
                                    </div>
                                    <div>
                                        <div class="text-lg font-bold text-yellow-700">3</div>
                                        <div class="text-gray-500 text-sm">Interviews</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Interview Schedule -->
                            <div class="mb-4">
                                <div class="font-semibold text-gray-700 mb-2">Upcoming Interviews</div>
                                <ul class="space-y-1 text-sm">
                                    <li>John Doe - Frontend Developer - 12 June, 10:00 AM</li>
                                    <li>Jane Smith - UI/UX Designer - 15 June, 2:00 PM</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Notifications -->
                        <div class="bg-green-50 rounded-lg shadow p-4 mb-6">
                            <h4 class="font-bold text-green-700 mb-2 flex items-center gap-2">
                                <FontAwesomeIcon :icon="faBell" /> Notifications
                            </h4>
                            <ul class="space-y-1 text-sm">
                                <li>New applicant: John Doe for Frontend Developer.</li>
                                <li>Interview scheduled with Jane Smith.</li>
                                <li>Job "React Developer" received 5 new applications.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import {
    faTachometerAlt, faBuilding, faBriefcase, faPaperPlane, faUserCheck, faBell
} from '@fortawesome/free-solid-svg-icons';
</script>

<style scoped>
.font-sans { font-family: 'Montserrat', sans-serif; }
</style>
