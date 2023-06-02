-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_aula
CREATE DATABASE IF NOT EXISTS `db_aula` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_aula`;

-- Copiando estrutura para tabela db_aula.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.categoria: ~3 rows (aproximadamente)
INSERT INTO `categoria` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Feminino', NULL, NULL),
	(2, 'Masculino', NULL, NULL),
	(3, 'Outro', NULL, NULL);

-- Copiando estrutura para tabela db_aula.emprestimo
CREATE TABLE IF NOT EXISTS `emprestimo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `livros_id` bigint unsigned DEFAULT NULL,
  `dataretirada` date NOT NULL,
  `datadevolucao` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emprestimo_livros_id_foreign` (`livros_id`),
  CONSTRAINT `emprestimo_livros_id_foreign` FOREIGN KEY (`livros_id`) REFERENCES `livros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.emprestimo: ~2 rows (aproximadamente)
INSERT INTO `emprestimo` (`id`, `livros_id`, `dataretirada`, `datadevolucao`, `created_at`, `updated_at`) VALUES
	(2, 2, '2023-06-10', '2023-06-20', '2023-06-02 20:14:28', '2023-06-02 20:16:13'),
	(3, 4, '2023-06-02', '2023-06-15', '2023-06-02 20:14:46', '2023-06-02 20:14:46');

-- Copiando estrutura para tabela db_aula.estoque
CREATE TABLE IF NOT EXISTS `estoque` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `livros_id` bigint unsigned DEFAULT NULL,
  `quantidade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fornecedor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `generolivro_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estoque_livros_id_foreign` (`livros_id`),
  KEY `estoque_generolivro_id_foreign` (`generolivro_id`),
  CONSTRAINT `estoque_generolivro_id_foreign` FOREIGN KEY (`generolivro_id`) REFERENCES `generolivro` (`id`),
  CONSTRAINT `estoque_livros_id_foreign` FOREIGN KEY (`livros_id`) REFERENCES `livros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.estoque: ~5 rows (aproximadamente)
INSERT INTO `estoque` (`id`, `livros_id`, `quantidade`, `fornecedor`, `created_at`, `updated_at`, `generolivro_id`) VALUES
	(4, 4, '50', 'Anvisa', '2023-06-02 19:57:15', '2023-06-02 20:13:44', NULL),
	(5, 3, '30', 'Anvisa', '2023-06-02 20:02:56', '2023-06-02 20:13:50', NULL),
	(6, 2, '30', 'Anvisa', '2023-06-02 20:08:02', '2023-06-02 20:08:02', NULL),
	(7, 2, '25', 'Manu', '2023-06-02 20:08:08', '2023-06-02 20:08:08', NULL),
	(8, 2, '70', 'Manu', '2023-06-02 20:43:48', '2023-06-02 20:43:58', NULL);

-- Copiando estrutura para tabela db_aula.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_aula.generolivro
CREATE TABLE IF NOT EXISTS `generolivro` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.generolivro: ~3 rows (aproximadamente)
INSERT INTO `generolivro` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Ação', NULL, NULL),
	(2, 'Romance', NULL, NULL),
	(3, 'Ficção', NULL, NULL);

