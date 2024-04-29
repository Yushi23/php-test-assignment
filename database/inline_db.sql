CREATE DATABASE inline_db;

CREATE SCHEMA IF NOT EXISTS jsonplaceholder;

CREATE TABLE IF NOT EXISTS jsonplaceholder.posts (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL,
    title TEXT NOT NULL,
    body TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS jsonplaceholder.comments (
    id SERIAL PRIMARY KEY,
    post_id INTEGER NOT NULL,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    body TEXT NOT NULL,
    FOREIGN KEY (post_id) REFERENCES jsonplaceholder.posts(id)
);