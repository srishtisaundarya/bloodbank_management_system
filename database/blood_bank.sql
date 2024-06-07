CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email_or_mobile VARCHAR(255),
    password VARCHAR(255),
    gender VARCHAR(10)
);
INSERT INTO users (first_name, last_name, email_or_mobile, password, gender) 
VALUES ('srishti', 'saundarya', 'srishtisaundarya180@.com', 'srishti', 'female');
INSERT INTO users (first_name, last_name, email_or_mobile, password, gender) 
VALUES ('shreya', 'sharma', 'shreyasharma24muz@gmail.com', 'shreya', 'female');


SELECT * FROM users
WHERE (email_or_mobile = 'srishtisaundarya180@.com')
AND password = 'srishti';
SELECT * FROM users
WHERE (email_or_mobile = 'shreyasharma24muz@gmail.com')
AND password = 'shreya';





CREATE TABLE donor_details (
    donor_id INT AUTO_INCREMENT PRIMARY KEY,
    donor_name VARCHAR(255),
    sex VARCHAR(10),
    age INT,
    weight INT,
    address VARCHAR(255),
    disease VARCHAR(255),
    email VARCHAR(255)
);
INSERT INTO donor_details (donor_name, sex, age, weight, address, disease, email)
VALUES ('srishti saundarya', 'female', 21, 50, 'ranchi', 'None', 'srishtisaundarya180@.com');
INSERT INTO donor_details (donor_name, sex, age, weight, address, disease, email)
VALUES ('shreya sharma', 'female', 22, 50, 'muzaffarpur', 'None', 'shreyasharma24muz@gmail.com');

SELECT * FROM donor_details ;

CREATE TABLE contact_details (
    inquiry_id INT AUTO_INCREMENT PRIMARY KEY,
    blood_group VARCHAR(255),
    bpackets INT,
    fname VARCHAR(255),
    address VARCHAR(255)
);

INSERT INTO contact_details (blood_group, bpackets, fname, address)
VALUES ('O+', 5, 'srishti saundarya', 'ranchi');
INSERT INTO contact_details (blood_group, bpackets, fname, address)
VALUES ('A+', 6, 'shreya sharma', 'muzaffarpur');
SELECT * FROM contact_details ;

CREATE TABLE blood_details (
    donor_id INT AUTO_INCREMENT PRIMARY KEY REFERENCES donor_details(id),
    blood_group VARCHAR(255),
    packets INT
);

INSERT INTO blood_details (blood_group, packets)
VALUES ('o+', 5);
INSERT INTO blood_details ( blood_group, packets)
VALUES ('A+', 6);
SELECT * FROM blood_details ;







