<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createChurchModal" tabindex="-1" aria-labelledby="createChurchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="createChurchModalLabel">CREATE NEW CURCH</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form wire:submit.prevent='save'>
            <div class="modal-body">
                <div class="media d-flex justify-content-center">
                    <div class="text-center" x-data="{imagePreview: '{{asset('image.jpg')}}'}">
                        <input class="d-none" wire:model.defer='logo_url' type="file" x-ref="image"x-on:change="
                                reader = new FileReader();
                                reader.onload=(event)=>{
                                    imagePreview=event.target.result;
                                };
                                reader.readAsDataURL($refs.image.files[0]);
                            "
                        />
                        <img x-on:click="$refs.image.click()" class="profile-user-img img-circle "
                            x-bind:src="imagePreview ? imagePreview: '{{ asset('image.jpg') }}'"
                            alt="User profile picture">
                            @error('logo_url') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="churchName">Church name</label>
                            <input id="churchName" class="form-control @error('name') is-invalid border border-danger rounded @enderror"
                                type="text" wire:model.defer='name'>
                        </div>
                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="churchAbreviation">Church abreviation</label>
                            <input id="churchAbreviation" class="form-control @error('abreviation') is-invalid border border-danger rounded @enderror"
                            type="text" wire:model.defer='abreviation'>
                        </div>
                        @error('abreviation') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="churchPastor">Pastor name</label>
                            <input id="churchPastor" class="form-control @error('pastor_name') is-invalid border border-danger rounded @enderror"
                            type="text" wire:model.defer='pastor_name'>
                        </div>
                        @error('pastor_name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="churchEmail">Email</label>
                            <input id="churchEmail" class="form-control @error('email') is-invalid border border-danger rounded @enderror"
                            type="text" wire:model.defer='email'>
                        </div>
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="churchPhone">Phone</label>
                            <input id="churchPhone" class="form-control @error('phone') is-invalid border border-danger rounded @enderror"
                            type="text" wire:model.defer='phone'>
                        </div>
                        @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
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
        .img-circle:hover{
            background-color: rgb(247, 96, 96);
            cursor: pointer
        }
    </style>
@endpush
