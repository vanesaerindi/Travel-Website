
-- Create a table for services
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT
);

-- Create a table for destinations
CREATE TABLE destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    country VARCHAR(255),
    image VARCHAR(255)
);

-- Create a table for dates (example: tour schedules)
CREATE TABLE travel_dates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination_id INT,
    depart_date DATE,
    return_date DATE,
    FOREIGN KEY (destination_id) REFERENCES destinations(id) ON DELETE CASCADE
);
