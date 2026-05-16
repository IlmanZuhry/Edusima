<?php include 'templates/header.php'; ?>
<?php include 'templates/navbar.php'; ?>

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-body p-4">

                    <h2 class="mb-4 text-center">
                        Login EDUSIMA
                    </h2>

                    <form>

                        <div class="mb-3">
                            <label>Email</label>

                            <input 
                                type="email" 
                                class="form-control"
                                placeholder="Masukkan email">
                        </div>

                        <div class="mb-3">
                            <label>Password</label>

                            <div class="input-group">

    <input 
        type="password"
        class="form-control"
        id="password"
        placeholder="Masukkan password">

    <button 
        class="btn btn-outline-secondary"
        type="button"
        id="togglePassword">

        <i class="bi bi-eye"></i>

    </button>

</div>
                        </div>

                        <button class="btn btn-dark w-100">
                            Login
                        </button>
                        <a href="index.php" class="btn btn-light w-100">Kembali</a>

                    </form>

                    <div class="text-center mt-3">

                        Belum punya akun?

                        <a href="register.php">
                            Register
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include 'templates/footer.php'; ?>