<div>
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> <i class="fas fa-cogs"></i> Paramètres</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.main') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Paramètres</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                               <form wire:submit.prevent='updateSettings'>
                                <div class="media d-flex justify-content-center">
                                    <div class="text-center" x-data="{imagePreview: '{{asset('image.jpg')}}'}">
                                        <input class="d-none" wire:model.defer='state.app_logo_url' type="file" x-ref="image"x-on:change="
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
                                   <div class="form-group">
                                       <label for="appName">App name</label>
                                       <input id="appName" class="form-control" type="text" wire:model.defer='state.name_app'>
                                   </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <label for="sidebar_collapse">Sidebar collapse</label>
                                                <input id="sidebar_collapse" wire:model.defer='state.sidebar_collapse'  type="checkbox">
                                            </div>
                                            <div>
                                                <label for="isDarkMode">Is dark mode</label>
                                                <input id="isDarkMode" wire:model.defer='state.is_dark_mode'  type="checkbox">
                                            </div>
                                        </div>

                                    </div>
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                               </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
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
