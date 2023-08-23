<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    pages: {
        type: Array,
    },
});
</script>

<template>
    <Head title="Pages" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pages</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="max-w-screen-xl mx-auto px-4 md:px-8">
                        <div class="items-start justify-between md:flex mt-4">
                            <div class="mt-3 md:mt-0">
                                <a
                                    :href="route('page.create')"
                                    class="inline-block px-4 py-2 text-white duration-150 font-medium bg-indigo-600 rounded-lg hover:bg-indigo-500 active:bg-indigo-700 md:text-sm"
                                >
                                    Add Page
                                </a>
                            </div>
                        </div>
                        <div class="mt-12 shadow-sm border rounded-lg overflow-x-auto">
                            <table class="w-full table-auto text-sm text-left">
                                <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                                <tr>
                                    <th class="py-3 px-6">Title</th>
                                    <th class="py-3 px-6">Description</th>
                                    <th class="py-3 px-6">Status</th>
                                    <th class="py-3 px-6 text-right">Actions</th>

                                </tr>
                                </thead>
                                <tbody class="text-gray-600 divide-y">
                                    <tr v-for="page in pages" :key="page.id">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ page.title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ page.description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span v-if="!page.archived">Active</span>
                                            <span v-else>Archived</span>
                                        </td>
                                        <td class="text-right px-6 whitespace-nowrap">
                                            <Link :href="route('page.edit', page.id)" class="py-2 px-3 font-medium text-indigo-600 hover:text-indigo-500 duration-150 hover:bg-gray-50 rounded-lg">
                                                Edit
                                            </Link>
                                            <Link v-if="!page.archived" :href="route('page.archive', page.id)" method="post" class="py-2 px-3 font-medium text-indigo-600 hover:text-indigo-500 duration-150 hover:bg-gray-50 rounded-lg">
                                                Archive
                                            </Link>
                                            <Link v-else :href="route('page.restore', page.id)" method="post" class="py-2 px-3 font-medium text-indigo-600 hover:text-indigo-500 duration-150 hover:bg-gray-50 rounded-lg">
                                                Restore
                                            </Link>
                                            <Link :href="route('page.destroy', page.id)" method="delete"  class="py-2 leading-none px-3 font-medium text-red-600 hover:text-red-500 duration-150 hover:bg-gray-50 rounded-lg">
                                                Delete
                                            </Link>
                                        </td>
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
