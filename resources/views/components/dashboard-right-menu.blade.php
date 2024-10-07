<div>
    <div class="p-3">
        <h5>Title</h5>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">LOGOUT</button>
                </form>
            </div>
        </div>
    </div>
</div>
