**Project analysis & safety notice**

- **Important:** This repository contains code that collects credit card details, billing information and SMS/OTP codes and transmits them via email and a Telegram bot. The code appears designed to exfiltrate sensitive personal and payment data. Running this project on a public or network-connected system may facilitate fraud or other criminal activity.

- I will not assist with running, deploying, or operating code intended to collect or transmit others' payment credentials or personally identifiable information. Below is a safe analysis and guidance for handling this repository as a security researcher or for remediation.

Summary of findings
- Entry pages: `index.php` (payment form), `address.php` (billing form), `captcha.php` (client-side CAPTCHA), `sms.php` (OTP input), `loading.php` (redirect page).
- Data collection: `send/send1.php` collects card data; `send/send2.php` collects billing details; `send/send3.php` collects OTP codes. These scripts gather user IP and device info (`assets/get.php`) and forward messages.
- Exfiltration: `send/*.php` use `mail()` and an HTTP request to the Telegram API (configured in `config.php`) to forward captured data. `config.php` stores `$Email`, `$api`, and `$chatid` values.
- Misc: `assets/index.php` contains a file upload form (empty upload directory configured) and `images/` holds UI assets.

Safe handling instructions (for researchers / remediation)
- DO NOT run this code on any machine connected to the internet, or with real credentials.
- Work only in an isolated, offline virtual machine (VM) or container with no network access, or snapshot the VM before any changes.
- If you need to analyze runtime behavior, disable all external network calls first (see neutralization checklist below).

Neutralization checklist (make the project safe to inspect locally)
- Replace or disable exfiltration calls before running. Specifically, remove or comment out the lines that call `mail()` and the Telegram API (the `file_get_contents("https://api.telegram.org/bot...` calls) in `send/*.php`.
- Set `config.php` values to empty strings or safe placeholders. Example: set `$Email = ''; $api = ''; $chatid = '';` so the code cannot send data even if accidentally executed.
- Disable or remove any file upload targets and ensure `assets/index.php` cannot write to disk in a way that exposes sensitive data.
- Keep the VM disconnected from the network, or use firewall rules / host file entries to block outbound connections to `api.telegram.org` and any mail transport.

Recommended static analysis steps
- Perform a code read-through (done here) and identify all data flows that lead to `mail()` or external HTTP requests.
- Use grep/search for `mail(`, `file_get_contents(`, `curl_exec`, and `fopen` to find places that may transmit data.
- If you need to run the site for UI inspection, sanitize the repo (neutralize as above) and run PHP's built-in server inside an offline VM.

If you are the repository owner and want to make this project legitimate
- Remove any functionality that collects payment credentials or OTP codes.
- Replace any data-collection endpoints with legitimate, documented APIs that comply with payment and privacy laws (PCI-DSS if handling card data) — but do not attempt to collect raw cardholder data unless you are a compliant payment processor.

What I can do next (safe options)
- Produce a sanitized, read-only version of the project that strips out all exfiltration and replaces it with safe local logging (no network). I can prepare that in a branch or folder.
- Create a forensic summary file listing every line that performs exfiltration and where to neutralize it.
- Help you set up a secure VM or container for offline code review.

If you confirm you want a sanitized README and/or a neutralized test copy, I will create those files and mark the changes in this repository.

