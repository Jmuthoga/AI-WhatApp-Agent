# AI WhatsApp Agent (Laravel + WhatsApp Cloud API + OpenAI)

<p align="center">
  <a href="https://pos.jminnovatechsolution.co.ke" target="_blank">
    <img src="https://www.jminnovatechsolution.co.ke/assets/img/iconbg-512.png" width="280" alt="JM Innovatech Logo">
  </a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-Framework-red" alt="Laravel">
  <img src="https://img.shields.io/badge/WhatsApp-Cloud%20API-green" alt="WhatsApp Cloud API">
  <img src="https://img.shields.io/badge/OpenAI-Assistant-blue" alt="OpenAI">
  <img src="https://img.shields.io/badge/Status-Active-brightgreen" alt="Status">
</p>

---

## About This Project

This repository contains a Laravel-powered AI WhatsApp Agent that integrates:

* Meta WhatsApp Cloud API
* OpenAI GPT (Assistants API)
* Dynamic website data extraction
* Conversation session tracking
* Webhook-based message handling

The agent responds like a human assistant and is designed for JM Innovatech Solutions to automate customer support and provide accurate information on WhatsApp.

---

## Features

* WhatsApp Cloud API integration
* OpenAI GPT responses (context-aware)
* Tracks individual chat sessions
* Scrapes and uses your website content
* Intro message: "This is JM Innovatech AI Agent Response:" only on the first message of the day
* Webhook handling
* Modular Laravel service structure
* Easy to deploy or extend

---

## Tech Stack

| Component  | Technology              |
| ---------- | ----------------------- |
| Backend    | Laravel 10+             |
| AI Engine  | OpenAI Assistants API   |
| Messaging  | WhatsApp Cloud API      |
| Database   | MySQL          |
| Deployment | cPanel / VPS    |

---

## How to Clone This Repository

Clone the project and install all required dependencies:

```bash
# Clone the repository
git clone https://github.com/YOUR-USERNAME/AI-WhatsApp-Agent.git

# Enter the project directory
cd AI-WhatsApp-Agent

# Install backend and frontend dependencies
composer install
npm install && npm run build

# Create environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Set necessary permissions (Linux only)
sudo chmod -R 775 storage bootstrap/cache

# Run database migrations
php artisan migrate
```

## Next Steps After Installation

After cloning the repository and running the initial setup commands, complete the following steps to fully configure and run the AI WhatsApp Agent.

---

### 1. Configure the .env File

Open the `.env` file and fill in the required values.

#### WhatsApp Cloud API
```env
WHATSAPP_TOKEN=
WHATSAPP_PHONE_NUMBER_ID=
WHATSAPP_VERIFY_TOKEN=
WHATSAPP_API_URL=https://graph.facebook.com/v20.0

#### OpenAI
OPENAI_API_KEY=
OPENAI_ASSISTANT_ID=

#### Webhook URL
WHATSAPP_WEBHOOK_URL=https://yourdomain.com/api/webhook/whatsapp

---

### 2. Start the Laravel Server
php artisan serve

The application will run on:
http://127.0.0.1:8000

---

### 3. Optional: Expose Local Server Using Ngrok

If you are testing locally:
ngrok http 8000

Copy the HTTPS forwarding URL provided by Ngrok.

---

### 4. Configure WhatsApp Webhook in Meta Developer Console

In Meta Developer Console, go to:
WhatsApp > Configuration

Set the following:
Callback URL: https://yourdomain.com/api/webhook/whatsapp
Verify Token: (same value used in .env)

Or if using Ngrok:
https://YOUR-NGROK-URL.ngrok-free.app/api/webhook/whatsapp
```

Subscribe to:
- messages
- message_deliveries
- message_reads
- message_template_status

---

### 5. Test the Webhook

Send a message to your WhatsApp Business number.

Laravel should log the incoming webhook request in the terminal.

---

### 6. Deploy to Production (Optional)

You may deploy to any of the following:
- cPanel
- VPS
- Laravel Forge
- Docker
- Cloud hosting

Production deployment steps can be added if needed.

## Conclusion

The AI WhatsApp Agent is now fully installed, configured, and ready for use.  
You can extend the system with additional features such as:

- Custom message templates  
- Admin dashboard for message logs  
- Multiple AI personalities  
- Rich website data extraction  
- Automatic customer onboarding messages  
- API documentation or analytics  

If you need help with installation or configuration, you can contact support directly via WhatsApp:  
[![WhatsApp](https://img.icons8.com/color/48/000000/whatsapp--v1.png)](https://wa.me/254791446968)

The project is now fully functional and ready for development, testing, or production rollout.
