CREATE DATABASE IF NOT EXISTS usersDb;

USE usersDb;

        CREATE TABLE users(
            id VARCHAR(255) auto_increment NOT NULL,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            last_login TIMESTAMP);
            
		CREATE TABLE tokens( 
			id nvarchar(255) auto_increment NOT NULL primary Key,
            token nvarchar(255) NOT NULL,
            uid nvarchar(255) NOT NULL,
            FOREIGN KEY (uid) references users(id));
            