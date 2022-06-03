<div>
    <h4 class="text-center ">Liste for churchs</h4>
    @foreach ($churchs as $church)
        <div class="d-flex justify-content-center  ">
            <div class="card w-50">
                    <div class="card-body ">
                        <div class=" media">
                            <img src="{{ asset($church->logo_url == null ?'defautl-user.jpg':'storage/'.$church->logo_url) }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    {{ $church->name }}
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
