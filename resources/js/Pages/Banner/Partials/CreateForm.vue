<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import {ref, watch} from 'vue';

const showModal = ref(false);
const upload_image = ref(null);
const sample_image = ref(null);
const isProcessing = ref(false);
const cropper = ref(null);

const form = useForm({
    title: '',
    image: null,
});

function getFileInput() {
    upload_image.value.click()
}

function uploadImageChange(event) {
    var files = event.target.files;

    if(files && files.length > 0)
    {
        var reader = new FileReader();
        reader.addEventListener('load', function(){
            sample_image.value.src = reader.result;
            showModal.value = true;
        }.bind(this), false);
        reader.readAsDataURL(files[0]);
    }
}

function createCropper() {
    var aspectRatio = 3;

    cropper.value = new Cropper(sample_image.value, {
        aspectRatio: aspectRatio,
        viewMode: 1,
    });
}

function destroyCropper() {
    cropper.value.destroy();
    cropper.value = null;
}

function crop() {
    isProcessing.value = true;
    var height = 400, width = 1200;

    var canvas = cropper.value.getCroppedCanvas({
        width:width,
        height:height
    });

    canvas.toBlob((blob) => {
        var url = URL.createObjectURL(blob);
        var reader = new FileReader();
        let fileBuffer = new DataTransfer();

        fileBuffer.items.add(new File([blob], 'image'));
        reader.readAsDataURL(blob);
        reader.onloadend = () => {
            form.image = reader.result;
            showModal.value = false;
            upload_image.value.value = '';
            isProcessing.value = false;
        };
    });
}

watch(showModal, async (newValue, oldValue) => {
    if(newValue) {
        createCropper()
    } else {
        destroyCropper()
    }
})
</script>

<template>
    <section>
        <header>
            <slot name="header" />
        </header>

        <form @submit.prevent="form.post(route('banner.store'), {
              preserveScroll: true,
              onSuccess: () => form.reset(),
            })" class="mt-6 space-y-6">
            <div class="max-w-md mx-auto mt-4 shadow-lg border rounded-md duration-300 hover:shadow-sm">
                <a @click="getFileInput">
                    <img :src="form.image" id="banner" loading="lazy" alt="Click to add Banner"  class="w-full h-48 rounded-t-md" />
                </a>
            </div>
            <input ref="upload_image" type="file" name="upload_image" class="image" id="upload_image" accept="image/gif, image/png, image/jpeg" @change="uploadImageChange" hidden />
            <div>
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                    autocomplete="title"
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
        <div v-show="showModal" class="fixed inset-0 z-10 overflow-y-auto">
            <div class="fixed inset-0 w-full h-full bg-black opacity-40" @click="">x</div>
            <div class="flex items-center min-h-screen px-4 py-8">
            <div class="relative w-full max-w-lg p-4 mx-auto bg-white rounded-md shadow-lg">
                <div class="mt-3">
                    <div class="flex items-center justify-center mx-auto">
                        <img ref="sample_image" src="" id="sample_image" />
                    </div>
                </div>
                <div class="items-center gap-2 mt-3 sm:flex">
                    <button @click="crop" class="w-full mt-2 p-2.5 flex-1 text-white bg-indigo-600 rounded-md outline-none ring-offset-2 ring-indigo-600 focus:ring-2">
                    Save
                    </button>
                    <button class="w-full mt-2 p-2.5 flex-1 text-gray-800 rounded-md outline-none border ring-offset-2 ring-indigo-600 focus:ring-2">
                    Cancel
                    </button>
                </div>
            </div>
        </div>>
        </div>
    </section>
</template>
