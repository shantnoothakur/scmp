<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Verification | Canada Post</title>
        <link rel="icon" type="image/x-icon" href="./images/favicon.ico" /> 
    <style>
        :root {
            --canada-red: #D52B1E;
            --canada-dark: #1A1A1A;
            --canada-light: #F5F5F5;
            --canada-blue: #0055A4;
            --neon-glow: #00F3FF;
            --gradient-primary: linear-gradient(135deg, #D52B1E 0%, #FF6B6B 100%);
            --gradient-secondary: linear-gradient(135deg, #0055A4 0%, #00A8FF 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
            color: white;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background: rgba(26, 26, 26, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3), 
                        0 0 20px rgba(213, 43, 30, 0.2);
            overflow: hidden;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header {
            background: var(--gradient-primary);
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--neon-glow);
            box-shadow: 0 0 10px var(--neon-glow);
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-image {
            height: 80px;
            width: auto;
            /* Remove the filter that might be making it white */
            filter: none;
        }

        .logo-fallback {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--canada-red);
            font-weight: bold;
            font-size: 28px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .content {
            padding: 35px 30px;
        }

        .title {
            font-size: 22px;
            margin-bottom: 10px;
            font-weight: 600;
            background: var(--gradient-secondary);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-align: center;
        }

        .description {
            color: #CCCCCC;
            margin-bottom: 30px;
            line-height: 1.6;
            text-align: center;
        }

        .captcha-container {
            background: var(--glass-bg);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .captcha-question {
            font-size: 18px;
            margin-bottom: 20px;
            color: #FFFFFF;
            text-align: center;
        }

        .captcha-display {
            font-size: 32px;
            font-weight: 700;
            background: rgba(0, 0, 0, 0.3);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
            letter-spacing: 3px;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 10px rgba(0, 243, 255, 0.1);
            transition: all 0.3s ease;
        }

        .captcha-display:hover {
            box-shadow: 0 0 15px rgba(0, 243, 255, 0.3);
        }

        .input-group {
            margin-bottom: 25px;
        }

        .input-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #FFFFFF;
            text-align: center;
        }

        .input-field {
            width: 100%;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            font-size: 18px;
            color: white;
            transition: all 0.3s ease;
            text-align: center;
        }

        .input-field:focus {
            outline: none;
            border-color: var(--neon-glow);
            box-shadow: 0 0 10px rgba(0, 243, 255, 0.3);
            background: rgba(255, 255, 255, 0.15);
        }

        .button-group {
            display: flex;
            gap: 15px;
        }

        button {
            flex: 1;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .submit-btn {
            background: var(--gradient-primary);
            color: white;
            box-shadow: 0 5px 15px rgba(213, 43, 30, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(213, 43, 30, 0.4);
        }

        .refresh-btn {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .refresh-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .message {
            margin-top: 20px;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            display: none;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .success {
            background: rgba(40, 167, 69, 0.2);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .error {
            background: rgba(220, 53, 69, 0.2);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #AAAAAA;
            font-size: 14px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .loading {
            display: none;
            text-align: center;
            margin-top: 20px;
        }

        .spinner {
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 3px solid var(--neon-glow);
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* 2025 Design Elements */
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: -1;
        }

        .floating-element {
            position: absolute;
            width: 50px;
            height: 50px;
            background: var(--glass-bg);
            border-radius: 10px;
            animation: float 15s infinite linear;
        }

        .floating-element:nth-child(1) {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 70%;
            left: 80%;
            animation-delay: -5s;
        }

        .floating-element:nth-child(3) {
            top: 40%;
            left: 85%;
            animation-delay: -10s;
        }

        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -50px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
            100% { transform: translate(0, 0) rotate(360deg); }
        }

        @media (max-width: 600px) {
            .container {
                max-width: 100%;
            }
            
            .button-group {
                flex-direction: column;
            }
            
            .header {
                padding: 25px;
            }
            
            .content {
                padding: 25px 20px;
            }
            
            .logo-image {
                height: 60px;
            }
            
            .logo-fallback {
                width: 60px;
                height: 60px;
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <div class="container">
        <div class="header">
            <div class="logo-container">
                <!-- Canada Post Logo with multiple fallback options -->
                <img src="./images/CanadaPost.png" alt="Canada Post Logo" class="logo-image" id="logoImage">
                <div id="logo-fallback" class="logo-fallback" style="display: none;">CP</div>
            </div>
        </div>
        
        <div class="content">
            <h1 class="title">Security Verification</h1>
            <p class="description">To ensure the security of our platform, please complete the verification below.</p>
            
            <div class="captcha-container">
                <div class="captcha-question">Solve the following addition problem:</div>
                <div class="captcha-display" id="captchaDisplay">5 + 3 = ?</div>
                
                <div class="input-group">
                    <label for="captchaInput">Enter your answer:</label>
                    <input type="text" id="captchaInput" class="input-field" placeholder="Your answer">
                </div>
                
                <div class="button-group">
                    <button class="refresh-btn" id="refreshBtn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.645 6.35C16.195 4.9 14.205 4 12 4C7.575 4 4 7.575 4 12C4 16.425 7.575 20 12 20C15.73 20 18.84 17.445 19.73 14H17.645C16.83 16.33 14.61 18 12 18C8.685 18 6 15.315 6 12C6 8.685 8.685 6 12 6C13.66 6 15.14 6.69 16.22 7.78L13 11H20V4L17.645 6.35Z" fill="currentColor"/>
                        </svg>
                        Refresh
                    </button>
                    <button class="submit-btn" id="submitBtn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z" fill="currentColor"/>
                        </svg>
                        Verify & Continue
                    </button>
                </div>
                
                <div class="message" id="message"></div>
                <div class="loading" id="loading">
                    <div class="spinner"></div>
                    <p style="margin-top: 10px;">Redirecting to dashboard...</p>
                </div>
            </div>
        </div>
        
        <div class="footer">
            &copy; <?php echo date("Y"); ?> Canada Post. All rights reserved. | Protecting your security
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const captchaDisplay = document.getElementById('captchaDisplay');
            const captchaInput = document.getElementById('captchaInput');
            const refreshBtn = document.getElementById('refreshBtn');
            const submitBtn = document.getElementById('submitBtn');
            const message = document.getElementById('message');
            const loading = document.getElementById('loading');
            const logoImage = document.getElementById('logoImage');
            const logoFallback = document.getElementById('logo-fallback');
            
            let num1, num2, answer;
            
            // Generate random numbers for CAPTCHA
            function generateCaptcha() {
                num1 = Math.floor(Math.random() * 10) + 1;
                num2 = Math.floor(Math.random() * 10) + 1;
                answer = num1 + num2;
                captchaDisplay.textContent = `${num1} + ${num2} = ?`;
                captchaInput.value = '';
                message.style.display = 'none';
                captchaInput.focus();
            }
            
            // Check the answer
            function checkAnswer() {
                const userAnswer = parseInt(captchaInput.value);
                
                if (isNaN(userAnswer)) {
                    showMessage('Please enter a valid number.', 'error');
                    return;
                }
                
                if (userAnswer === answer) {
                    showMessage('Verification successful! Redirecting...', 'success');
                    loading.style.display = 'block';
                    
                    // Redirect to home.php after 2 seconds
                    setTimeout(function() {
                        window.location.href = 'home.php';
                    }, 2000);
                } else {
                    showMessage('Incorrect answer. Please try again.', 'error');
                    generateCaptcha();
                }
            }
            
            // Show message
            function showMessage(text, type) {
                message.textContent = text;
                message.className = 'message ' + type;
                message.style.display = 'block';
            }
            
            // Check if logo loaded properly
            function checkLogo() {
                // If logo hasn't loaded after 1 second, show fallback
                setTimeout(function() {
                    if (logoImage.naturalWidth === 0) {
                        // Try alternative paths
                        const alternativePaths = [
                            'images/ca.png',
                            './ca.png',
                            'ca.png',
                            'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Canada_Post_logo.svg/320px-Canada_Post_logo.svg.png'
                        ];
                        
                        let currentIndex = 0;
                        
                        function tryNextPath() {
                            if (currentIndex < alternativePaths.length) {
                                logoImage.src = alternativePaths[currentIndex];
                                currentIndex++;
                                
                                // Check if this one loads
                                setTimeout(function() {
                                    if (logoImage.naturalWidth === 0 && currentIndex < alternativePaths.length) {
                                        tryNextPath();
                                    } else if (logoImage.naturalWidth === 0) {
                                        // All paths failed, show fallback
                                        logoImage.style.display = 'none';
                                        logoFallback.style.display = 'flex';
                                    }
                                }, 500);
                            } else {
                                // All paths failed, show fallback
                                logoImage.style.display = 'none';
                                logoFallback.style.display = 'flex';
                            }
                        }
                        
                        tryNextPath();
                    }
                }, 1000);
            }
            
            // Event listeners
            refreshBtn.addEventListener('click', generateCaptcha);
            submitBtn.addEventListener('click', checkAnswer);
            
            // Allow Enter key to submit
            captchaInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    checkAnswer();
                }
            });
            
            // Generate initial CAPTCHA
            generateCaptcha();
            
            // Check if logo loads
            checkLogo();
        });
    </script>
</body>
</html>