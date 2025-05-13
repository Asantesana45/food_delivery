# Food Delivery Website

A **fully responsive**, sleek, and modern food delivery website built using **PHP, MySQL, HTML, CSS, JavaScript, and Bootstrap**. It allows users to browse restaurants, view menus, manage carts, and place orders. Includes a separate **admin panel** for backend management.

> **Preview:** To see screenshots, open the `Preview-website` folder.

---

## Features

### User Side
- User registration and secure login
- Browse restaurant listings and menu items
- Add items to a cart and place orders
- Mobile and desktop responsive UI

### Admin Panel
- Manage (add/edit/delete) restaurants and menu items
- View and manage user orders

### UI/UX
- Gradient backgrounds, neon accents & modern cards
- Horizontal navbar with a hamburger menu on mobile
- Stylish footer with social icons
- Smooth transitions and animations

### Security
- Passwords hashed using **bcrypt**
- Secure database interactions using **PDO prepared statements**
- Session-based user authentication

---

## Tech Stack

- **Frontend:** HTML, CSS, JavaScript, Bootstrap  
- **Backend:** PHP (with PDO)  
- **Database:** MySQL  
- **Dev Tools:** VS Code, XAMPP  

---

## Prerequisites

Install the following on **Windows 10**:
- [XAMPP](https://www.apachefriends.org/)
- [VS Code](https://code.visualstudio.com/)
- Web Browser (Chrome, Firefox, or Edge)
- (Optional) [Composer](https://getcomposer.org/)

### VSCode Extensions Recommended:
- PHP Intelephense
- Prettier
- Live Server (for frontend testing)

---
---

## Installation & Setup

### Step 1: Clone or Copy the Project
Place the folder in: C:\xampp\htdocs\food_delivery

Or clone using:
```bash
git clone <repo-url> C:\xampp\htdocs\food_delivery

Step 2: Start XAMPP

Open XAMPP Control Panel

Start Apache and MySQL


Step 3: Import the Database

1. Visit http://localhost/phpmyadmin


2. Create a new database: food_delivery


3. Import db/food_delivery.sql



Tables created:
users, restaurants, menu_items, cart, orders, order_items

> Sample Admin Login:
Email: admin@example.com
Password: admin123

Step 4: Run the Website

Visit:

http://localhost/food_delivery

Test Flow:

Register/Login

Browse & select restaurant

Add items to cart

Checkout


Admin Panel:
Visit: /admin/index.php

Mobile Testing:

Open Dev Tools → Toggle device mode (Press F12)

Check hamburger menu and responsiveness

Contributing

Want to contribute?

1. Fork the repo


2. Create a branch:

git checkout -b feature-name


3. Commit your changes:

git commit -m "Add feature"


4. Push and open a Pull Request:

git push origin feature-name




---

License

This project is licensed under the MIT License.


---

Contact

For issues or feature suggestions, feel free to contact the developer:

Email: johnsonmunisi2021@gmail.com
GitHub Issues: Open an issue in this repository

