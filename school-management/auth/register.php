<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Schoolify – Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/register.css" />
</head>

<body>

    <form method="POST" action="../handlers/register_handler.php" class="card">
        <h1 class="brand">Schoolify</h1>
        <p class="tagline">Create your account</p>

        <div class="form">
            <div class="field">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" placeholder="Your first name" autocomplete="given-name" />
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="you@example.com" autocomplete="email" />
            </div>

            <div class="field">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <input id="password" name="password" type="password" placeholder="Min. 6 characters" autocomplete="new-password" />
                    <button class="eye-btn" id="eyeBtn" onclick="togglePassword()" aria-label="Toggle password visibility" type="button">
                        <svg id="eyeIcon" viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </button>
                </div>
            </div>

            <button class="cta-btn" name="submit">Create Account</button>
        </div>

        <p class="footer-text">
            Already have an account? <a href="../auth/login.php">Sign in</a>
        </p>
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

        function triggerError(el, msg) {
            el.classList.remove('error');
            void el.offsetWidth;
            el.classList.add('error');
            el.placeholder = msg;
            el.value = '';
            el.focus();
            setTimeout(() => el.classList.remove('error'), 400);
        }
    </script>
</body>

</html>