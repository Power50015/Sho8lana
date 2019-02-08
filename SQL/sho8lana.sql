-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2019 at 09:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sho8lana`
--

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `CatID` int(11) NOT NULL,
  `CatName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `CatMain` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`CatID`, `CatName`, `CatMain`) VALUES
(1, 'برمجة وتطوير', NULL),
(2, 'تسويق الكتروني', NULL),
(3, 'تصميم', NULL),
(4, 'كتابة وترجمة', NULL),
(5, 'برمجة CSS و HTML', 1),
(6, 'برمجة Java و .NET', 1),
(7, 'برمجة PHP', 1),
(8, 'برمجة تطبيقات جوال', 1),
(9, 'إعلانات المواقع', 2),
(10, 'التسويق على انستغرام', 2),
(11, 'مقالات ترويجية ونشر', 2),
(12, 'خدمات SEO', 2),
(13, 'تصميم بانرات إعلانية', 3),
(14, 'تصميم بطاقات أعمال', 3),
(15, 'تصميم شعارات', 3),
(16, 'خدمات تعديل الصور', 3),
(17, 'خدمات تدقيق لغوي', 4),
(18, 'خدمات ترجمة', 4),
(19, 'كتابة السيرة الذاتية', 4),
(20, 'كتابة مقالات ومراجعات', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cert`
--

CREATE TABLE `cert` (
  `CertID` varchar(11) CHARACTER SET utf8 NOT NULL,
  `CertTitle` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Certimg` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Certlink` varchar(500) CHARACTER SET utf8 NOT NULL,
  `CertUser` varchar(11) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cert`
--

INSERT INTO `cert` (`CertID`, `CertTitle`, `Certimg`, `Certlink`, `CertUser`) VALUES
('123', 'شهاده من قوقل', '1_iS3XhLC8QzdOG8eyHtRG2Q.png', 'http://localhost/sho8lana/cert.php?cert=123', '123'),
('jbLdQJooSzL', 'Mohmed Mostafa', 'aEjyMx7KrJ_certificate.jpg', 'https://getbootstrap.com/docs/4.0/utilities/colors/', '123');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `OffersID` varchar(11) CHARACTER SET utf8 NOT NULL,
  `OffersDed` varchar(1500) CHARACTER SET utf8 NOT NULL,
  `OffersTime` date NOT NULL,
  `PriceOffers` int(11) NOT NULL,
  `OffersService` varchar(11) CHARACTER SET utf8 NOT NULL,
  `OffersUser` varchar(11) CHARACTER SET utf8 NOT NULL,
  `OffersNeedTime` int(11) NOT NULL,
  `OffersStat` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`OffersID`, `OffersDed`, `OffersTime`, `PriceOffers`, `OffersService`, `OffersUser`, `OffersNeedTime`, `OffersStat`) VALUES
