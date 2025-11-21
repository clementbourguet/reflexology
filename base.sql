CREATE DATABASE reflexology CHARSET utf8mb4;

USE reflexology;
CREATE TABLE IF NOT EXISTS pages(
	id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL UNIQUE,
    content TEXT NOT NULL,
    date_update DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS users(
	id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    `password` VARCHAR(100) NOT NULL,
    telephone VARCHAR(20),
    signup_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    connexion_date DATETIME,
    active BOOLEAN DEFAULT TRUE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS roles(
	id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(50) NOT NULL UNIQUE
)ENGINE=InnoDB;

ALTER TABLE users ADD COLUMN id_roles INT NOT NULL,
    ADD CONSTRAINT FOREIGN KEY (id_roles) REFERENCES roles(id);
    
CREATE TABLE IF NOT EXISTS services(
	id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `description` TEXT NOT NULL,
    duration_minutes INT NOT NULL,
    price DECIMAL(5,2),
    active BOOLEAN DEFAULT TRUE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS slots(
	id INT PRIMARY KEY AUTO_INCREMENT,
    `date` DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    available BOOLEAN DEFAULT TRUE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS reservations(
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    services_id INT NOT NULL,
    slot_id INT NOT NULL,
    `status` VARCHAR(50),
    reservation_date DATETIME,
    `comment` TEXT,
    CONSTRAINT fk_reservation_users FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS contact(
	id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    `subject` VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    sent_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    CONSTRAINT fk_contact FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS user_services(
	user_id INT NOT NULL,
    service_id INT NOT NULL,
    PRIMARY KEY (user_id, service_id),
    CONSTRAINT fk_user_services_users FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_user_services_services FOREIGN KEY (service_id) REFERENCES services(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS services_reservations(
	service_id INT NOT NULL,
    reservation_id INT NOT NULL,
    PRIMARY KEY (service_id, reservation_id),
    CONSTRAINT fk_services_reservations_service FOREIGN KEY (service_id) REFERENCES services(id),
    CONSTRAINT fk_services_reservations_reservation FOREIGN KEY (reservation_id) REFERENCES reservations(id)
)ENGINE=InnoDB;

-- -----------------MODIFICATIONS TABLES-------------------
ALTER TABLE users
MODIFY id_roles INT NOT NULL DEFAULT 1;

-- -----------------INSERTION DE DONNÉES FICTIVES-------------------
INSERT INTO roles (role_name) VALUES ('customer');
INSERT INTO roles (role_name) VALUES ('admin');

INSERT INTO users (firstname, lastname, email, `password`, telephone, connexion_date, `active`)
VALUES ('Jacqueline', 'Durand', 'jdurand@durand.fr', 'mypassword', '0612345678', '2025-08-19', TRUE);

INSERT INTO users (firstname, lastname, email, `password`, telephone, connexion_date, `active`)
VALUES ('Géraldine', 'Dupond', 'gdupond@mymail.fr', 'secretpassword', '0612345678', '2025-08-19', TRUE),
		('Sylvie', 'Bertrand', 'sylvietlse@monmail.fr', 'mdp31000', '0612345678', '2025-08-19', TRUE),
        ('Eric', 'Martin', 'ericmartin@mymail.fr', 'martin3101', '0612345678', '2025-08-19', TRUE),
        ('Catherine', 'Thomas', 'cthomas@bestemail.com', 'cath3102', '0612345678', '2025-08-19', TRUE);
        
INSERT INTO services (`name`, `description`, duration_minutes, price, `active`)
VALUES ("SÉANCE DE REFLEXOLOGIE PERSONNALISÉE COMBINÉE", "Une séance de réflexologie apporte bien être physique et bien être émotionnel. La séance d'une heure est adaptée au recueil d'informations personnalisé selon la 
méthode Sonia Fischmann.
Deux microsystèmes seront stimulés en fonction des possibilités et combinés.  
plantaire - palmaire - faciale - auriculaire", 60, 50, TRUE);

INSERT INTO services (`name`, `description`, duration_minutes, price, `active`)
VALUES ("CURE VITALITÉ", "votre vitalité est malmenée au quotidien ? 
Résultat: la fatigue ,le stress, le manque d'énergie et la baisse de moral se font ressentir . Il 
est important de renforcer votre organisme pour vous maintenir en bonne forme et retrouver 
un bien être absolu.  
La cure vitalité vous rendra votre dynamisme d' antan pour profiter de la vie et pour prendre 
soin de vous durablement ! ", 60, 50, TRUE);

INSERT INTO services (`name`, `description`, duration_minutes, price, `active`)
VALUES ("CURE ANTI STRESS SOMMEIL", " Insomnies,sommeil agité,réveils fatigués? 
Grâce à 3 séances de réflexologie combinées vous retrouverez un rythme de vie 
harmonieux en resynchronisant votre horloge biologique . vous repartirez apaisé et serein 
pour un équilibre retrouvé et des nuits enfin imperturbables !", 60, 50, TRUE);

INSERT INTO services (`name`, `description`, duration_minutes, price, `active`)
VALUES ("CURE DÉTOX", "Métro, boulot, dodo! Vous avez le sentiment d'être intoxiqué par une vie trop 
chargée...  
Vous souhaitez faire une pause pour nettoyer votre corps ? Vous avez envie de légèreté et d' une peau lumineuse ?  
La cure détox est un véritable drainage des toxines et une remise en forme du corps et de l' 
esprit . a faire a chaque début de saison ou après des situations de stress , elle vous 
redonnera de l eclat ! ", 60, 50, TRUE);