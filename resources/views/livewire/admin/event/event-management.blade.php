<div>
    <div class="card">
        <div class="card-body">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="text-danger text-uppercase">
                            <i class="fa fa-home" aria-hidden="true"></i> Events management</h4 class="text-danger">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.main') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.church.management') }}">Church</a></li>
                            <li class="breadcrumb-item active">Event management</li>
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
            <div class="">
                <div class="d-flex justify-content-between p-2">
                    <div>
                        <a type="button" class="btn btn-primary" href="{{ route('admin.event.create',$church) }}">
                        <i class="fa fa-plus" aria-hidden="true"></i> New event
                        </a>
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
                                <button wire:click.prevent='filtedChurchByStatus'  type="button" class="btn btn-primary">
                                    All <span class="badge badge-warning">{{ $allchurchEventCount }}</span>
                                </button>
                                <button wire:click.prevent="filtedChurchByStatus('ONLINE')" type="button" class="btn btn-success">
                                    Online <span class="badge badge-secondary">{{ $onlinechurchEventCount }}</span>
                                </button>
                                <button wire:click.prevent="filtedChurchByStatus('OFFLINE')" type="button" class="btn btn-secondary">
                                    Offline <span class="badge badge-danger">{{ $offlinechurchEventCount }}</span>
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
                                <input wire:model='selectedAllRows' type="checkbox" value=""
                                 id="checkedAll" >
                                <label for="checkedAll"></label>
                            </div>
                          </th>
                        <th>Title</th>
                        <th class="text-center">Cover iamge</th>
                        <th>Started at</th>
                        <th>Finished at</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                            @foreach ($church_events as $church_event)
                                <tr>
                                    <th>
                                        <div  class="icheck-primary d-inline ml-2">
                                            <input wire:model="selectedRows" type="checkbox" value="{{ $church_event->id }}" id="{{ $church_event->id }}">
                                            <label for="{{ $church_event->id }}"></label>
                                          </div>
                                    </th>
                                    <td>{{ $church_event->title }}</td>
                                    <td class="text-center"><img width="50px" class="img-fluid"
                                        src="{{ asset($church_event->cover_event_url==null?'image.jpg':'storage/'.$church_event->cover_event_url) }}" alt=""></td>
                                    <td>{{ $church_event->started_at_date.' at '.$church_event->started_at_time->format('h:i') }}</td>
                                    <td>{{ $church_event->finished_at_date.' at '.$church_event->finished_at_time->format('h:i') }}</td>
                                    <td class="text-center">
                                        @if ($church_event->status=='ONLINE')
                                            <span class="badge badge-success">Online</span>
                                        @else
                                            <span class="badge badge-secondary">Offline</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.event.edit', [$church,$church_event]) }}" class="btn btn-primary btn-sm" type="button">
                                            <i class="fas fa-edit    "></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>
