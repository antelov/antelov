-- INSERT INTO requests (item_name, item_files, unit_type, user_location, vehicle_type, additional_services, booking, budget, preferred_payment, bid_count, current_bid, additional_info, request_status, account_id, account_type, created_at, updated_at)
-- VALUES ('Box', '{\"image\":\"163437395311616.JPG\",\"video\":\"163437395316616a91415830c2.MP4\"}', 'ground floor', '123 West Street', '40ft truck', '{\"services\":\"lift, manpower\"}', 'bid', 12, 'cod', 1, 1, 'abc', 'active', 1,'personal', '2021-10-10', '2021-10-14');



ALTER TABLE requests ADD lat VARCHAR(255) DEFAULT NULL AFTER id;
ALTER TABLE requests ADD lng VARCHAR(255) DEFAULT NULL AFTER lat;
ALTER TABLE requests ADD lat_2 VARCHAR(255) DEFAULT NULL AFTER lng;
ALTER TABLE requests ADD lng_2 VARCHAR(255) DEFAULT NULL AFTER lat_2;
ALTER TABLE requests ADD completed_at VARCHAR(255) DEFAULT NULL AFTER updated_at;
-- ALTER TABLE requests MODIFY user_description TEXT

ALTER TABLE requests CHANGE user_location collection_address VARCHAR(255) DEFAULT NULL;
ALTER TABLE requests ADD dropoff_address VARCHAR(255) DEFAULT NULL AFTER collection_address;

ALTER TABLE bids ADD additional_services VARCHAR(255) DEFAULT NULL AFTER request_id;
ALTER TABLE bids ADD bid_status VARCHAR(255) DEFAULT NULL AFTER amount;
ALTER TABLE bids ADD completed_at VARCHAR(255) DEFAULT NULL AFTER updated_at;

INSERT INTO users(email, phone, user_details, pwd, user_address, photo, user_status, user_account_status, account_type, payment_details, created_at, updated_at)
VALUES ('shadmanwebdev@gmail.com', '11111111', '{\"fname\":\"John\",\"lname\":\"Doe\",\"age\":\"25\"}', 'abcde', '123 West Street', 'avi.png', 'member' , 'verified', 'personal', '{\"a\":\"John\",\"b\":\"Doe\",\"c\":\"125\"}', '2021-10-10', '2021-10-14');
INSERT INTO users(email, phone, user_details, pwd, user_address, photo, user_status, user_account_status, account_type, payment_details, created_at, updated_at)
VALUES ('test6329@gmail.com', '000011110000', '{\"name\":\"somename\"}', 'abcde', '123 West Street', 'avi.png', 'member' , 'verified', 'business', '{\"a\":\"John\",\"b\":\"Doe\",\"c\":\"125\"}', '2021-10-10', '2021-10-14');
INSERT INTO users(email, phone, user_details, pwd, user_address, photo, user_status, user_account_status, account_type, payment_details, created_at, updated_at)
VALUES ('admin@gmail.com', '000011110000', '{\"fname\":\"admin\",\"lname\":\"admin\",\"age\":\"25\"}', 'admin', '123 West Street', 'avi.png', 'admin' , 'verified', 'personal', '{\"a\":\"John\",\"b\":\"Doe\",\"c\":\"125\"}', '2021-10-10', '2021-10-14');