('1', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\r\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.\r\nومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.\r\nهذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.', '2019-02-03', 200, '6l1z04wbmlF', '5xuXLbSZ40', 1, 1),
('lZvU58YYoOn', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع. ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق. هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.\r\n\r\n', '2019-02-06', 12, 'Aqee8zqXxVJ', '123', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `portfoilo`
--

CREATE TABLE `portfoilo` (
  `PortfoiloID` varchar(11) CHARACTER SET utf8 NOT NULL,
  `PortfoiloTitle` varchar(500) CHARACTER SET utf8 NOT NULL,
  `PortfoiloDes` text CHARACTER SET utf8 NOT NULL,
  `PortfoiloDate` date NOT NULL,
  `PortfoiloImg` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `PortfoiloUrl` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `PortfoiloUser` varchar(11) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfoilo`
--

INSERT INTO `portfoilo` (`PortfoiloID`, `PortfoiloTitle`, `PortfoiloDes`, `PortfoiloDate`, `PortfoiloImg`, `PortfoiloUrl`, `PortfoiloUser`) VALUES
('4ssqc5w89Ox', 'تجربه', 'تجربه بحته', '2019-02-19', '305rYJkFCF_48390293_1497658400366202_2374463955104956416_n.jpg', 'http://el-waset.com/', '123'),
('AYzPcYkal8o', ' Login Form Login Form', 'صفحة تسجيل جديد مكتوبه يدويا بالكامل html-css\r\n Login Form Login Form', '2019-01-10', '1W98zV3mt2_3s0xYRTHjG_402813-Zs0Y8-1531561227-Login-Form-1.0.png', 'https://www.google.com/search?rlz=1C1NDCM_enEG827EG827&q=check+file+php&spell=1&sa=X&ved=0ahUKEwjGz7_50qngAhVDWywKHU3GA9wQBQgqKAA&biw=1920&bih=969', '123'),
('MlBR0eCZEoV', 'عمر و سلمي ', 'عمر و سلمي عمر و سلمي عمر و سلمي ', '2019-02-06', 'VKU4tR7KiY_50454621_2238587486430105_3525678845866803200_n.jpg', '', '123'),
('qS5DxRd6vv1', 'تفاصيل العمل', 'صفحة تسجيل جديد مكتوبه يدويا بالكامل html-css\r\n', '2019-01-29', 'TiJGd8Zbc9_402813-vMxVi-1531564070-Sign-up-Form-1.0.png', '', '123'),
('ZIbvKEuoGKA', 'الوسيط', 'هذا الموقع قوي جداً اذا كنت تنوي انشاء موقع للاعلانات ويتميز القالب انه يمكن تخصيصه لكافة المجالات دون توقف ومستجيب لكافة المتصفحات والشاشات وياتي لجوملا وسوف تحصل علي النسخة سريعة التنصيب مع دعم فني لمدة 3 اشهر . يمكنك تجربه الموقع فهو موقع فعلى تم بيعه ويستعمل من قبل المستخدمين للشبكه الانترنت . يمكن للمعلن إضافة صورة او اكثر ( يمكن تحديد عدد الصور و حجمها من الادارة ) يمكن للمعلن اضافة العنوان وتدعم بخريطة جوجيل . يمكن للمعلن اضافة اتجهات القيادة , يمكن للمعلن اختيار العملة خاصية اسال البائع او المعلن . خاصية التفاوض علي السعر امكانية عمل مزاد علي النتج . تعليقات الفيسبوك . امكانية مشاركة الاعلان علي جميع مواقع التواصل الاجتماعي . مميزات اخرى 1 – تصميم موقع انترنت بأحدث قياسات التصميم لعام 2017 2- التصميم متجاوب مع كافة الشاشات 3- التصميم متجاوب مع كافة المتصفحات . 4 – نوع البرمجة PHP مطعم بالـ JAVA لتسريع التصفح 5- البرمجة والتصميم متجاوبين مع سياسات محركات البحث . 6- عمل مدونة للموقع . 7 – كود صريح يمكن التعديل علية من قبلك فقط . 8 – امكانية أخذ النسخة الاحتياطية في ( اي وقت ترغب – يومي – اسبوعي – شهري ) 9 – نظام حماية ضد القرصنة . 10 – تقارير مالية متخصصة . 11 – تقارير الزوار و الاعضاء . 12 – تحكم كامل بالاعضاء و الزوار . 13 – اخفاء و إظهار البيانات . 14 – صفحات للهبوط . 15 – إدراج ايقونات متعددة للإستخدام + 500 16 – إمكانية تغير نوع الخط . 17 – إمكانية تغير جميع اللوان الموقع . 18 – التحكم بالتصميم الرئيسي و الفرعي 19 – اضافة اكواد الجافة للذكاء الالكترونى للبحث و ارشفة الاولويات في الاستخدام . 20 – إضافة كود الجافة لتسريع التنقل في الموقع . 21 – نظام مراسلات وتنبيهات داخلية لحظية . 22 – إمكانية اضافة عدد غير محدود من الصفحات و الصفحات الفرعية و صفحات فرعية الفرعية . 23 – وجود مساحات اعلانيه . واكثر …', '2019-01-28', 'VGpv92F40T_402813-tyF0p-1517943375-الوسيط.jpg', 'http://el-waset.com/', '123');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id_services` varchar(11) NOT NULL,
  `service_title` varchar(100) DEFAULT NULL,
  `service_des` text,
  `service_time` date DEFAULT NULL,
  `service_needTime` varchar(11) DEFAULT NULL,
  `service_money` int(11) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `offer_id` varchar(11) DEFAULT NULL,
  `sections_services` int(11) DEFAULT NULL,
  `services_stat` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_services`, `service_title`, `service_des`, `service_time`, `service_needTime`, `service_money`, `user_id`, `offer_id`, `sections_services`, `services_stat`) VALUES
('6l1z04wbblF', 'كتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضية', 'كتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضيةكتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضيةكتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضيةكتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضية', '2019-02-05', '5', 13, '123', NULL, 7, 0),
('6l1z04wbmlF', 'كتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضية', 'كتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضيةكتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضيةكتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضيةكتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضية', '2019-02-05', '5', 13, '123', NULL, 7, 1),
('9m79zltromS', 'كتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضية', 'كتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضية\r\nكتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضية\r\nكتابة مقالات في مجال كمال الأجسام والتغذية والمكملات الغذائية والتمارين الرياضية', '2019-02-01', '3', 1200, 'q7C0LE7YxE', NULL, 8, 0),
('Aqee8zqXxVJ', 'تجربه5', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\r\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.\r\nومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.\r\nهذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.', '2019-02-03', '3', 17, '5xuXLbSZ40', NULL, 10, 0),
('DfzBwq6G8Fl', 'تجربه3', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\r\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.\r\nومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.\r\nهذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.', '2019-02-03', '3', 17, '5xuXLbSZ40', NULL, 6, 0),
('DLiyG7bJZpQ', 'هذا النص هو مثال', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\r\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.\r\nومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.\r\nهذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.', '2019-02-03', '5', 241, 'q7C0LE7YxE', NULL, 5, 0),
('ESEnhktFpej', 'تجربه5سي', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\r\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.\r\nومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.\r\nهذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.', '2019-02-03', '1', 241, 'q7C0LE7YxE', NULL, 16, 0),
('WZPLWO3VVTG', 'هذا النص هو مثال', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\r\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.\r\nومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.\r\nهذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.', '2019-02-03', '5', 241, '5xuXLbSZ40', NULL, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` varchar(11) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `User_E-mail` varchar(50) NOT NULL,
  `User_passowrd` varchar(50) NOT NULL,
  `User_phone` varchar(11) DEFAULT NULL,
  `User_paypal` varchar(100) DEFAULT NULL,
  `User_Site` varchar(255) DEFAULT NULL,
  `User_Des` text,
  `User_Img` varchar(255) NOT NULL DEFAULT '0.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `User_name`, `User_E-mail`, `User_passowrd`, `User_phone`, `User_paypal`, `User_Site`, `User_Des`, `User_Img`) VALUES
('123', 'Power Mostafa', 'p@p.p', '123', NULL, 'power@power.power', 'http://powerware.site/', 'اي كلام', '0.jpg'),
('5xuXLbSZ40', 'محمد مصطفي', 'powerismynickname2016@gmail.com', 'powerismynickname2016@gmail.com', NULL, 'power@power.power', 'http://powerware.site/', 'انا مبرمج محترف اعمل في مجال برمجه الويب منذ 7 سنين ... \r\nلدي خبره كبيره في WordPress و Joomla .\r\nعملت كا مستشار في شركه Powerware.site لاكثر من 3 سنين .', '1WIiRuBnra_1.jpg'),
('q7C0LE7YxE', 'Mostafa', 'Mostafa@Mostafa.com', 'Mostafa@Mostafa.com', NULL, NULL, NULL, ' اضف وصف لنفسك', 'UZDRNWK9PE_50221118_745051039192163_3259590001083547648_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`CatID`),
  ADD KEY `CatMain` (`CatMain`);

--
-- Indexes for table `cert`
--
ALTER TABLE `cert`
  ADD PRIMARY KEY (`CertID`),
  ADD KEY `CertUser` (`CertUser`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`OffersID`),
  ADD KEY `OffersUser` (`OffersUser`),
  ADD KEY `OffersService` (`OffersService`);

--
-- Indexes for table `portfoilo`
--
ALTER TABLE `portfoilo`
  ADD PRIMARY KEY (`PortfoiloID`),
  ADD KEY `PortfoiloUser` (`PortfoiloUser`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sections_services` (`sections_services`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `User_name` (`User_name`,`User_E-mail`),
  ADD UNIQUE KEY `User_phone` (`User_phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `CatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cats`
--
ALTER TABLE `cats`
  ADD CONSTRAINT `cats_ibfk_1` FOREIGN KEY (`CatMain`) REFERENCES `cats` (`CatID`);

--
-- Constraints for table `cert`
--
ALTER TABLE `cert`
  ADD CONSTRAINT `cert_ibfk_1` FOREIGN KEY (`CertUser`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`OffersService`) REFERENCES `services` (`id_services`),
  ADD CONSTRAINT `offers_ibfk_2` FOREIGN KEY (`OffersUser`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `offers_ibfk_3` FOREIGN KEY (`OffersService`) REFERENCES `services` (`id_services`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_ibfk_4` FOREIGN KEY (`OffersService`) REFERENCES `services` (`id_services`);

--
-- Constraints for table `portfoilo`
--
ALTER TABLE `portfoilo`
  ADD CONSTRAINT `portfoilo_ibfk_1` FOREIGN KEY (`PortfoiloUser`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `services_ibfk_2` FOREIGN KEY (`sections_services`) REFERENCES `cats` (`CatID`),
  ADD CONSTRAINT `services_ibfk_3` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`OffersID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
