<script setup>
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    semesters: Array,
    pai: Array,
    pkn: Array,
    mtk: Array,
    bindo: Array,
    bing: Array,
    ipa: Array,
    ips: Array,
    pjok: Array,
    tik: Array,
    prakarya: Array,
});

const subjects = [
    { key: 'pai', label: 'PAI', data: props.pai },
    { key: 'pkn', label: 'PKN', data: props.pkn },
    { key: 'mtk', label: 'Matematika', data: props.mtk },
    { key: 'bindo', label: 'B.Indonesia', data: props.bindo },
    { key: 'bing', label: 'B.Inggris', data: props.bing },
    { key: 'ipa', label: 'IPA', data: props.ipa },
    { key: 'ips', label: 'IPS', data: props.ips },
    { key: 'pjok', label: 'PJOK', data: props.pjok },
    { key: 'tik', label: 'TIK', data: props.tik },
    { key: 'prakarya', label: 'Prakarya', data: props.prakarya },
];
</script>

<template>

    <Head title="SMPN6" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        <!-- Navbar -->
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link v-if="$page.props.auth?.user" :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
            Dashboard
            </Link>
            <template v-else>
                <Link :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                Log in
                </Link>
                <Link v-if="canRegister" :href="route('register')"
                    class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                Register
                </Link>
            </template>
        </div>

        <!-- Main Content -->
        <div class="w-full mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <h1 class="mt-6 text-4xl font-semibold text-gray-900 dark:text-white">
                    SMPN 6 Padang Panjang
                </h1>
            </div>

            <div class="mt-16">
                <div v-for="(semester, jndex) in semesters" :key="jndex" class="mb-10">
                    <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-6">
                        Semester {{ jndex + 1 }}
                    </h2>

                    <!-- Top Scores Section -->
                    <div class="flex flex-row flex-wrap justify-center gap-4 mb-6">
                        <div v-for="(score, index) in semester" :key="`top-${jndex}-${index}`">
                            <div
                                class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md dark:shadow-none transition hover:scale-105">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Juara {{ index + 1 }} - Total: {{ score.total_nilai }}
                                </h3>
                                <p class="mt-4 text-xl text-gray-700 dark:text-gray-200">
                                    {{ score.name }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto overflow-y-hidden">
                        <div class="flex flex-nowrap gap-4 min-w-full px-4">
                            <div v-for="subject in subjects" :key="subject.key"
                                class="flex flex-col items-center min-w-[270px] p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md dark:shadow-none transition hover:scale-105">
                                <h3 class="text-2xl font-semibold text-center text-gray-800 dark:text-white mb-3">
                                    Top {{ subject.label }}
                                </h3>
                                <div v-for="(score, index) in subject.data[jndex]"
                                    :key="`${subject.key}-${jndex}-${index}`">
                                    <h4 class="text-lg font-semibold text-gray-800 dark:text-white">
                                        {{ score.name.length > 18 ? score.name.slice(0, 16) + '..' : score.name }} - {{
                                            score.study }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="text-sm text-center text-gray-500 dark:text-gray-400">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
