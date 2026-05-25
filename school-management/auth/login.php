<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Schoolify – Sign In</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/login.css" />
</head>

<body>

    <form method="POST" action="../handlers/login_handler.php" class="card">
        <!-- Icon -->
        <div class="icon-wrap">
            <svg viewBox="0 0 24 24">
                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <polyline points="9 22 9 12 15 12 15 22" />
                <rect x="8" y="9" width="3" height="3" rx="0.5" />
                <rect x="13" y="9" width="3" height="3" rx="0.5" />
            </svg>
        </div>

        <h1>Schoolify</h1>
        <p class="subtitle">School Management System</p>

        <div class="form">
            <!-- Email -->
            <div class="field">
                <label for="email">Email Address</label>
                <div class="input-wrap">
                    <input id="email" type="email" name="email" placeholder="admin@school.com" />
                </div>
            </div>

            <!-- Password -->
            <div class="field">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <input id="password" type="password" name="password" placeholder="••••••••" />
                    <button class="eye-btn" id="eyeBtn" onclick="togglePassword()" aria-label="Toggle password visibility">
                        <svg id="eyeIcon" viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </button>
                </div>
            </div>

            <button class="sign-in-btn" type="submit" name="submit">Sign In</button>
        </div>

        <p class="demo-hint">Demo: use any credentials to enter</p>
    </form>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `
          <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94"/>
          <path d="M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19"/>
          <line x1="1" y1="1" x2="23" y2="23"/>
        `;
            } else {
                input.type = 'password';
                icon.innerHTML = `
          <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
          <circle cx="12" cy="12" r="3"/>
        `;
            }
        }
    </script>

</body>

</html>