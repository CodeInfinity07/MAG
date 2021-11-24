<div class="main-content-body">
    @if (Session::has('success'))
        <div class="container">
            <div class="col-sm-12">
                <div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-account="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="container">
            <div class="col-sm-12">
                <div>
                    <div class="alert alert-error alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-account="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
