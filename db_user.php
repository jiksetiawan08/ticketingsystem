<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . "/ts/url.php";

if (!isset($_SESSION['userEmail'])) {
    echo "<script>
        alert('Silakan login terlebih dahulu.');
        window.location.href = 'login.php';
    </script>";
    exit();
  }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard User - AssistMe</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
        rel="stylesheet"
    /> <!-- Menambahkan pustaka icon -->
    <style>
        /* Styles for the page */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            background-color: #dcdcdc;
            min-height: 100vh;
            padding: 0;
        }

        .logo-background {
            background-color: #979696;
            text-align: center;
            padding: 15px 0;
        }

        .logo {
            max-width: 80%;
        }

        .menu-title {
            font-weight: bold;
            padding: 10px;
        }

        .sidebar a {
            text-decoration: none;
            color: black;
            padding: 10px 15px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #f0f0f0;
            color: black;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .status-urgent {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .status-pending {
            background-color: yellow;
            color: black;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .status-closed {
            background-color: green;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .status-low {
            background-color: blue;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <div class="logo-background">
                <img src="Logo_AssistMe.png" class="logo" alt="Logo AssistMe" />
            </div>
            <div class="p-3">
              <div class="d-flex align-items-center mb-3">
                  <!-- <img
                      src="https://via.placeholder.com/40"
                      alt="User Avatar"
                      class="rounded-circle me-2"
                  /> -->
                  <div>
                      <!-- Menampilkan nama pengguna yang login -->
                      <!-- <span><?php echo htmlspecialchars($nama); ?></span> -->
                      <!-- <div class="text-success small">● Online</div> -->
                  </div>
              </div>
                <div class="menu-title">Helpdesk Menu</div>
                <nav>
                    <ul class="list-unstyled">
                        <li>
                            <a href="db_user_regis.html" class="active"><i class="bi bi-house-door"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="create_ticket.php"><i class="bi bi-plus-circle"></i> Create New Ticket</a>
                        </li>
                        <li>
                            <a href="#"><i class="bi bi-person-circle"></i> My Profile</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Content -->
        <div class="col-md-10 p-2">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0"><i class="bi bi-arrow-left"></i> Dashboard Ticket</h5>
                <button class="btn btn-outline-danger btn-sm logout-btn">Logout</button>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <button class="btn btn-primary">Export Ticket</button>
                <input type="text" class="form-control w-25" placeholder="Search" />
            </div>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Date Created</th>
                        <th>Assign to</th>
                        <th>Subject</th>
                        <th>Product</th>
                        <th>Module</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="ticketTableBody">
                    <!-- Tickets will be loaded dynamically here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
      document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("loginForm");

    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch("<?php echo $url; ?>/backend_login.php", {
                method: "POST",
                body: formData,
                headers: {
                    "Accept": "application/json"
                },
                mode: "cors"
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(text => {
                try {
                    return JSON.parse(text);
                } catch (error) {
                    throw new Error("Respon server bukan JSON yang valid: " + text);
                }
            })
            .then(data => {
                console.log("Response dari server:", data);

                if (data.success) {
                    const user = data.data;
                    const role = user.role;

                    // sessionStorage.setItem("userEmail", user.email);
                    // sessionStorage.setItem("userName", user.nama);
                    // sessionStorage.setItem("userRole", role);

                    Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil!',
                        text: `Selamat datang, ${user.nama}!`,
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
    }
});

    </script>
</body>
</html>