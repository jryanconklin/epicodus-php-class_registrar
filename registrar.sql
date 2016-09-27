CREATE DATABASE registrar;
USE registrar;

CREATE TABLE courses (id serial PRIMARY KEY, course_number VARCHAR(50), course_name VARCHAR(100));

CREATE TABLE students (id serial PRIMARY KEY, name VARCHAR(70), enrollment_date DATE);

CREATE TABLE courses_students (id serial PRIMARY KEY, course_id int, student_id int);
