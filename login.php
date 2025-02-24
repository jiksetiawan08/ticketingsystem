<?php
session_start();

// echo $_SESSION["userEmail"] . "<br>";
// echo $_SESSION["userName"] . "<br>";
// echo $_SESSION["userRole"];
?> 

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <style>
            .login-page {
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

            .login-btn {
                width: 100%;
                font-size: 1.1rem;
                padding: 12px;
            }
        </style>
    </head>

    <body>
        <!-- Logo di pojok kanan atas -->
        <div class="logo-top-right">
            <img src="Logo PTBA.png" alt="Logo" />
        </div>

        <div class="login-page bg-light">
            <a href="index.html" class="back-arrow">
                <i class="bi bi-arrow-left"></i>
            </a>

            <div class="title-text">Welcome Back to AssistMe</div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="bg-white shadow rounded">
                            <div class="row">
                                <!-- Bagian kiri form -->
                                <div class="col-md-7 pe-0">
                                    <div class="form-left h-100 py-5 px-5">
                                        <form id="loginForm" method="POST" class="row g-4">
                                            <div class="col-12">
                                                <label for="email">Email <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                    <input type="email" name="temail" id="email" class="form-control" placeholder="Email" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="password">Password <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" name="tpwd" id="password" class="form-control" placeholder="Password" required>
                                                </div>
                                            </div>

                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-primary login-btn mt-4">Login</button>
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


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> Library SweetAlert2 -->

<script>
document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("http://192.168.43.161:8081/ts/backend_login.php", {
        method: "POST",
        body: formData,
        headers: {
            "Accept": "application/json"
        },
        mode: "cors",
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log("Response dari server:", data);

        if (data.success) {
            const { email, nama, role } = data.data
            fetch(`/ts/php/set_session.php?email=${email}&nama=${nama}&role=${role}`, { method: "POST" })

            // localStorage.setItem("userEmail", user.email);
            // localStorage.setItem("userName", user.nama);
            // localStorage.setItem("userRole", role);

            // document.cookie = `userEmail=${email}`;
            // document.cookie = `userName=${nama}`;
            // document.cookie = `userRole=${role}`;

            Swal.fire({
                icon: 'success',
                title: 'Login Berhasil!',
                text: `Selamat datang, ${nama}!`,
                timer: 2000,
                showConfirmButton: false
            });

            setTimeout(() => {
                switch (role) {
                    case "admin":
                        window.location.href = "db_admin.php";
                        break;
                    case "user":
                        window.location.href = "db_user.php";
                        break;
                    case "timIT":
                        window.location.href = "db_timIT.php";
                        break;
                    default:
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Gagal!',
                            text: 'Role tidak valid!',
                        });
                }
            }, 2000);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal!',
                text: data.message || 'Email atau password salah!',
            });
        }
    })
    .catch(error => {
        console.error("Terjadi kesalahan:", error);
        Swal.fire({
            icon: 'error',
            title: 'Kesalahan Server!',
            text: 'Gagal menghubungkan ke server. Silakan coba lagi nanti.',
        });
    });
});
</script>
    </body>
    </html>
