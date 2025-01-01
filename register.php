<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .register-page {
      width: 100%;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      position: relative;
    }

    .back-arrow {
      position: absolute;
      top: 20px;
      left: 20px;
      font-size: 24px;
      color: #000;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .back-arrow:hover {
      color: #007bff;
    }

    .terms-text {
      color: blue;
      font-weight: bold;
      cursor: pointer;
    }

    .title-text {
      margin-bottom: 20px;
      font-size: 1.5rem;
      font-weight: bold;
      text-align: center;
    }

    .form-right {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .logo-top-right {
      position: absolute;
      top: 10px;
      right: 10px;
      max-width: 200px;
      z-index: 1000;
    }

    .logo-top-right img {
      width: 100%;
      height: auto;
    }
  </style>
</head>
<body>
  <!-- Logo di pojok kanan atas -->
  <div class="logo-top-right">
    <img src="Logo_PTBA.png" alt="Logo" />
  </div>

  <div class="register-page bg-light">
    <a href="index.html" class="back-arrow">
      <i class="bi bi-arrow-left"></i>
    </a>

    <div class="title-text">Create your Assist Me Account</div>

    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="bg-white shadow rounded">
            <div class="row">
              <!-- Bagian kiri form -->
              <div class="col-md-7 pe-0">
                <div class="form-left h-100 py-5 px-5">
                  <form id="registerForm" method="POST" class="row g-4" action="http://192.168.110.189:8081/ts/backendregister.php">
                    <div class="col-12">
                      <label for="name">Nama <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <div class="input-group-text">
                          <i class="bi bi-person-fill"></i>
                        </div>
                        <input type="text" id="nama" name="tnama" class="form-control" placeholder="Nama" required />
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="email">Email <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <div class="input-group-text">
                          <i class="bi bi-envelope-fill"></i>
                        </div>
                        <input type="email" id="email" name="temail" class="form-control" placeholder="Email" required />
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="password">Password <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <div class="input-group-text">
                          <i class="bi bi-lock-fill"></i>
                        </div>
                        <input type="password" id="tpwd" name="tpwd" class="form-control" placeholder="Password" required />
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                      <select id="role" name="trole" class="form-select" required>
                        <option value="" selected disabled>Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="tim it">Tim IT</option>
                      </select>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="termsCheck" required />
                        <label for="termsCheck" class="form-check-label">
                          I Agree to the
                          <span class="terms-text" data-bs-toggle="modal" data-bs-target="#termsModal">Term and Conditions</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-12 text-center">
                      <button type="submit" name="bregis" class="btn btn-primary px-4 mt-4">Sign Up</button>
                    </div>
                    <div class="col-12 text-center mt-2">
                      <p>
                        Already have an account?
                        <a href="login.php" class="text-primary">Sign In</a>
                      </p>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Bagian kanan form -->
              <div class="col-md-5 ps-0 d-none d-md-block">
                <div class="form-right h-100 bg-primary text-white text-center">
                  <img src="Logo_AssistMe.png" class="logo" alt="Logo AssistMe" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Terms and Conditions -->
  <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6><strong>1. General Terms</strong></h6>
          <p>By signing up, you agree to the following terms and conditions...</p>
          <h6><strong>2. Privacy Policy</strong></h6>
          <p>Your privacy is important to us...</p>
          <h6><strong>3. User Responsibilities</strong></h6>
          <p>You are responsible for maintaining the confidentiality of your account...</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById("registerForm").addEventListener("submit", async function (e) {
    e.preventDefault(); // Mencegah pengiriman form secara default

    // Ambil data dari form
    const formData = new FormData(this);

    try {
        const response = await fetch('/ts/register.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.success) {
          echo "
          <script>
            alert('Akun Telah Terdaftar');
            window.location.href = '/ts/login.php';
          </script>
          ";
        } else {
            alert(result.message);
            window.location.href = '/ts/register.php';
        }
    } catch (error) {
        console.error("Terjadi kesalahan:", error);
        alert("Gagal terhubung ke server.");
    }
});
  </script>
</body>
</html>
