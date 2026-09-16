<?php
require_once __DIR__ . '/database.php';
$theme = ($_GET['theme'] ?? 'light') === 'dark' ? 'theme-dark' : 'theme-light';

$profile = [
    'name' => 'ibrahim ihab',
    'role' => 'مطور PHP وصانع تجارب رقمية',
    'location' => 'مصرالاسكندريه',
    'email' => 'xblackhema1@gmail.com',
    'phone' => '01003758450',
];

$defaultProjects = [
    [
        'number' => '01',
        'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=85',
        'title' => 'لوحة تحكم للمبيعات',
        'type' => 'PHP / MySQL',
        'description' => 'واجهة عملية تساعد فرق العمل على متابعة الطلبات، الأرقام، وحالة المخزون في مكان واحد.',
        'class' => 'project-orange',
    ],
    [
        'number' => '02',
        'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=85',
        'title' => 'منصة حجوزات ذكية',
        'type' => 'PHP / MySQL',
        'description' => 'تجربة حجز مرنة تبدأ من البحث وتنتهي بتأكيد الموعد بسلاسة على كل الأجهزة.',
        'class' => 'project-blue',
    ],
    [
        'number' => '03',
        'image' => 'https://images.unsplash.com/photo-1558655146-d09347e92766?auto=format&fit=crop&w=900&q=85',
        'title' => 'موقع علامة ناشئة',
        'type' => 'PHP / Front-end',
        'description' => 'هوية رقمية واضحة تحوّل قصة العلامة إلى حضور بصري قابل للنمو.',
        'class' => 'project-green',
    ],
    [
        'number' => '04',
        'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=900&q=85',
        'title' => 'متجر إلكتروني متكامل',
        'type' => 'PHP / MySQL',
        'description' => 'تجربة تسوق سريعة مع إدارة المنتجات والطلبات والدفع في لوحة واحدة.',
        'class' => 'project-purple',
    ],
    [
        'number' => '05',
        'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=900&q=85',
        'title' => 'نظام إدارة عيادة',
        'type' => 'PHP / MySQL',
        'description' => 'تنظيم بيانات المرضى والمواعيد والفواتير بطريقة سهلة وآمنة.',
        'class' => 'project-yellow',
    ],
    [
        'number' => '06',
        'image' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=900&q=85',
        'title' => 'منصة تعليم أونلاين',
        'type' => 'PHP / HTML / CSS',
        'description' => 'منصة بسيطة لعرض الدروس ومتابعة تقدم الطلاب من أي جهاز.',
        'class' => 'project-blue',
    ],
    [
        'number' => '07',
        'image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=900&q=85',
        'title' => 'نظام فواتير للشركات',
        'type' => 'PHP / MySQL',
        'description' => 'إنشاء الفواتير وحفظ العملاء ومتابعة المدفوعات بسهولة.',
        'class' => 'project-orange',
    ],
    [
        'number' => '08',
        'image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=900&q=85',
        'title' => 'موقع مطعم عصري',
        'type' => 'HTML / CSS / PHP',
        'description' => 'قائمة طعام رقمية جذابة مع استقبال طلبات الحجز والتواصل.',
        'class' => 'project-green',
    ],
    [
        'number' => '09',
        'image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=900&q=85',
        'title' => 'بوابة وظائف محلية',
        'type' => 'PHP / MySQL',
        'description' => 'ربط أصحاب الشركات بالباحثين عن عمل من خلال بحث واضح وسريع.',
        'class' => 'project-purple',
    ],
    [
        'number' => '10',
        'image' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=85',
        'title' => 'لوحة مخزون ومخازن',
        'type' => 'PHP / MySQL',
        'description' => 'مراقبة حركة المنتجات والتنبيهات والكميات لحظة بلحظة.',
        'class' => 'project-yellow',
    ],
    [
        'number' => '11',
        'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=900&q=85',
        'title' => 'موقع شركة مقاولات',
        'type' => 'PHP / Front-end',
        'description' => 'عرض المشاريع والخدمات بطريقة احترافية تعزز ثقة العملاء.',
        'class' => 'project-blue',
    ],
    [
        'number' => '12',
        'image' => 'https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=900&q=85',
        'title' => 'نظام حجز ملاعب',
        'type' => 'PHP / MySQL',
        'description' => 'اختيار الملعب والموعد وتأكيد الحجز في خطوات قليلة.',
        'class' => 'project-orange',
    ],
    [
        'number' => '13',
        'image' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&w=900&q=85',
        'title' => 'مدونة تقنية شخصية',
        'type' => 'PHP / HTML / CSS',
        'description' => 'مساحة سريعة لنشر المقالات والأفكار وبناء مجتمع حول المحتوى.',
        'class' => 'project-green',
    ],
    [
        'number' => '14',
        'image' => 'https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=900&q=85',
        'title' => 'منصة خدمات منزلية',
        'type' => 'PHP / MySQL',
        'description' => 'تسهيل الوصول إلى مقدمي الخدمات ومتابعة الطلب من البداية للنهاية.',
        'class' => 'project-purple',
    ],
    [
        'number' => '15',
        'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=85',
        'title' => 'صفحة إطلاق منتج',
        'type' => 'HTML / CSS / PHP',
        'description' => 'صفحة مركزة تحول الاهتمام بالمنتج إلى تسجيلات وتواصل حقيقي.',
        'class' => 'project-yellow',
    ],
];

