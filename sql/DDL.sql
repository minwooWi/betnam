-- 고객 정보 테이블
create table customer_info
(
    customer_name          varchar(50)  not null,
    reservation_date       date         not null,
    contact_number         varchar(20)  not null,
    reservation_number     int auto_increment primary key,
    company_info           varchar(100) not null,
    reservation_maker_info varchar(100) not null,
    employee_email_info    varchar(100) null,
    deposit_status         varchar(20)  not null,
    payment_status         varchar(20)  not null,
    reservation_code       varchar(20)  not null
);

-- 골프 예약 정보 테이블
CREATE TABLE golf_reservation_info (
                                       reservation_number INT AUTO_INCREMENT PRIMARY KEY,
                                       golf_course_name VARCHAR(100) NOT NULL,
                                       golf_company_info VARCHAR(100) NOT NULL,
                                       reservation_schedule DATE NOT NULL,
                                       tee_time TIME NOT NULL,
                                       hole INT NOT NULL,
                                       headcount INT NOT NULL,
                                       included_items VARCHAR(200),
                                       request VARCHAR(200),
                                       PRIMARY KEY (reservation_number)
);

-- 호텔 예약 정보 테이블
CREATE TABLE hotel_reservation_info (
                                        reservation_number INT AUTO_INCREMENT PRIMARY KEY,
                                        hotel_name VARCHAR(100) NOT NULL,
                                        hotel_company_info VARCHAR(100) NOT NULL,
                                        checkin_date DATE NOT NULL,
                                        checkout_date DATE NOT NULL,
                                        room_count INT NOT NULL,
                                        room_type VARCHAR(50) NOT NULL,
                                        adult_count INT NOT NULL,
                                        child_count INT NOT NULL,
                                        breakfast_included BOOLEAN NOT NULL,
                                        bed_type VARCHAR(50) NOT NULL,
                                        request VARCHAR(200),
                                        PRIMARY KEY (reservation_number)
);

-- 투어 예약 정보 테이블
CREATE TABLE tour_reservation_info (
                                       reservation_number INT AUTO_INCREMENT PRIMARY KEY,
                                       tour_name VARCHAR(100) NOT NULL,
                                       tour_time TIME NOT NULL,
                                       pickup_time TIME NOT NULL,
                                       pickup_location VARCHAR(200),
                                       adult_count INT NOT NULL,
                                       child_count INT NOT NULL,
                                       guide_included BOOLEAN NOT NULL,
                                       request VARCHAR(200),
                                       PRIMARY KEY (reservation_number)
);

-- 차량 예약 정보 테이블
CREATE TABLE car_reservation_info (
                                      reservation_number INT AUTO_INCREMENT PRIMARY KEY,
                                      car_type VARCHAR(50) NOT NULL,
                                      pickup_flight_name VARCHAR(50),
                                      sending_flight_name VARCHAR(50),
                                      pickup_time DATETIME NOT NULL,
                                      pickup_location VARCHAR(200),
                                      sending_time DATETIME NOT NULL,
                                      sending_location VARCHAR(200),
                                      adult_count INT NOT NULL,
                                      child_count INT NOT NULL,
                                      luggage_count INT NOT NULL,
                                      golf_bag_count INT NOT NULL,
                                      request VARCHAR(200),
                                      PRIMARY KEY (reservation_number)
);