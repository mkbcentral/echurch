<div>
    <div class="card">
        <div class="card-body">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="text-danger text-uppercase">
                            <i class="fa fa-home" aria-hidden="true"></i> creation of event</h4 class="text-danger">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.main') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.event.management',$church) }}">Event</a></li>
                            <li class="breadcrumb-item active">Creatte management</li>
                        </ol>
                    </div>
                </div>
                <div class="p-2">
                    <div><span class="text-bold text-primary">Church name: </span> {{$church->name}}</div>
                    <div><span class="text-bold text-primary">Pastor: </span> {{$church->pastor_name}}</div>
                    <div><span class="text-bold text-primary">Email: </span> {{$church->email}}</div>
                    <div><span class="text-bold text-primary">Phone: </span> {{$church->phone}}</div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent='update'>
                <div class="modal-body">
                    <div class="media d-flex justify-content-center" >
                        <div class="text-center" x-data="{imagePreview: '{{asset($event->cover_event_url==null?'image.jpg':'storage/'.$event->cover_event_url)}}'}" >
                            <input class="d-none" wire:model.defer='cover_image_url' type="file" x-ref="image"x-on:change="
                                    reader = new FileReader();
                                    reader.onload=(event)=>{
                                        imagePreview=event.target.result;
                                    };
                                    reader.readAsDataURL($refs.image.files[0]);
                                "
                            />
                            <img x-on:click="$refs.image.click()" class="my-image" width="100px"
                                x-bind:src="imagePreview ? imagePreview: '{{ asset($event->cover_event_url==null?'image.jpg':'storage/'.$event->cover_event_url) }}'"
                                alt="User profile picture">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="predTitle">Event title</label>
                        <input id="predTitle" class="form-control
                            @error('title') is-invalid border border-danger rounded @enderror"
                            type="text" wire:model.defer='state.title'>
                            @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="predTitle">Started date  event</label>
                                <div class="input-group mb-3  @error('started_at_date') is-invalid border border-danger rounded @enderror">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </span>
                                    </div>
                                    <x-datepicker class="form-control datetimepicker-input"
                                         wire:model.defer='state.started_at_date' id="startedDateEvent"/>
                                    @error('state.started_at_date') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div> 
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="predTitle">Finished date  event</label>
                                <div class="input-group mb-3 @error('finished_at_date') is-invalid border border-danger rounded @enderror">
                                
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <x-datepicker class="form-control datetimepicker-input"
                                         wire:model.defer='state.finished_at_date' id="finishedDateEvent"/>
                                    @error('finished_at_date') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="predTitle">Started time  event</label>
                                <div class="input-group mb-3 
                                 @error('started_at_time') is-invalid border border-danger rounded @enderror">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fas fa-clock    "></i>
                                      </span>
                                    </div>
                                    <x-timepicker class="form-control datetimepicker-input"
                                         wire:model.defer='state.started_at_time' id="startedTimeEvent"/>
                                    @error('state.started_at_time') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div> 
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="predTitle">Finished time  event</label>
                                <div class="input-group mb-3 @error('finished_at_time') is-invalid border border-danger rounded @enderror">
                               
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-clock    "></i>
                                    </span>
                                    </div>
                                    <x-timepicker class="form-control datetimepicker-input"
                                         wire:model.defer='state.finished_at_time' id="finishedTimeEvent"/>
                                    @error('finished_at_time') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div> 
                            </div>
                           
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="predTitle">Event descriton</label>
                        <input id="predTitle" class="form-control
                            @error('description') is-invalid border border-danger rounded @enderror"
                            type="text" wire:model.defer='state.description'>
                            @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="predTitle">Event adress</label>
                        <textarea wire:model.defer='state.adress' id="" cols="5" rows="1" class="form-control
                        @error('adress') is-invalid border border-danger rounded @enderror">
                        </textarea>
                        @error('adress') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" href="{{ route('admin.event.management', $church) }}" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Save changes</button>
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