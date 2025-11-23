CREATE DATABASE reflexology CHARSET utf8mb4;

USE reflexology;

-- -----------------CRÉATION DES TABLES-------------------

-- Table roles 
CREATE TABLE IF NOT EXISTS roles(
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(50) NOT NULL UNIQUE
)ENGINE=InnoDB;

-- Table users
CREATE TABLE IF NOT EXISTS users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    `password` VARCHAR(100) NOT NULL,
    telephone VARCHAR(20),
    signup_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    connexion_date DATETIME,
    active BOOLEAN DEFAULT TRUE,
    id_roles INT NOT NULL DEFAULT 1,
    CONSTRAINT fk_users_roles FOREIGN KEY (id_roles) REFERENCES roles(id) ON DELETE RESTRICT
)ENGINE=InnoDB;

-- Table services
CREATE TABLE IF NOT EXISTS services(
    id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `description` TEXT NOT NULL,
    duration_minutes INT NOT NULL,
    price DECIMAL(5,2),
    active BOOLEAN DEFAULT TRUE
)ENGINE=InnoDB;

-- Table slots (créneaux horaires)
CREATE TABLE IF NOT EXISTS slots(
    id INT PRIMARY KEY AUTO_INCREMENT,
    `date` DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    available BOOLEAN DEFAULT TRUE
)ENGINE=InnoDB;

-- Table reservations (avec toutes les clés étrangères)
CREATE TABLE IF NOT EXISTS reservations(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    services_id INT NOT NULL,
    slot_id INT NOT NULL,
    `status` VARCHAR(50) DEFAULT 'en attente',
    reservation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    `comment` TEXT,
    CONSTRAINT fk_reservation_users FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_reservation_services FOREIGN KEY (services_id) REFERENCES services(id) ON DELETE RESTRICT,
    CONSTRAINT fk_reservation_slots FOREIGN KEY (slot_id) REFERENCES slots(id) ON DELETE RESTRICT
)ENGINE=InnoDB;

-- Table contact
CREATE TABLE IF NOT EXISTS contact(
    id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    `subject` VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    sent_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    CONSTRAINT fk_contact_users FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
)ENGINE=InnoDB;


-- -----------------INSERTION DE DONNÉES FICTIVES-------------------

INSERT INTO roles (role_name) VALUES ('customer');
INSERT INTO roles (role_name) VALUES ('admin');

INSERT INTO users (firstname, lastname, email, `password`, telephone, connexion_date, active)
VALUES ('Jacqueline', 'Durand', 'jdurand@durand.fr', 'mypassword', '0612345678', '2025-08-19', TRUE);

INSERT INTO users (firstname, lastname, email, `password`, telephone, connexion_date, active, id_roles)
VALUES ('Géraldine', 'Dupond', 'gdupond@mymail.fr', 'secretpassword', '0612345678', '2025-08-19', TRUE, 1),
       ('Sylvie', 'Bertrand', 'sylvietlse@monmail.fr', 'mdp31000', '0612345678', '2025-08-19', TRUE, 1),
       ('Eric', 'Martin', 'ericmartin@mymail.fr', 'martin3101', '0612345678', '2025-08-19', TRUE, 1),
       ('Catherine', 'Thomas', 'cthomas@bestemail.com', 'cath3102', '0612345678', '2025-08-19', TRUE, 1),
       ('Admin', 'System', 'admin@reflexology.fr', 'admin123', '0600000000', '2025-01-01', TRUE, 2);
        
INSERT INTO services (`name`, `description`, duration_minutes, price, active)
VALUES ("SÉANCE DE REFLEXOLOGIE PERSONNALISÉE COMBINÉE", 
        "Une séance de réflexologie apporte bien être physique et bien être émotionnel. La séance d'une heure est adaptée au recueil d'informations personnalisé selon la méthode Sonia Fischmann. Deux microsystèmes seront stimulés en fonction des possibilités et combinés. plantaire - palmaire - faciale - auriculaire", 
        60, 50.00, TRUE),
       ("CURE VITALITÉ", 
        "Votre vitalité est malmenée au quotidien ? Résultat: la fatigue, le stress, le manque d'énergie et la baisse de moral se font ressentir. Il est important de renforcer votre organisme pour vous maintenir en bonne forme et retrouver un bien être absolu. La cure vitalité vous rendra votre dynamisme d'antan pour profiter de la vie et pour prendre soin de vous durablement !", 
        60, 50.00, TRUE),
       ("CURE ANTI STRESS SOMMEIL", 
        "Insomnies, sommeil agité, réveils fatigués? Grâce à 3 séances de réflexologie combinées vous retrouverez un rythme de vie harmonieux en resynchronisant votre horloge biologique. Vous repartirez apaisé et serein pour un équilibre retrouvé et des nuits enfin imperturbables !", 
        60, 50.00, TRUE),
       ("CURE DÉTOX", 
        "Métro, boulot, dodo! Vous avez le sentiment d'être intoxiqué par une vie trop chargée... Vous souhaitez faire une pause pour nettoyer votre corps ? Vous avez envie de légèreté et d'une peau lumineuse ? La cure détox est un véritable drainage des toxines et une remise en forme du corps et de l'esprit. À faire à chaque début de saison ou après des situations de stress, elle vous redonnera de l'éclat !", 
        60, 50.00, TRUE);

