<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Form from './Partials/EditForm.vue'
import { Head } from '@inertiajs/vue3';

defineProps({
    page: {
        type: Object,
    },
});
</script>

<template>
    <Head title="Page" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Page</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <Form :page="page" class="max-w-xl">
                        <template #header>
                            <h2 class="text-lg font-medium text-gray-900">Edit Page</h2>
                        </template>
                    </Form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
