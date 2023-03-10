CREATE TABLE users 
(
    user_id INT PRIMARY KEY AUTO_INCREMENT, 
    login VARCHAR(20) NOT NULL, 
    password VARCHAR(20) NOT NULL
);

CREATE TABLE operations 
(
    operations_id INT PRIMARY KEY AUTO_INCREMENT, 
    sum INT NOT NULL,
    operations_type_id INT NOT NULL, 
    operations_user_id INT NOT NULL,
    comment TEXT
);
CREATE TABLE types 
(
    type_id INT PRIMARY KEY AUTO_INCREMENT, 
    name VARCHAR(255) NOT NULL,
    description TEXT
);
ALTER TABLE operations ADD FOREIGN KEY (operations_user_id) REFERENCES users (user_id);
ALTER TABLE operations ADD FOREIGN KEY (operations_type_id) REFERENCES types (type_id);

INSERT INTO users (login, password) VALUES 
            ('user', '123'), 
            ('user2', '123'), 
            ('user3', '123');

INSERT INTO types (name, description) VALUES 
            ('coming', ''), 
            ('expense', '');


INSERT INTO operations (sum, operations_type_id, operations_user_id, comment) VALUES 
            ('300', '1', '1', 'qwaddawdawdaw'), 
            ('200', '1', '1', 'wewdadwswsws'), 
            ('1000', '2', '1', '');
            
