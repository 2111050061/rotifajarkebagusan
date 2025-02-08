
CREATE TABLE chat_sessions (
    session_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    admin_id INT DEFAULT NULL,  -- Can be NULL until an admin responds
    start_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    end_time TIMESTAMP NULL,
    status ENUM('active', 'closed', 'waiting') DEFAULT 'waiting',  -- 'waiting' means no admin has joined yet
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (admin_id) REFERENCES admins(id)
);


CREATE TABLE chat_messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    session_id INT NOT NULL,
    sender ENUM('user', 'admin') NOT NULL,
    message TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (session_id) REFERENCES chat_sessions(session_id)
);


INSERT INTO chat_sessions (user_id, status)
VALUES (1, 'waiting');  -- Replace with the actual user ID


INSERT INTO chat_messages (session_id, sender, message)
VALUES (1, 'user', 'Hello, I need assistance.');  -- Replace with actual session ID, sender, and message


UPDATE chat_sessions
SET admin_id = 2, status = 'active'  -- Replace with actual admin ID
WHERE session_id = 1;


UPDATE chat_sessions
SET end_time = NOW(), status = 'closed'
WHERE session_id = 1;

