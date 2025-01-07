<div>
    <div class="p-3">
        <div class="row mb-2">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h5 class="mt-2 text-center">User Menu</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <button type="button" class="btn md btn-info w-100 mb-2" data-toggle="modal"
                    data-target="#modal_ubah_password">Ubah Password</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn md btn-danger w-100">Logout</button>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal_ubah_password" tabindex="-1" aria-labelledby="modal_ubah_password"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="modal_ubah_password">
                            Ubah Password Akun
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('ubah-password') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="login_password_1">Masukkan Password Baru</label>
                                        <input type="password" class="form-control" id="login_password_1"
                                            name="login_password_1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="login_password_2">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" id="login_password_2"
                                            name="login_password_2" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn btn-outline-success">Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
