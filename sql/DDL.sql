-- 고객 정보 테이블
CREATE TABLE customer_info (
                               customer_name          VARCHAR(50)  NOT NULL,
                               reservation_date       DATE         NOT NULL,
                               contact_number         VARCHAR(20)  NOT NULL,
                               reservation_number     INT AUTO_INCREMENT PRIMARY KEY,
                               company_info           VARCHAR(100) NOT NULL,
                               reservation_maker_info VARCHAR(100) NOT NULL,
                               employee_email_info    VARCHAR(50)  NOT NULL,
                               deposit_status         VARCHAR(20)  NOT NULL,
                               payment_status         VARCHAR(20)  NOT NULL
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
                                       reservation_code VARCHAR(20)  NOT NULL
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
                                        reservation_code VARCHAR(20)  NOT NULL
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
                                       reservation_code VARCHAR(20)  NOT NULL
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
                                      reservation_code VARCHAR(20)  NOT NULL
);