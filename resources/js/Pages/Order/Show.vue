<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    order: {
        type: Array,
    },
});
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Order Items</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="max-w-screen-xl mx-auto px-4 md:px-8">
                        <div class="mt-12 shadow-sm border rounded-lg overflow-x-auto">
                            <table class="w-full table-auto text-sm text-left">
                                <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                                <tr>
                                    <th class="py-3 px-6">Name</th>
                                    <th class="py-3 px-6">Price</th>
                                    <th class="py-3 px-6">Quantity</th>
                                    <th class="py-3 px-6"></th>

                                </tr>
                                </thead>
                                <tbody class="text-gray-600 divide-y">
                                <tr v-for="item in order.items" :key="item.id">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ item.product.name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ item.product.price }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ item.quantity }}</td>
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