-- Copiando estrutura para tabela db_aula.leitura
CREATE TABLE IF NOT EXISTS `leitura` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `data_leitura` date NOT NULL,
  `hora_leitura` time NOT NULL,
  `valor_sensor` double(8,2) NOT NULL,
  `sensor_id` bigint unsigned DEFAULT NULL,
  `mac_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leitura_sensor_id_foreign` (`sensor_id`),
  KEY `leitura_mac_id_foreign` (`mac_id`),
  CONSTRAINT `leitura_mac_id_foreign` FOREIGN KEY (`mac_id`) REFERENCES `mac` (`id`),
  CONSTRAINT `leitura_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.leitura: ~9 rows (aproximadamente)
INSERT INTO `leitura` (`id`, `data_leitura`, `hora_leitura`, `valor_sensor`, `sensor_id`, `mac_id`, `created_at`, `updated_at`) VALUES
	(2, '2023-06-02', '14:17:37', 20.00, NULL, NULL, NULL, NULL),
	(5, '2023-06-10', '15:17:00', 20.00, NULL, NULL, '2023-06-02 20:19:07', '2023-06-02 20:19:07'),
	(6, '2023-06-23', '18:21:00', 12.00, NULL, NULL, '2023-06-02 20:19:43', '2023-06-02 20:20:09'),
	(7, '2023-06-10', '17:20:00', 20.00, NULL, NULL, '2023-06-02 20:20:57', '2023-06-02 20:20:57'),
	(8, '2023-06-02', '16:46:00', 20.00, NULL, NULL, '2023-06-02 20:44:23', '2023-06-02 20:44:23'),
	(9, '2023-06-10', '17:48:00', 45.00, NULL, NULL, '2023-06-02 20:45:58', '2023-06-02 20:45:58'),
	(10, '2023-06-01', '14:59:00', 20.00, NULL, NULL, '2023-06-02 20:59:38', '2023-06-02 20:59:38'),
	(11, '2023-06-02', '15:00:00', 20.00, 1, NULL, '2023-06-02 21:00:56', '2023-06-02 21:00:56'),
	(12, '2023-06-02', '18:22:00', 102.00, 1, 1, '2023-06-02 21:18:59', '2023-06-02 21:19:17');

-- Copiando estrutura para tabela db_aula.livros
CREATE TABLE IF NOT EXISTS `livros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `generolivro_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `livros_generolivro_id_foreign` (`generolivro_id`),
  CONSTRAINT `livros_generolivro_id_foreign` FOREIGN KEY (`generolivro_id`) REFERENCES `generolivro` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.livros: ~3 rows (aproximadamente)
INSERT INTO `livros` (`id`, `nome`, `valor`, `imagem`, `created_at`, `updated_at`, `generolivro_id`) VALUES
	(2, 'acão', '20,90', 'imagem/20230602165412.jpg', '2023-06-02 19:54:12', '2023-06-02 19:54:12', 1),
	(3, 'vermelho branco azul', '25,99', 'imagem/20230602165447.jpg', '2023-06-02 19:54:47', '2023-06-02 19:54:47', 2),
	(4, 'acotar', '69,99', 'imagem/20230602165524.jpg', '2023-06-02 19:55:24', '2023-06-02 19:55:24', 3);

-- Copiando estrutura para tabela db_aula.mac
CREATE TABLE IF NOT EXISTS `mac` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contador` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.mac: ~1 rows (aproximadamente)
INSERT INTO `mac` (`id`, `nome`, `contador`, `created_at`, `updated_at`) VALUES
	(1, 'mac ', 1, NULL, NULL);

-- Copiando estrutura para tabela db_aula.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.migrations: ~13 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_04_14_165129_create_usuario', 1),
	(6, '2023_04_28_175149_create_categorias_table', 1),
	(7, '2023_05_12_170837_mac', 1),
	(8, '2023_05_12_170915_sensor', 1),
	(9, '2023_05_12_170937_leitura', 1),
	(10, '2023_05_17_181445_create_livros', 1),
	(11, '2023_05_19_180417_create_estoque', 1),
	(12, '2023_05_23_170543_create_generolivro', 1),
	(13, '2023_05_23_172426_create_emprestimos', 1);

-- Copiando estrutura para tabela db_aula.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.password_resets: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_aula.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_aula.sensor
CREATE TABLE IF NOT EXISTS `sensor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contador` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.sensor: ~1 rows (aproximadamente)
INSERT INTO `sensor` (`id`, `nome`, `contador`, `created_at`, `updated_at`) VALUES
	(1, 'sensor', 1, NULL, NULL);

-- Copiando estrutura para tabela db_aula.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.users: ~1 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@admin.com.br', NULL, '$2y$10$JxaRmKKlbNuUnNrlAGa6.etNsXGYTkY8dfRM5rDakBoNkHLmDVy/u', NULL, '2023-06-02 19:48:58', '2023-06-02 19:48:58');

-- Copiando estrutura para tabela db_aula.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `usuario_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.usuario: ~2 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `imagem`, `created_at`, `updated_at`, `categoria_id`) VALUES
	(2, 'manu', '029837621', 'manu@admin.com.br', 'imagem/20230602165057.jpg', '2023-06-02 19:50:57', '2023-06-02 19:50:57', 1),
	(3, 'pedro', '313455474', 'admin@admin.com.br', 'imagem/20230602165111.jpg', '2023-06-02 19:51:11', '2023-06-02 19:51:11', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
