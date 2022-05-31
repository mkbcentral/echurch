<div>
    <div class="card">
        <div class="card-body">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="text-danger text-uppercase"><i class="fa fa-home" aria-hidden="true"></i> Church management</h4 class="text-danger">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.main') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Church management</li>
                        </ol>
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
                        <button type="button" class="btn btn-primary"
                            data-toggle="modal" data-target="#createChurchModal">
                        <i class="fa fa-plus" aria-hidden="true"></i> New church
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
                    <!-- Button trigger modal -->
                    <div>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button wire:click.prevent='filtedChurchByStatus' type="button" class="btn btn-primary">
                                    All <span class="badge badge-warning">{{ $allchurchCount->count() }}</span>
                                </button>
                                <button wire:click.prevent="filtedChurchByStatus('ONLINE') type="button" class="btn btn-success">
                                    Online <span class="badge badge-secondary">{{ $onlinechurchCount }}</span>
                                </button>
                                <button wire:click.prevent="filtedChurchByStatus('OFFLINE')" type="button" class="btn btn-secondary">
                                    Offline <span class="badge badge-danger">{{ $offlinechurchCount }}</span>
                                </button>
                              </div>
                            
                          </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0 mt-2">
                    <table class="table table-striped table-valign-middle table-sm">
                      <thead>
                      <tr>
                          <th>
                            <div  class="icheck-primary d-inline ml-2">
                                <input wire:model='selectedAllRows' type="checkbox" value="" name="todo2" id="todoCheck2" >
                                <label for="todoCheck2"></label>
                              </div>
                          </th>
                        <th>Church name</th>
                        <th class="text-center">Abreviation</th>
                        <th>Pastor</th>
                        <th>Phone</th>
                        <th class="text-center">Preaching(s)</th>
                        <th class="text-center">Event(s)</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($churchs as $church)
                        <tr>
                            <th>
                                <div  class="icheck-primary d-inline ml-2">
                                    <input wire:model="selectedRows" type="checkbox" value="{{ $church->id }}" id="{{ $church->id }}">
                                    <label for="{{ $church->id }}"></label>
                                  </div>
                            </th>
                            <td>
                              <img src="{{ asset($church->logo_url == null ?'defautl-user.jpg':'storage/'.$church->logo_url) }}" alt="Logo" class="img-circle img-size-32 mr-2">
                              {{$church->name}}
                            </td class="text-center">
                            <td class="text-center"> {{$church->abreviation==null?'-':$church->abreviation}}</td>
                            <td>
                                {{$church->pastor_name}}
                            </td>
                            <td>
                                {{$church->phone}}
                            </td>
                            <td class="text-center">
                                {{$church->preaching->count()}}
                            </td>
                            <td class="text-center">
                                {{$church->churchEvents->count()}}
                            </td>
                            <td class="text-center">
                                @if ($church->status=='ONLINE')
                                    <span class="badge badge-success">Online</span>
                                @else
                                <span class="badge badge-secondary">Offline</span>
                                @endif
                            </td>
                            <td>
                                <button wire:click.prevent='edit({{$church}})'
                                    data-toggle="modal" data-target="#editChurchModal"
                                    class="btn btn-primary btn-sm" type="button"><i class="fas fa-edit"></i></button>
                                <a href="{{ route('admin.church.preaching.management', $church) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{ route('admin.event.management', $church) }}" class="btn btn-danger btn-sm"><i class="fab fa-telegram" aria-hidden="true"></i></a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
    @include('livewire.admin.church.modals.create-church')
    @include('livewire.admin.church.modals.edit-church')
</div>
