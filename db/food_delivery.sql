-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Restaurants table
CREATE TABLE restaurants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Menu items table
CREATE TABLE menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    restaurant_id INT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(id) ON DELETE CASCADE
);


-- Cart table
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    menu_item_id INT,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_item_id) REFERENCES menu_items(id) ON DELETE CASCADE
);


-- Orders table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


-- Order items table
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    menu_item_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_item_id) REFERENCES menu_items(id) ON DELETE CASCADE
);


-- Insert sample restaurants with unique images
INSERT INTO restaurants (name, description, image) VALUES
('Tasty Bites', 'Delicious fast food and burgers.', 'tasty_bites.png'),
('Sushi Haven', 'Fresh sushi and Japanese cuisine.', 'sushi_haven.jpeg'),
('Pizza Palace', 'Authentic Italian pizzas.', 'pizza_palace.png');


-- Insert sample menu items with unique images
INSERT INTO menu_items (restaurant_id, name, description, price, image) VALUES
(1, 'Cheeseburger', 'Juicy beef patty with cheese and veggies.', 8.99, 'cheeseburger.jpeg'),
(1, 'Fries', 'Crispy golden fries.', 3.99, 'fries.jpeg'),
(2, 'California Roll', 'Crab, avocado, and cucumber roll.', 12.99, 'california_roll.jpeg'),
(2, 'Miso Soup', 'Traditional Japanese soup.', 4.99, 'miso_soup.jpeg'),
(3, 'Margherita Pizza', 'Tomato, mozzarella, and basil.', 14.99, 'margherita_pizza.jpeg'),
(3, 'Garlic Bread', 'Toasted bread with garlic butter.', 5.99, 'garlic_bread.jpeg');


-- Insert an admin user
INSERT INTO users (name, email, password, role) VALUES
('Admin User', 'admin@example.com', '$2y$10$6saCDxavckrCFjUxTq8mbu/gkKY0/.09gN6WKw5D2CjXOT5ZXO0eC', 'admin');