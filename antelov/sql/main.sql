CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    user_details TEXT NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    user_address TEXT DEFAULT NULL,
    photo VARCHAR(255) DEFAULT NULL,
    user_status VARCHAR(255) NOT NULL,
    user_account_status VARCHAR(255) NOT NULL,
    account_type VARCHAR(255) NOT NULL,
    payment_details TEXT NOT NULL,
    created_at VARCHAR(255) DEFAULT NULL,
    updated_at VARCHAR(255) DEFAULT NULL
);



CREATE TABLE chat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    from_id INT NOT NULL,
    to_id INT NOT NULL,
    from_name VARCHAR(255) NOT NULL,
    to_name VARCHAR(255) NOT NULL,
    from_img VARCHAR(255) DEFAULT NULL,
    to_img VARCHAR(255) DEFAULT NULL,
    msg TEXT DEFAULT NULL,
    created_at VARCHAR(255) DEFAULT NULL
);


CREATE TABLE requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lat VARCHAR(255) DEFAULT NULL,
    lng VARCHAR(255) DEFAULT NULL,
    lat_2 VARCHAR(255) DEFAULT NULL,
    lng_2 VARCHAR(255) DEFAULT NULL,
    item_name VARCHAR(255) NOT NULL,
    item_files TEXT NOT NULL,
    unit_type VARCHAR(255) DEFAULT NULL,
    collection_address VARCHAR(255) DEFAULT NULL,
    dropoff_address VARCHAR(255) DEFAULT NULL,
    vehicle_type VARCHAR(255) DEFAULT NULL,
    additional_services TEXT DEFAULT NULL,
    booking VARCHAR(255) DEFAULT NULL,
    budget VARCHAR(255) DEFAULT NULL,
    preferred_payment VARCHAR(255) DEFAULT NULL,
    bid_count INT DEFAULT 0,
    current_bid VARCHAR(255) NOT NULL,
    additional_info TEXT DEFAULT NULL,
    request_status VARCHAR(255) DEFAULT NULL,
    account_id INT NOT NULL,
    account_type VARCHAR(255) NOT NULL,
    created_at VARCHAR(255) DEFAULT NULL,
    updated_at VARCHAR(255) DEFAULT NULL,  
    completed_at VARCHAR(255) DEFAULT NULL
);


CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    personal_id INT NOT NULL,
    business_id INT NOT NULL,
    rating INT NOT NULL,
    comment TEXT DEFAULT NULL,
    created_at VARCHAR(255) DEFAULT NULL
);
 

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    msg TEXT DEFAULT NULL,
    created_at VARCHAR(255) DEFAULT NULL
);
INSERT INTO contacts (fname, lname, email, msg, created_at) VALUES ('John', 'Doe', 'john@gmail.com', 'This is a test message', '2021-10-10 05:08:02');


CREATE TABLE bids (
    id INT AUTO_INCREMENT PRIMARY KEY,
    personal_id INT NOT NULL,
    business_id INT NOT NULL,
    business_name VARCHAR(255) DEFAULT NULL,
    request_id INT NOT NULL,
    additional_services VARCHAR(255) DEFAULT NULL,
    additional_info TEXT DEFAULT NULL,
    item_name VARCHAR(255) NOT NULL,
    amount VARCHAR(255) NOT NULL,
    bid_status VARCHAR(255) DEFAULT NULL,
    created_at VARCHAR(255) DEFAULT NULL,
    updated_at VARCHAR(255) DEFAULT NULL,
    completed_at VARCHAR(255) DEFAULT NULL
);


CREATE TABLE pwd_reset (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pwd_reset_email VARCHAR(255) NOT NULL,
    pwd_reset_selector TEXT NOT NULL,
    pwd_reset_token TEXT NOT NULL,
    pwd_reset_expires TEXT NOT NULL
);
