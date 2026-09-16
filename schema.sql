CREATE DATABASE IF NOT EXISTS hema_portfolio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE hema_portfolio;

CREATE TABLE IF NOT EXISTS projects (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    number VARCHAR(5) NOT NULL,
    title VARCHAR(150) NOT NULL,
    type VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    css_class VARCHAR(50) NOT NULL DEFAULT 'project-orange',
    sort_order TINYINT UNSIGNED NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS contact_messages (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(190) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_contact_created_at (created_at)
);

INSERT INTO projects (number, title, type, description, css_class, sort_order) VALUES
('01', 'لوحة تحكم للمبيعات', 'PHP / MySQL', 'واجهة عملية تساعد فرق العمل على متابعة الطلبات، الأرقام، وحالة المخزون في مكان واحد.', 'project-orange', 1),
('02', 'منصة حجوزات ذكية', 'PHP / MySQL', 'تجربة حجز مرنة تبدأ من البحث وتنتهي بتأكيد الموعد بسلاسة على كل الأجهزة.', 'project-blue', 2),
('03', 'موقع علامة ناشئة', 'PHP / HTML / CSS', 'هوية رقمية واضحة تحوّل قصة العلامة إلى حضور بصري قابل للنمو.', 'project-green', 3);