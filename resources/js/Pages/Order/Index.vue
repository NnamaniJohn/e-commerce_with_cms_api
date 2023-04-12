<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    orders: {
        type: Array,
    },
});
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Orders</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="max-w-screen-xl mx-auto px-4 md:px-8">
                        <div class="mt-12 shadow-sm border rounded-lg overflow-x-auto">
                            <table class="w-full table-auto text-sm text-left">
                                <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                                <tr>
                                    <th class="py-3 px-6">Owner</th>
                                    <th class="py-3 px-6">Status</th>
                                    <th class="py-3 px-6"></th>

                                </tr>
                                </thead>
                                <tbody class="text-gray-600 divide-y">
                                    <tr v-for="order in orders" :key="order.id">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ order.user.name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ order.status }}</td>
                                        <td class="text-right px-6 whitespace-nowrap">
                                            <Link :href="route('order.show', order.id)" class="py-2 px-3 font-medium text-indigo-600 hover:text-indigo-500 duration-150 hover:bg-gray-50 rounded-lg">
                                                Show
                                            </Link>
                                            <Link :href="route('order.complete', order.id)" method="post" class="py-2 px-3 font-medium text-green-600 hover:text-green-500 duration-150 hover:bg-gray-50 rounded-lg">
                                                Complete
                                            </Link>
                                            <Link :href="route('order.cancel', order.id)" method="post"  class="py-2 leading-none px-3 font-medium text-red-600 hover:text-red-500 duration-150 hover:bg-gray-50 rounded-lg">
                                                Cancel
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
