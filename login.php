<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Add style -->
    <style>
      .login-page {
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
      }

      /* Logo AssistMe inside a box */
      .logo-box {
        max-width: 150px;
        background-color: #ffffff;
        border: 2px solid #ffffff;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 20px;
      }

      .form-right {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }

      .logo {
        object-fit: contain;
        width: 100%;
      }

      .back-arrow {
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 1.5rem;
        color: #333;
        text-decoration: none;
      }

      .back-arrow i {
        font-size: 1.5rem;
      }

      .title-text {
        margin-bottom: 20px;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
      }

      /* Override the bold styling for labels */
      label {
        font-weight: normal;
      }

      /* Logo PTBA di pojok kanan atas */
      .logo-top-right {
        position: absolute;
        top: 10px;
        right: 10px;
        max-width: 200px; /* Ukuran logo */
        z-index: 1000;
      }

      .logo-top-right img {
        width: 100%;
        height: auto;
      }
    </style>
  </head>
  <body>
    <!-- Logo PTBA di pojok kanan atas -->
    <div class="logo-top-right">
      <img src="Logo_PTBA.png" alt="Logo PTBA" />
    </div>

    <div class="login-page bg-light">
      <a href="index.html" class="back-arrow">
        <i class="bi bi-arrow-left"></i>
      </a>

      <div class="container">
        <div class="title-text">Welcome Back to Assist Me</div>
        <div class="row">
          <div class="col-lg-10 offset-lg-1">
            <div class="bg-white shadow rounded">
              <div class="row">
                <!-- Bagian kiri form -->
                <div class="col-md-7 pe-0">
                  <div class="form-left h-100 py-5 px-5">
                    <form action="http://3.1.1.241:8081/ts/backendlogin" method="POST" class="row g-4">
                      <div class="col-12">
                        <label for="username"
                          >Email <span class="text-danger">*</span></label
                        >
                        <div class="input-group">
                          <div class="input-group-text">
                            <i class="bi bi-envelope-fill"></i>
                          </div>
                          <input
                            type="text"
                            class="form-control"
                            id="username"
                            placeholder="Email"
                          />
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="password"
                          >Password <span class="text-danger">*</span></label
                        >
                        <div class="input-group">
                          <div class="input-group-text">
                            <i class="bi bi-lock-fill"></i>
                          </div>
                          <input
                            type="password"
                            class="form-control"
                            id="password"
                            placeholder="Password"
                          />
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-check">
                          <input
                            type="checkbox"
                            class="form-check-input"
                            id="rememberMe"
                          />
                          <label for="rememberMe" class="form-check-label"
                            >Remember Me</label
                          >
                        </div>
                      </div>

                      <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-4 mt-4">
                          Login
                        </button>
                      </div>

                      <div class="col-12 text-center mt-2">
                        <p>
                          Don't have an account?
                          <a href="register.php" class="text-primary"
                            >Sign Up</a
                          >
                        </p>
                      </div>
                    </form>
                  </div>
                </div>

                <!-- Bagian kanan form -->
                <div class="col-md-5 ps-0 d-none d-md-block">
                  <div
                    class="form-right h-100 bg-primary text-white text-center pt-5"
                  >
                    <!-- Logo AssistMe -->
                    <img
                      src="Logo_AssistMe.png"
                      alt="Logo AssistMe"
                      class="logo"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
