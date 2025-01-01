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
    <style>
      body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
      }

      .sidebar {
        background-color: #dcdcdc; /* Warna abu-abu sidebar */
        min-height: 100vh;
        padding: 0;
      }

      .logo-background {
        background-color: #979696; /* Warna putih untuk latar belakang logo */
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
    <?php
  session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'User';

?>
    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
          <div class="logo-background">
            <img src="Logo_AssistMe.png" class="logo" alt="Logo AssistMe" />
          </div>
          <div class="p-3">
            <div class="d-flex align-items-center mb-3">
              <img
                src="https://via.placeholder.com/40"
                alt="User Avatar"
                class="rounded-circle me-2"
              />
              <div>
                <span><?php echo htmlspecialchars($nama); ?></span>
                <div class="text-success small">● Online</div>
              </div>
            </div>
            <div class="menu-title">Helpdesk Menu</div>
            <nav>
              <ul class="list-unstyled">
                <li>
                  <a href="#" class="active"
                    ><i class="bi bi-house-door"></i>Dashboard</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><i class="bi bi-plus-circle"></i> Create New Ticket</a
                  >
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
          <!-- Container for aligning Logout and Create New Ticket -->
          <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Create New Ticket Title -->
            <h5 class="mb-0">
              <i class="bi bi-arrow-left"></i> Dashboard Ticket
            </h5>
            <!-- Logout Button -->
            <button class="btn btn-outline-danger btn-sm logout-btn">
              Logout
            </button>
          </div>
          <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-primary">Export Ticket</button>
            <input type="text" class="form-control w-25" placeholder="Search" />
          </div>
          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th>ID Ticket</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Assign To</th>
                <th>Subject</th>
                <th>Product</th>
                <th>Module</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Action</th>
                <tbody>
                    <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                    </tr>
            </thead>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document
        .querySelector(".logout-btn")
        .addEventListener("click", function () {
          const confirmLogout = confirm("Are you sure you want to logout?");
          if (confirmLogout) {
            // Redirect to login page
            window.location.href = "login.html";
          }
        });
    </script>
      </body>
</html>
