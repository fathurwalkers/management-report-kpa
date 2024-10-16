<div>
    <div class="p-3">
        <div class="row mb-2">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h5 class="mt-2 text-center">User Menu</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn md btn-danger w-100">LOGOUT</button>
                </form>
            </div>
        </div>
    </div>
</div>
