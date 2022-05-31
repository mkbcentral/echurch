<div>
    <div class="card">
        <div class="card-body">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="text-danger text-uppercase"><i class="fa fa-microphone"
                                aria-hidden="true"></i> preachings management</h4 class="text-danger">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.main') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.church.management') }}">Church</a></li>
                            <li class="breadcrumb-item active">Preaching management</li>
                        </ol>
                    </div>
                    <div class="p-2">
                        <div><span class="text-bold text-primary">Church name: </span> {{$church->name}}</div>
                        <div><span class="text-bold text-primary">Pastor: </span> {{$church->pastor_name}}</div>
                        <div><span class="text-bold text-primary">Email: </span> {{$church->email}}</div>
                        <div><span class="text-bold text-primary">Phone: </span> {{$church->phone}}</div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="">
                <div class="d-flex justify-content-between p-2">
                    <div>
                        <button type="button" class="btn btn-primary btn-sm"
                            data-toggle="modal" data-target="#createPredictionModal">
                            <i class="fa fa-plus" aria-hidden="true"></i> New Preaching
                        </button>
                        @if ($selectedRows)
                        <div class="btn-group">
                            <button type="button" class="btn btn-default">Selection</button>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a wire:click.prevent='markOnlineSelectedRows' class="dropdown-item" href="#">Mark online</a>
                              <a wire:click.prevent='markOfflineSelectedRows' class="dropdown-item" href="#">Mark offline</a>
                            </div>
                        </div>
                        <span class="ml-2 ">{{ count($selectedRows) }} {{ Str::plural('church',count($selectedRows)) }} selected</span>
                        @endif
                    </div>
                     <div>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button wire:click.prevent='filtedChurchByStatus' type="button" class="btn btn-primary">
                                    All <span class="badge badge-warning">{{ $allPreachingCount->count() }}</span>
                                </button>
                                <button wire:click.prevent='filtedChurchByStatus({{ true }})' type="button" class="btn btn-success">
                                    Online <span class="badge badge-secondary">{{ $onlinePreachingCount }}</span>
                                </button>
                                <button wire:click.prevent='filtedChurchByStatus({{ false }})' type="button" class="btn btn-secondary">
                                    Offline <span class="badge badge-danger">{{ $offlinePreachingCount }}</span>
                                </button>
                              </div>
                            
                          </div>
                    </div>
                    

                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle table-sm">
                      <thead>
                      <tr>
                        <th>
                            <div  class="icheck-primary d-inline ml-2">
                                <input wire:model='selectedAllRows' type="checkbox" value="" name="todo2" id="todoCheck2" >
                                <label for="todoCheck2"></label>
                              </div>
                          </th>
                        <th>Title</th>
                        <th>Predicator name</th>
                        <th class="text-center">Cover image</th>
                        <th class="text-center">Size</th>
                        <th class="text-center">Control</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($preachings as $preaching)
                            <tr>
                                <th>
                                    <div  class="icheck-primary d-inline ml-2">
                                        <input wire:model="selectedRows" type="checkbox" value="{{ $preaching->id }}" id="{{ $preaching->id }}">
                                        <label for="{{ $preaching->id }}"></label>
                                      </div>
                                </th>
                                <td>
                                    <span><i class="fa fa-microphone" aria-hidden="true"></i></span>
                                    {{$preaching->title.'.'.$preaching->getExtension()}}
                                </td>
                                <td>{{$preaching->predicator_name}}</td>
                                <td class="text-center"><img width="50px" class="img-fluid" src="{{ asset('storage/'.$preaching->cover_image_url) }}" alt=""></td>
                                <td class="text-center">
                                    {{$preaching->audio_file_url==null?'0MB':$preaching->getSize()}}
                                </td>
                                <td class="text-center">
                                    <audio controls>
                                        <source src="{{config('app.url').'storage/'.$preaching->audio_file_url}}" type="audio/mpeg">
                                    </audio>
                                </td>
                                <td class="text-center">
                                    @if ($preaching->status=='ONLINE')
                                        <span class="badge badge-success">Online</span>
                                    @else
                                    <span class="badge badge-secondary">Offline</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button wire:click.prevent='edit({{$preaching}})' class="btn btn-secondary btn-sm"
                                        data-toggle="modal" data-target="#editPredictionModal" type="button">
                                        <i class="fas fa-edit    "></i>
                                    </button>
                                </td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
    @include('livewire.admin.church.modals.create-preaching')
    @include('livewire.admin.church.modals.edit-preaching')
</div>
