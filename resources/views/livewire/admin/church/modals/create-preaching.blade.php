<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createPredictionModal" tabindex="-1" aria-labelledby="createPredictionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="createPredictionModalLabel">
            <i class="fa fa-microphone" aria-hidden="true"></i> ADD NEW PREDICATION ON CHURCH</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form wire:submit.prevent='save'>
            <div class="modal-body">
                <div class="media d-flex justify-content-center" >
                    <div class="text-center" x-data="{imagePreview: '{{asset('image.jpg')}}'}" >
                        <input class="d-none" wire:model.defer='cover_image_url' type="file" x-ref="image"x-on:change="
                                reader = new FileReader();
                                reader.onload=(event)=>{
                                    imagePreview=event.target.result;
                                };
                                reader.readAsDataURL($refs.image.files[0]);
                            "
                        />
                        <img x-on:click="$refs.image.click()" class="my-image img-fluid"
                            x-bind:src="imagePreview ? imagePreview: '{{ asset('image.jpg') }}'"
                            alt="User profile picture"> 
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="predTitle">Prédication title</label>
                    <input id="predTitle" class="form-control
                        @error('title') is-invalid border border-danger rounded @enderror"
                        type="text" wire:model.defer='title'>
                    @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="predTitle">Prédicator name</label>
                    <input id="predTitle" class="form-control
                        @error('predicator_name') is-invalid border border-danger rounded @enderror"
                        type="text" wire:model.defer='predicator_name'>
                    @error('predicator_name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="predAudioFile">Audio file</label>
                    <input id="predAudioFile" class="form-control
                        @error('audio_file_url') is-invalid border border-danger rounded @enderror"
                        type="file" wire:model.defer='audio_file_url'>
                    @error('audio_file_url') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    </div>
</div>
@push('styles')
    <style>
        .my-image:hover{
            background-color: rgb(247, 96, 96);
            cursor: pointer
        }
    </style>
@endpush
