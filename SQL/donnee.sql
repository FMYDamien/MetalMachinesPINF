-- Exemple pour créer un admin en générant un salt et un mot de passe hashé.
SET @salt = SUBSTRING(MD5(RAND()), 1, 32);
SET @password = SHA2(CONCAT('admin62', @salt), 256);

INSERT INTO Admin (email, mot_de_passe, salt)
VALUES ('admin@example.com', @password, @salt);
