<?php
include 'config/core.php';
$manz = new manz();
if(isset($_POST['register'])){
    $result = $manz->register(
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['password'],
        $_POST['role']
    );
    if($result['status']){
        echo "
        <script>
            alert('".$result['message']."');
            window.location='login.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('".$result['message']."');
        </script>
        ";
    }
}
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/navbar.php'; ?>

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-body p-4">

                    <h2 class="text-center mb-4">
                        Register EDUSIMA
                    </h2>

                    <form method="POST">

                        <div class="mb-3">

                            <label>Nama Lengkap</label>

                            <input 
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Masukkan nama lengkap"
                        required>

                        </div>

                        <div class="mb-3">

                            <label>Email</label>

                            <input 
    type="email"
    name="email"
    class="form-control"
    placeholder="Masukkan email"
    required>

                        </div>
                        <div class="mb-3">

    <label>Nomor HP</label>

    <input 
        type="text"
        name="phone"
        class="form-control"
        placeholder="Masukkan nomor HP"
        required>

</div>

                        <div class="mb-3">

                            <label>Password</label>

                            <div class="input-group">

                                <input 
    type="password"
    name="password"
    class="form-control"
    id="password"
    placeholder="Masukkan password"
    required>

                                <button 
                                    class="btn btn-outline-secondary"
                                    type="button"
                                    id="togglePassword">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label>Role</label>

                            <select name="role"  class="form-select">

                                <option value="siswa">Siswa</option>
                                <option value="pengajar">Pengajar</option>

                            </select>

                        </div>

                        <button 
    type="submit"
    name="register"
    class="btn btn-dark w-100">

                            Register

                        </button>

                    </form>

                    <div class="text-center mt-3">

                        Sudah punya akun?

                        <a href="login.php">
                            Login
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include 'templates/footer.php'; ?>