$projects = getProjects($defaultProjects);
$skills = ['PHP', 'MySQL', 'HTML / CSS', 'Git'];
?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="الملف الشخصي وأعمال <?php echo htmlspecialchars($profile['name']); ?>، مطور PHP وصانع تجارب رقمية.">
    <title><?php echo htmlspecialchars($profile['name']); ?> | <?php echo htmlspecialchars($profile['role']); ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="<?php echo $theme; ?>">
    <header class="site-header">
        <a class="brand" href="#top" aria-label="العودة إلى بداية الصفحة"><span class="brand-mark">H</span><span><?php echo htmlspecialchars($profile['name']); ?></span></a>
        <nav class="main-nav" aria-label="التنقل الرئيسي">
            <a href="#work">أعمالي</a>
            <a href="#about">عني</a>
            <a href="#contact">تواصل</a>
        </nav>
        <div class="header-tools"><div class="theme-switch" aria-label="اختيار مظهر الموقع"><span class="theme-label">المظهر</span><a class="theme-option" data-theme="light" href="?theme=light" aria-label="الوضع الفاتح" aria-current="<?php echo $theme === 'theme-light' ? 'page' : 'false'; ?>">☼</a><a class="theme-option" data-theme="dark" href="?theme=dark" aria-label="الوضع الداكن" aria-current="<?php echo $theme === 'theme-dark' ? 'page' : 'false'; ?>">☾</a></div><a class="header-link" href="mailto:<?php echo htmlspecialchars($profile['email']); ?>">لنتحدث <span aria-hidden="true">↗</span></a></div>
    </header>

    <main id="top">
        <section class="hero section-shell">
            <div class="hero-copy reveal">
                <p class="eyebrow"><span class="status-dot"></span> متاح لمشاريع جديدة</p>
                <h1>أبني تجارب<br><em>تُترك في الذاكرة.</em></h1>
                <p class="hero-text">أنا <?php echo htmlspecialchars($profile['name']); ?>، <?php echo htmlspecialchars($profile['role']); ?>. أحوّل الأفكار المعقدة إلى منتجات رقمية واضحة، سريعة، وممتعة الاستخدام.</p>
                <div class="hero-actions">
                    <a class="button button-dark" href="#work">شاهد أعمالي <span aria-hidden="true">↓</span></a>
                    <a class="text-link" href="mailto:<?php echo htmlspecialchars($profile['email']); ?>">احجز مكالمة قصيرة <span aria-hidden="true">↗</span></a>
                </div>
            </div>
            <div class="hero-profile reveal">
                <div class="profile-frame">
                    <img src="image/pic-personal-upscaled.jpg" alt="صورة شخصية لـ <?php echo htmlspecialchars($profile['name']); ?>">
                </div>
            </div>
        </section>

        <div class="ticker" aria-label="مجالات العمل">
            <div class="ticker-track"><span>تطوير الويب</span><b>✳</b><span>واجهات المستخدم</span><b>✳</b><span>حلول PHP</span><b>✳</b><span>تجارب رقمية</span><b>✳</b><span>تطوير الويب</span><b>✳</b><span>واجهات المستخدم</span><b>✳</b><span>حلول PHP</span><b>✳</b><span>تجارب رقمية</span></div>
        </div>

        <section id="work" class="section-shell work-section">
            <div class="section-heading"><div><p class="eyebrow">مختارات من عملي</p><h2>مشاريع صنعت<br><em>فرقًا حقيقيًا.</em></h2></div><p class="section-intro">أحب المشاريع التي تجمع بين هدف واضح وتنفيذ يهتم بالتفاصيل الصغيرة.</p></div>
            <div class="projects-grid">
                <?php foreach ($projects as $project): ?>
                    <article class="project-card <?php echo htmlspecialchars($project['class']); ?>">
                        <div class="project-visual"><img class="project-image" src="<?php echo htmlspecialchars($project['image']); ?>" alt="صورة توصف مشروع <?php echo htmlspecialchars($project['title']); ?>"><div class="image-shade"></div></div>
                        <div class="project-info"><div class="project-meta"><span class="project-number"><?php echo htmlspecialchars($project['number']); ?></span><span class="project-type"><?php echo htmlspecialchars($project['type']); ?></span></div><h3><?php echo htmlspecialchars($project['title']); ?></h3><p><?php echo htmlspecialchars($project['description']); ?></p><a class="round-arrow" href="#contact" aria-label="تواصل بخصوص المشروع <?php echo htmlspecialchars($project['title']); ?>">↗</a></div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="about" class="about-section">
            <div class="section-shell about-grid"><div><p class="eyebrow">بضع كلمات عني</p><h2>الكود الجيد<br>يبدأ بـ <em>فكرة جيدة.</em></h2></div><div class="about-copy"><p>أعمل على بناء مواقع وتطبيقات تجعل التكنولوجيا أقرب للناس. أوازن بين التفكير المنطقي واللمسة الإبداعية لأصنع حلولًا تبدو بسيطة، لأنها مدروسة جيدًا.</p><p>من أول سطر PHP إلى آخر تفصيلة في الواجهة، أؤمن أن كل قرار تقني يجب أن يخدم تجربة الإنسان.</p><div class="skills-list"><?php foreach ($skills as $skill): ?><span><?php echo htmlspecialchars($skill); ?></span><?php endforeach; ?></div></div></div>
        </section>

        <section id="contact" class="contact-section section-shell"><div class="contact-copy"><p class="eyebrow">هل لديك فكرة؟</p><h2>لنصنع شيئًا<br><em>يستحق الزيارة.</em></h2></div><div class="contact-details"><p>أرسل لي نبذة عن مشروعك، وسأعود إليك خلال يومي عمل.</p><a class="contact-email" href="mailto:<?php echo htmlspecialchars($profile['email']); ?>"><?php echo htmlspecialchars($profile['email']); ?> <span aria-hidden="true">↗</span></a><div class="contact-actions"><a class="contact-phone" href="tel:<?php echo htmlspecialchars($profile['phone']); ?>">اتصل بي: <?php echo htmlspecialchars($profile['phone']); ?></a><a class="whatsapp-link" href="https://wa.me/201003758450" target="_blank" rel="noreferrer">واتساب ↗</a></div><p class="location"><?php echo htmlspecialchars($profile['location']); ?> · أعمل عن بُعد</p></div></section>
    </main>

    <footer class="site-footer section-shell"><span>© <?php echo date('Y'); ?> <?php echo htmlspecialchars($profile['name']); ?></span><span>صُمم وطُوّر بعناية</span><a href="#top">إلى الأعلى ↑</a></footer>
    <script src="app.js" defer></script>
</body>
</html>
