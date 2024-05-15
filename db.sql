CREATE TABLE users (
    userid INT AUTO_INCREMENT PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    userid INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userid) REFERENCES users(userid)
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userid_commenting INT NOT NULL,
    body TEXT NOT NULL,
    post_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userid_commenting) REFERENCES users(userid),
    FOREIGN KEY (post_id) REFERENCES posts(id)
);