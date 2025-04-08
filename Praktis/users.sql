SELECT * FROM study_booking.users;

UPDATE users SET password = TRIM(password) WHERE username = 'admin';
