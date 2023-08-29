# FilmFrontierMB
Certainly. Below is a professionally drafted README.md template for your GitHub repository.

---

# FilmFrontierMB

## Overview

Welcome to **FilmFrontierMB**—your one-stop platform for comprehensive insights into the world of cinema. Whether you are a casual moviegoer or an avid film aficionado, our platform offers detailed information, user-generated ratings, and an interactive community for movie discussions.

### Key Features
- Extensive Database of Movies: From classics to the latest releases
- User Ratings: Personalized experience through user-generated ratings
- Community Engagement: Comment sections for robust discussions
- Cultural Diversity: Films from various cultures and perspectives
- API Access: Facilitated data retrieval for external applications

---

## Table of Contents
1. [About Us](#about-us)
2. [Installation](#installation)
3. [DataBase](#database)

---

## About Us
Born out of the global pandemic landscape of 2019, FilmFrontierMB has emerged as a centralized platform to explore, rate, and discuss films. Unlike traditional production companies, we serve as an expansive guide, providing you with detailed cast and crew information, plot summaries, and much more.

[Read more](#)

---

## Installation

**Prerequisites:**
- XAMPP Apache
- MariaDB
- PHP
- Perl

**Steps:**
1. Clone the repository to your local machine.
```bash
git clone <https://github.com/yalcar/FilmFrontierMB.git>
```
2. Start the XAMPP control panel and initialize Apache and MariaDB.
3. Restore the server-side database using the `Database/serverside.sql` file.

---

## Certainly, here's an easy-to-understand README.md file that presents information on the `serverside` database and its tables. This README is aimed at both technical and non-technical users, offering clear descriptions of each table and its purpose. 

---

# Serverside Database Documentation

## Overview

Welcome to the `serverside` database. This database is engineered to serve as the backend structure for FilmFrontierMB, a platform dedicated to movies and movie reviews. Below you'll find a description of each table and what kind of information it holds.

---

## Table of Contents
- [Database Setup](#database-setup)
- [Tables](#tables)
    - [Category Table](#category-table)
    - [Movie Table](#movie-table)
    - [Review Table](#review-table)

---

## Database Setup

**Database Character Set and Collation**
- Character Set: `utf8mb4`
- Collation: `utf8mb4_general_ci`

**SQL Command to Create Database:**
```sql
CREATE DATABASE IF NOT EXISTS `serverside` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

---

## Tables

### Category Table

**Purpose:**  
To categorize movies based on their genre or type.

**Columns:**
- `categoryId`: Unique identifier for each category
- `name`: Name of the category, such as 'Action', 'Comedy', etc.

**SQL Command:**
```sql
CREATE TABLE `category` (
  `categoryId` int(3) NOT NULL,
  `name` varchar(20) NOT NULL
);
```

### Movie Table

**Purpose:**  
To store detailed information about each movie.

**Columns:**
- `movieId`: Unique identifier for each movie
- `title`: Title of the movie
- `categoryId`: Identifier linking to the category table
- `description`: Brief description or synopsis of the movie
- `director`: Name of the movie's director
- `cast`: Names of the main cast
- `ranking`: User ranking (optional)
- `releaseYear`: Year the movie was released
- `movieImage`: URL or path to the movie's image (optional)

**SQL Command:**
```sql
CREATE TABLE `movie` (
  `movieId` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `categoryId` int(3) NOT NULL,
  `description` varchar(800) NOT NULL,
  `director` varchar(50) NOT NULL,
  `cast` varchar(500) NOT NULL,
  `ranking` int(1) DEFAULT NULL,
  `releaseYear` int(4) NOT NULL,
  `movieImage` varchar(900) DEFAULT NULL
);
```

### Review Table

**Purpose:**  
To store user-generated reviews for each movie.

**Columns:**
- `reviewId`: Unique identifier for each review
- `movieId`: Identifier linking to the movie table
- `userId`: Identifier linking to the user table (optional)
- `fullName`: Full name of the reviewer
- `review`: Text of the review
- `dateReview`: Timestamp of when the review was created or last updated

**SQL Command:**
```sql
CREATE TABLE `review` (
  `reviewId` int(8) NOT NULL,
  `movieId` int(5) NOT NULL,
  `userId` int(4) DEFAULT NULL,
  `fullName` varchar(30) NOT NULL,
  `review` varchar(800) NOT NULL,
  `dateReview` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);
```
---

Feel free to adjust the content according to your requirements. This README is intended to give a clear, user-friendly overview of the `serverside` database.

---

Feel free to adapt the content as needed. This README is designed to offer a clear, concise overview of the project, providing users with essential information and guiding them through installation and usage.
