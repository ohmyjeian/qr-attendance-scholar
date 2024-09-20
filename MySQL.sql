SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";

-- --------------------------------------------------------

-- Table structure for table `admins`
CREATE TABLE `admins` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL, -- Store hashed passwords
  `email` VARCHAR(100),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `leaders`
CREATE TABLE `leaders` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100),
  `role` ENUM('admin', 'leader', 'assistant'), -- ENUM for role
  `church_id` INT,
  `password` VARCHAR(255) NOT NULL, -- Store hashed passwords
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `church`
CREATE TABLE `church` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `location` VARCHAR(255),
  `leader_in_charge` INT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`leader_in_charge`) REFERENCES `leaders`(`id`) ON DELETE SET NULL -- Proper foreign key reference
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `scholars`
CREATE TABLE `scholars` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `student_no` VARCHAR(50) NOT NULL UNIQUE, -- Unique student number
  `name` VARCHAR(100) NOT NULL,
  `course` VARCHAR(100),
  `semester` INT,
  `year_level` INT,
  `qr_code` VARCHAR(255) UNIQUE, -- Store unique QR code for each scholar
  `church_id` INT,
  `leader_id` INT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`church_id`) REFERENCES `church`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`leader_id`) REFERENCES `leaders`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `attendance`
CREATE TABLE `attendance` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `scholar_id` INT,
  `leader_id` INT,
  `status` ENUM('Present', 'Absent') NOT NULL,
  `attendance_date` DATE NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`scholar_id`) REFERENCES `scholars`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`leader_id`) REFERENCES `leaders`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;
