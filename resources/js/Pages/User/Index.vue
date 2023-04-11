<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    users: {
        type: Array,
    },
});
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="max-w-screen-xl mx-auto px-4 md:px-8">
<!--                        <div class="items-start justify-between md:flex">-->
<!--                            <div class="max-w-lg">-->
<!--                                <h3 class="text-gray-800 text-xl font-bold sm:text-2xl">-->
<!--                                    Team members-->
<!--                                </h3>-->
<!--                                <p class="text-gray-600 mt-2">-->
<!--                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.-->
<!--                                </p>-->
<!--                            </div>-->
<!--                            <div class="mt-3 md:mt-0">-->
<!--                                <N-->
<!--                                    class="inline-block px-4 py-2 text-white duration-150 font-medium bg-indigo-600 rounded-lg hover:bg-indigo-500 active:bg-indigo-700 md:text-sm"-->
<!--                                >-->
<!--                                    Add member-->
<!--                                </N>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="mt-12 shadow-sm border rounded-lg overflow-x-auto">
                            <table class="w-full table-auto text-sm text-left">
                                <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                                <tr>
                                    <th class="py-3 px-6">Name</th>
                                    <th class="py-3 px-6">Email</th>
                                    <th class="py-3 px-6">Role</th>
                                    <th class="py-3 px-6"></th>

                                </tr>
                                </thead>
                                <tbody class="text-gray-600 divide-y">
                                    <tr v-for="user in users" :key="user.id">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ user.name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ user.email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ user.role }}</td>
<!--                                        <td class="text-right px-6 whitespace-nowrap">-->
<!--                                            <a class="py-2 px-3 font-medium text-indigo-600 hover:text-indigo-500 duration-150 hover:bg-gray-50 rounded-lg">-->
<!--                                                Edit-->
<!--                                            </a>-->
<!--                                            <button href="javascript:void()" class="py-2 leading-none px-3 font-medium text-red-600 hover:text-red-500 duration-150 hover:bg-gray-50 rounded-lg">-->
<!--                                                Delete-->
<!--                                            </button>-->
<!--                                        </td>-->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
