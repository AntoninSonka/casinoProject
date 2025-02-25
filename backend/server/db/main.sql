CREATE DATABASE IF NOT EXISTS casino;

USE casino;

CREATE TABLE IF NOT EXISTS user (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(45),
    password VARCHAR(100),
    balance INT,

    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS user_group(
    id INT NOT NULL AUTO_INCREMENT,
    group_name VARCHAR(45),
    score INT,
    user_id INT NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES user(id)
);

CREATE TABLE IF NOT EXISTS user_game_stats(
    id INT NOT NULL AUTO_INCREMENT,
    game_name VARCHAR(45),
    time_stamp TIMESTAMP,
    profit INT,
    user_id INT NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES user(id)
);

CREATE TABLE IF NOT EXISTS fraud_detection(
    id INT NOT NULL AUTO_INCREMENT,
    time_stamp TIMESTAMP,
    balance_change INT,
    user_id INT NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES user(id)
);

CREATE TABLE IF NOT EXISTS casino_stat(
    id INT NOT NULL AUTO_INCREMENT,
    game_name VARCHAR(45),
    profit INT,

    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS error_log(
    id INT NOT NULL AUTO_INCREMENT,
    error_code VARCHAR(100),
    time_stamp TIMESTAMP,
    description VARCHAR(100),
    error_log_location VARCHAR(100),

    PRIMARY KEY(id)
);
