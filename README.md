Food Delivery Website


A fully responsive, sleek, and modern food delivery website built using PHP, MySQL, HTML, CSS, JavaScript, and Bootstrap. It allows users to browse restaurants, view menus, manage carts, and place orders, with a separate admin panel to manage backend operations.


This website features a futuristic design with gradients, animations, mobile responsiveness, and secure authentication.

IF YOU WANT TO SEE THE PICTURES FOR THIS WEBSITE JUST OPEN `Preview-website` Folder




---


Features


User Side


User registration and secure login


Browse restaurant listings and menu items


Add items to a cart and place orders


Mobile and desktop responsive UI




Admin Panel


Manage (add/edit/delete) restaurants and menu items


View and manage user orders




UI/UX


Gradient backgrounds, neon accents & modern cards


Horizontal navbar with a hamburger menu on mobile


Stylish footer with social icons


Smooth transitions and animations




Security


Passwords hashed using bcrypt


Secure database interactions using PDO prepared statements


Session-based user authentication






---


Tech Stack




---


Prerequisites


Ensure the following are installed on Windows 10:


XAMPP (https://www.apachefriends.org/)


VS Code (https://code.visualstudio.com/)


Web Browser: Chrome, Firefox, or Edge


Optional: Composer (https://getcomposer.org/)




VSCode Extensions Recommended:


PHP Intelephense


Prettier


Live Server (for frontend testing)






---


Project Structure


`food_delivery/
├── assets/
│   ├── css/style.css
│   ├── js/script.js
│   └── images/
├── includes/
│   ├── config.php
│   ├── header.php
│   └── footer.php
├── admin/
│   ├── index.php
│   ├── add_restaurant.php
│   ├── add_menu.php
│   └── manage_orders.php
├── auth/
│   ├── login.php
│   ├── register.php
│   └── logout.php
├── cart/
│   ├── cart.php
│   ├── add_to_cart.php
│   └── checkout.php
├── db/food_delivery.sql
├── index.php
├── restaurant.php
└── README.md`




---


Installation & Setup


Step 1: Clone or Copy the Project


Place the folder in:


C:\xampp\htdocs\food_delivery


If cloning:


`git clone <repo-url> C:\xampp\htdocs\food_delivery`




---


Step 2: Start XAMPP


Open XAMPP Control Panel


Start Apache and MySQL






---


Step 3: Import the Database


Visit: `http://localhost/phpmyadmin`


Create or import food_delivery.sql located in db/


Tables created:


users, restaurants, menu_items, cart, orders, order_items






Sample Admin:


Email: `admin@example.com`
Password: `admin123`




---


Step 4: Add Images


Place the following images in assets/images/:


Restaurants: tasty_bites.jpg, sushi_haven.jpg, pizza_palace.jpg


Menu items: cheeseburger.jpg, fries.jpg, california_roll.jpg, etc.


Include placeholder.jpg as a fallback image




If missing:


Copy placeholder.jpg and rename


Or set image = NULL in food_delivery.sql






---


Step 5: Run the Website


Open in browser:


http://localhost/food_delivery


Test Flow:


Register/Login


Browse and select restaurant


Add menu items to cart


Checkout and place order




Admin Panel:


Login with admin credentials


Navigate to /admin/index.php




Mobile Testing:


Open Dev Tools → Toggle device mode (F12)


Test hamburger menu and layout responsiveness






---


Common Issues & Fixes




---


Usage Overview




---


Deployment Guide


To deploy on a live server:


1. Upload food_delivery/ to the server's public directory




2. Set up a MySQL database and import food_delivery.sql




3. Update includes/config.php with remote DB credentials




4. Ensure assets/images/ is writable:






`chmod 777 assets/images`


5. Use HTTPS and consider SSL certification




6. Optional Enhancements:


Integrate payment (Stripe/PayPal)


Enable email confirmations










---


Security Best Practices


Use strong passwords (especially for admin)


Implement:


CSRF protection for forms


Input validation/sanitization


Login rate limiting (to prevent brute-force attacks)








---


Future Improvements


Payment integration (e.g., Stripe, PayPal)


Order tracking and user profile history


Restaurant filtering and search functionality


Live order status updates (e.g., using WebSockets)


Dark mode toggle






---


Contributing


Want to contribute?


1. Fork the repo




2. Create a new branch:


`git checkout -b feature-name`




3. Commit your changes:


`git commit -m "Add feature"`




4. Push to GitHub:


git push origin feature-name




5. Open a Pull Request








---


License


This project is licensed under the MIT License.




---


Contact


For issues or feature suggestions, feel free to contact the developer:


Email: johnsonmunisi2021@gmail.com 
GitHub Issues: Open an issue on this repository