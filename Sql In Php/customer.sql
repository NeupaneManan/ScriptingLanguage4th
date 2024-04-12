CREATE DATABASE sales_custom;
USE sales_custom;

CREATE TABLE IF NOT EXISTS clients (
    client_id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100),
    city VARCHAR(100)
);

INSERT INTO clients (client_name, city) VALUES
('Bhojraj', 'Halgada'),
('Manan', 'Inaruwa'),
('Priyanshu', 'Itahari'),
('Niraj', 'Itahari');


CREATE TABLE IF NOT EXISTS orders_custom (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    order_date DATE,
    total_amount DECIMAL(10,2),
    FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

INSERT INTO orders_custom (client_id, order_date, total_amount) VALUES
(1, '2024-04-01', 100.50),
(2, '2024-04-02', 200.75),
(3, '2024-04-03', 150.20),
(4, '2024-04-04', 300.00),
(1, '2024-04-05', 75.80);

SELECT * FROM clients;
SELECT * FROM orders_custom;

SELECT SUM(total_amount) AS total FROM orders_custom;
SELECT AVG(total_amount) AS average FROM orders_custom;
SELECT COUNT(*) AS count FROM orders_custom;
SELECT MIN(total_amount) AS lowest FROM orders_custom;
SELECT MAX(total_amount) AS highest FROM orders_custom;


SELECT client_id, COUNT(*) AS num
FROM orders_custom
GROUP BY client_id;


SELECT client_id, AVG(total_amount) AS avg_order
FROM orders_custom
GROUP BY client_id
HAVING AVG(total_amount) > 150;


SELECT clients.client_id, clients.client_name, orders_custom.order_date, orders_custom.total_amount
FROM clients
INNER JOIN orders_custom ON clients.client_id = orders_custom.client_id;


SELECT clients.client_id, clients.client_name, orders_custom.order_date, orders_custom.total_amount
FROM clients
LEFT JOIN orders_custom ON clients.client_id = orders_custom.client_id;


SELECT clients.client_id, clients.client_name, orders_custom.order_date, orders_custom.total_amount
FROM clients
RIGHT JOIN orders_custom ON clients.client_id = orders_custom.client_id;


SELECT clients.client_id, clients.client_name, orders_custom.order_date, orders_custom.total_amount
FROM clients
FULL JOIN orders_custom ON clients.client_id = orders_custom.client_id;
