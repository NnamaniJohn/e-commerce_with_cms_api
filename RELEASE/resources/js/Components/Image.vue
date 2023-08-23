<template>
    <div class="widget-author">
        <div class="author-heading">
            <div class="banner-img">
                <a @click="getFileInput">
                    <img :src="banner.image" id="banner" alt="banner">
                </a>
            </div>
            <input type="file" name="upload_image" class="image" id="upload_image" accept="image/gif, image/png, image/jpeg" @change="uploadImageChange" hidden />
            <div class="profile-name">
                <h2 class="card-title">{{ banner.title }}</h2>
            </div>
        </div>

        <div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crop Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <img src="" id="sample_image" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!is_processing" type="button" id="crop" class="btn btn-primary">Save</button>
                        <button v-if="is_processing" type="button" class="btn btn-primary">Saving</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProfileImageSetting",
    props: ['banner'],

    data() {
        return {
            image: null,
            cropper: null,
            upload_modal: null,
            banner_img: null,
            is_processing: false,
        }
    },

    mounted() {
        this.image = document.getElementById('sample_image');
        this.banner_img = document.getElementById('banner');
        this.upload_modal = $('#upload_modal');

        this.upload_modal.on('shown.bs.modal', () => {
            var aspectRatio = 3
            // if (this.image_for == 'cover') {
            //     aspectRatio = 3
            // }

            this.cropper = new Cropper(this.image, {
                aspectRatio: aspectRatio,
                viewMode: 1,
            });
        }).on('hidden.bs.modal', () => {
            this.cropper.destroy();
            this.cropper = null;
        });

        $('#crop').click(() => {
            this.is_processing = true;
            var height = 400, width = 1200;
            // if (this.image_for == 'cover') {
            //     width = 1200
            // }

            var canvas = this.cropper.getCroppedCanvas({
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
                    axios.post('/user/' + this.$userId + '/profile/upload', {image: reader.result, for: this.image_for}).then(response => {
                        if (this.image_for == 'cover') {
                            this.c_img.src = reader.result;
                        } else {
                            this.p_img.src = reader.result;
                        }
                        this.upload_modal.modal('hide');
                        $('#upload_image').val('');
                        this.is_processing = false;
                    });
                };
            });
        });
    },

    methods: {
        getFileInput(img_for) {
            // console.log(this.image_for);
            // console.log(img_for)
            // this.image_for = img_for;
            // console.log(this.image_for);
            $("#upload_image").click();
        },

        uploadImageChange(event) {
            var files = event.target.files;

            if(files && files.length > 0)
            {
                var reader = new FileReader();
                reader.addEventListener('load', function(){
                    this.image.src = reader.result;
                    this.upload_modal.modal('show');
                }.bind(this), false);
                reader.readAsDataURL(files[0]);
            }
        },
    },
}
</script>
<style scoped>

.img-container {
    max-height: 60vh !important;
}

.modal-lg{
    max-width: 1000px !important;
}

</style>
