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
| Database   | MySQL / MariaDB         |
| Deployment | Linux / cPanel / VPS    |

---

## How to Clone This Repository

```bash
git clone https://github.com/YOUR-USERNAME/AI-WhatApp-Agent.git
cd AI-WhatApp-Agent
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
sudo chmod -R 775 storage bootstrap/cache
php artisan migrate

