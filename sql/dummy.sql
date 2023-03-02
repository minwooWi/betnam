INSERT INTO customer_info (customer_name, reservation_date, contact_number, company_info, reservation_maker_info, employee_email_info, deposit_status, payment_status)
SELECT t1.n, DATE_ADD(NOW(), INTERVAL -FLOOR(RAND()*365) DAY), CONCAT('555-', LPAD(FLOOR(RAND()*1000000), 6, '0')), CONCAT('Company ', FLOOR(RAND()*10)), CONCAT('Reservation Maker ', FLOOR(RAND()*10)), CONCAT('employee', FLOOR(RAND()*100), '@example.com'), 0, 0
FROM (
         SELECT 1 AS n
         UNION SELECT 2
         UNION SELECT 3
         UNION SELECT 4
         UNION SELECT 5
         UNION SELECT 6
         UNION SELECT 7
         UNION SELECT 8
         UNION SELECT 9
         UNION SELECT 10
         UNION SELECT 11
         UNION SELECT 12
         UNION SELECT 13
         UNION SELECT 14
         UNION SELECT 15
         UNION SELECT 16
         UNION SELECT 17
         UNION SELECT 18
         UNION SELECT 19
         UNION SELECT 20
         UNION SELECT 21
         UNION SELECT 22
         UNION SELECT 23
         UNION SELECT 24
         UNION SELECT 25
         UNION SELECT 26
         UNION SELECT 27
         UNION SELECT 28
         UNION SELECT 29
         UNION SELECT 30
         UNION SELECT 31
         UNION SELECT 32
         UNION SELECT 33
         UNION SELECT 34
         UNION SELECT 35
         UNION SELECT 36
         UNION SELECT 37
         UNION SELECT 38
         UNION SELECT 39
         UNION SELECT 40
         UNION SELECT 41
         UNION SELECT 42
         UNION SELECT 43
         UNION SELECT 44
         UNION SELECT 45
         UNION SELECT 46
         UNION SELECT 47
         UNION SELECT 48
         UNION SELECT 49
         UNION SELECT 50
     ) t1
;

INSERT INTO golf_reservation_info (reservation_number, golf_course_name, golf_company_info, reservation_schedule, tee_time, hole, headcount, included_items, request) VALUES
(1, 'The Lakes', 'Tee Time Golf Co.', '2023-03-01', '08:00:00', 18, 4, 'Golf Cart', 'No special request'),
(2, 'Pinehurst Resort', 'GolfNow', '2023-03-02', '10:00:00', 9, 3, 'Caddie, Driving range', 'Early check-in'),
(3, 'Whistling Straits', 'GolfNow', '2023-03-03', '12:00:00', 18, 2, 'Golf Cart', 'Late check-out'),
(4, 'Bethpage Black', 'GolfNow', '2023-03-04', '07:30:00', 18, 4, 'Golf Cart, Range balls', 'Need rental clubs'),
(5, 'Bandon Dunes Golf Resort', 'Tee Time Golf Co.', '2023-03-05', '11:00:00', 9, 3, 'Golf Cart', 'No special request'),
(6, 'TPC Sawgrass', 'GolfNow', '2023-03-06', '09:30:00', 18, 2, 'Caddie, Range balls', 'Need rental clubs'),
(7, 'Kiawah Island Golf Resort', 'Tee Time Golf Co.', '2023-03-07', '13:00:00', 18, 4, 'Golf Cart', 'No special request'),
(8, 'Pebble Beach Golf Links', 'GolfNow', '2023-03-08', '07:00:00', 18, 2, 'Golf Cart, Range balls', 'Early check-in'),
(9, 'Merion Golf Club', 'Tee Time Golf Co.', '2023-03-09', '11:30:00', 9, 3, 'Golf Cart', 'No special request'),
(10, 'Oakmont Country Club', 'GolfNow', '2023-03-10', '08:30:00', 18, 2, 'Caddie, Driving range, Range balls', 'No special request'),
(11, 'Augusta National Golf Club', 'Tee Time Golf Co.', '2023-03-11', '09:00:00', 18, 4, 'Golf Cart, Driving range', 'No special request'),
(12, 'Royal Melbourne Golf Club', 'GolfNow', '2023-03-12', '10:30:00', 18, 2, 'Caddie, Driving range', 'No special request'),
(13, 'The Old Course at St. Andrews', 'Tee Time Golf Co.', '2023-03-13', '12:00:00', 18, 4, 'Golf Cart', 'No special request'),
(14, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(15, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(16, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(17, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(18, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(19, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(20, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(21, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(22, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(23, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(24, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(25, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(26, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(27, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(28, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(29, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(30, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(31, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(32, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(33, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(34, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(35, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(36, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(37, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(38, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(39, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(40, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request'),
(41, 'Valderrama Golf Club', 'GolfNow', '2023-03-14', '08:00:00', 18, 2, 'Golf Cart, Driving range, Range balls', 'No special request');

