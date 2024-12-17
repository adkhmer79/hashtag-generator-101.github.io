-- Create the database (if it does not already exist)
CREATE DATABASE IF NOT EXISTS hashtag_db;

-- Use the created database
USE hashtag_db;

-- Create the table 'hashtags' to store hashtags data
CREATE TABLE IF NOT EXISTS hashtags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    keyword VARCHAR(255) NOT NULL,
    generated_hashtags TEXT NOT NULL,
    platform VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data into the 'hashtags' table
INSERT INTO hashtags (keyword, generated_hashtags, platform) 
VALUES 
('summer', '#summer, #summervibes, #sunnydays, #vacationmode', 'Facebook'),
('travel', '#travel, #wanderlust, #travelgram, #adventuretime', 'Instagram'),
('fitness', '#fitness, #workout, #fitlife, #gymmotivation', 'TikTok'),
('food', '#food, #foodie, #foodporn, #delicious', 'YouTube'),
('music', '#music, #musictime, #hitsongs, #nowplaying', 'TikTok');
