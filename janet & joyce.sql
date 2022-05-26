-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 03:51 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `janet & joyce`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminpanel`
--

CREATE TABLE `adminpanel` (
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminpanel`
--

INSERT INTO `adminpanel` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_no` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `que` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_no`, `c_id`, `p_id`, `que`, `total`) VALUES
(1, 1, 24, 5, 1000),
(14, 1, 10, 5, 16250),
(15, 1, 10, 5, 16250),
(16, 1, 12, 2, 7000),
(62, 4, 10, 1, 3250);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` text NOT NULL,
  `c_email` text NOT NULL,
  `c_mobile` int(11) NOT NULL,
  `c_address` text NOT NULL,
  `c_city` text NOT NULL,
  `c_postcode` int(11) NOT NULL,
  `c_password` text NOT NULL,
  `role` text NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_email`, `c_mobile`, `c_address`, `c_city`, `c_postcode`, `c_password`, `role`) VALUES
(1, 'afzal', 'afzal@gmail.com', 768884879, 'awddad', 'wadwad', 546456, 'wdawdd', 'customer'),
(4, 'M Y A AHAMED', 'ahamedafzal45@gmail.com', 2147483647, 'Nazmila farm, bandawa, polgahawela', 'Polgahawela', 60300, 'Afzal123', 'customer'),
(18, 'M Y A AHAMED', 'ahamedafzal45@gmail.com', 2147483647, 'Nazmila farm, bandawa, polgahawela', 'Polgahawela', 60300, '123', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `forum_no` int(11) NOT NULL,
  `person_name` text NOT NULL,
  `person_email` text NOT NULL,
  `person_mobile` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forum_no`, `person_name`, `person_email`, `person_mobile`, `message`) VALUES
(3, 'M Y A AHAMED', 'ahamedafzal45@gmail.com', 2147483647, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `orderbook`
--

CREATE TABLE `orderbook` (
  `order_no` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `que` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `address` text NOT NULL,
  `date` date NOT NULL,
  `order_status` text NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderbook`
--

INSERT INTO `orderbook` (`order_no`, `c_id`, `p_id`, `que`, `total`, `address`, `date`, `order_status`) VALUES
(65, 4, 2, 1, 3540, 'M Y A AHAMED, Nazmila farm, bandawa, polgahawela, Polgahawela, 60300, Sri Lanka, +94768884879, ahamedafzal45@gmail.com', '2021-06-25', 'Processing'),
(67, 4, 1, 1, 4000, 'M Y A AHAMED, Nazmila farm, bandawa, polgahawela, Polgahawela, 60300, Sri Lanka, +94768884879, ahamedafzal45@gmail.com', '2021-06-25', 'Packing');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_category` text NOT NULL,
  `p_image` text NOT NULL,
  `p_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_price`, `p_category`, `p_image`, `p_des`) VALUES
(1, 'Boy Shorts', 4000, 'Womens Cloths', 'p1.jpg', 'With a flattering mid-rise fit, these cotton-rich boy shorts are styled in a slim fit, with a button-through fastening and mid-with a mid-thigh hem. Other colours available.'),
(2, 'Halterneck Top', 3540, 'Womens Cloths', 'p2.jpg', 'This flattering, longline fit halterneck top with v-neckline is a stylish summer staple.'),
(3, 'Broderie Sleeveless Top', 2860, 'Womens Cloths', 'p3.jpg', 'In a pretty smock shape, this sleeveless top is made from pure cotton that is soft and breathable. With broderie details throughout.'),
(4, 'Slub Vest', 1520, 'Womens Cloths', 'p4.jpg', 'Meet your new far-from-basic basic. Perfect for warmer days, this supersoft slub vest is designed in a loosely-fitted shape, with a flattering V-neck at the front and back. Wear yours loose over jeans or tucked into a pair of shorts. Other colours available.'),
(5, 'Halterneck Top', 3960, 'Womens Cloths', 'p5.jpg', 'This flattering, longline fit halterneck top with v-neckline is a stylish summer staple.'),
(6, 'Lift, Slim And Shape Skinny Jeans', 1250, 'Womens Cloths', 'p6.jpg', 'Made from a cotton-rich blend with extra stretch these skinny jeans have been designed with cleverly hidden support which sculpts your figure and a high waistband to contour your shape. In a high rise, fitted through the hip and thigh with a slim leg.'),
(7, 'Lift, Slim And Shape Skinny Denim Jeans', 1500, 'Womens Cloths', 'p7.jpg', 'Made from a cotton-rich blend with extra stretch these skinny jeans have been designed with cleverly hidden support which sculpts your figure and a high waistband to contour your shape. In a high rise, fitted through the hip and thigh with a slim leg.'),
(8, 'Stretch Chino Shorts', 3560, 'Womens Cloths', 'p8.jpg', 'Our super-versatile chino shorts are made from a cotton twill fabric with added stretch for extra comfort. Designed in a classic chino style with a concealed zip fly fastening and branded button. Featuring two functional back pockets secured with branded buttons to the reverse. Available in three leg lengths: Short - 7\" inside leg, Regular - 9\" inside leg, and Long - 11\" inside leg. Model height: 6.3 and wears a 32 R.'),
(9, 'Regular Fit T-Shirt', 3500, 'Mens Cloths', 'p9.jpg', 'This T-shirt is designed with stag embroidery. 60% Cotton, 40% Recycled polyester.'),
(10, 'Stretch Chino Shorts', 3250, 'Mens Cloths', 'p10.jpg', 'Our super-versatile chino shorts are made from a cotton twill fabric with added stretch for extra comfort. Designed in a classic chino style with a concealed zip fly fastening and branded button. Featuring two functional back pockets secured with branded buttons to the reverse. Available in three leg lengths: Short - 7\" inside leg, Regular - 9\" inside leg, and Long - 11\" inside leg. Model height: 6.3 and wears a 32 R.'),
(11, 'Stretch Chino Shorts Linen', 3250, 'Mens Cloths', 'p11.jpg', 'Our super-versatile chino shorts are made from a cotton twill fabric with added stretch for extra comfort. Designed in a classic chino style with a concealed zip fly fastening and branded button. Featuring two functional back pockets secured with branded buttons to the reverse. Available in three leg lengths: Short - 7\" inside leg, Regular - 9\" inside leg, and Long - 11\" inside leg. Model height: 6.3 and wears a 32 R.'),
(12, 'Regular Fit T-Shirt Blue', 3500, 'Mens Cloths', 'p12.jpg', 'This T-shirt is designed with stag embroidery. 60% Cotton, 40% Recycled polyester.'),
(13, 'Regular Fit T-Shirt Dark Blue', 3500, 'Mens Cloths', 'p13.jpg', 'This T-shirt is designed with stag embroidery. 60% Cotton, 40% Recycled polyester.'),
(14, 'Tuxedo Suit: Jacket', 7500, 'Mens Cloths', 'p14.jpg', 'Create a flawless ensemble for special events and formal occasions with our elegant tuxedo jacket. With a single-breasted design and one-button fasten, it features a peak lapel and jetted pockets in contrast satin. We\'ve added functional cuffs and a single-back vent to complete the look. Wear yours with our matching trousers and waistcoat. Please note: linings may vary from image.'),
(15, 'Seasalt Blue Women\'s Arty Socks', 250, 'Day to Day Accessories', 'p15.jpg', 'Lightweight, supersoft organic cotton ankle socks, available in a selection of lively designs. Rolled edge cuffs provide added comfort.'),
(16, 'Aela Pastel Mix Lariat Necklace', 780, 'Day to Day Accessories', 'p16.jpg', 'Bring some character to your outfit with this statement pastel mix bead lariat necklace featuring glass and semi precious beads.'),
(17, 'Lipsy Envelope Clutch Bag', 1250, 'Day to Day Accessories', 'p17.jpg', 'An envelope clutch bag from Lipsy, featuring a gold chain and a branded metallic logo to the front.\nUpper 100% Other fibres, Lining. and Sock 100% Other fibres. Sole 100% Other fibres.'),
(18, 'Silver Tone Three Layer Sparkle Necklace', 780, 'Day to Day Accessories', 'p18.jpg', 'Shortest layer lengh: 41cm plus 7cm extender.\n50% Steel, 20% Brass, 15% Zinc, 14% Glass, 1% Cubic Zirconia.'),
(19, 'Accessorize Roxy Round Small Sunglasses', 550, 'Day to Day Accessories', 'p19.jpg', 'Be on top of trends with this smaller edition of Roxy! Featuring brown temples, gold frames and a sleek textured nose bridge, Roxy looks great at a pool party or bathing on the beach.'),
(20, 'Monsoon Multi Flutter Sequin Butterfly Accessory Set', 750, 'Day to Day Accessories', 'p20.jpg', 'Dazzle up their day with this beautiful butterfly bag and hair clip set! Embellished with colourful sequins, this bold bag is designed with sparkly fabric and is secured with a gold-tone zip. Includes two hair clips.'),
(21, 'Monsoon Sparkle Butterfly Accessory Set', 750, 'Day to Day Accessories', 'p21.jpg', 'Accessorise her outfits with sparkly butterflies! This two-piece set includes a headband and stretch bracelet, both in silver-tone metal with crystal butterfly details.'),
(22, 'Set of 3 Brabantia Toilet Accessories', 3580, 'Home Accessories', 'p22.jpg', 'This top trio is here to give your smallest room an easy do-over. The toilet accessory set in White starts off with a strong and hygienic toilet brush and holder. The minimalist toilet roll holder makes it easy to pull paper off the roll, and the toilet roll dispenser discreetly holds up to three rolls. Everything you need to style up your toilet.'),
(23, 'Set of 2 Water Repellent Seat Pads Accessories', 1550, 'Home Accessories', 'p23.jpg', 'Set of 2 water resistant seat pads, suitable for indoor and outdoor use.\nHeight 43cm\nWidth 43cm\nDepth 3cm\nWipe clean only.\nMain 100% Cotton. Lining 100% Polypropylene. Filling 100% Polyester.'),
(24, 'Accessorize Gold Healing Stones Pendant Necklace - Rose Quartz', 1250, 'Day to Day Accessories', 'p24.jpg', 'Part of the Z by Accessorize collection. Rose quartz is said to symbolise unconditional love, emotional healing and compassion and you can wear it around your neck with this simple necklace. Created in rose gold-plated metal. Fastens with a lobster clasp and extender'),
(25, 'Silver Tone Pebble Rope Necklace', 1350, 'Day to Day Accessories', 'p25.jpg', 'Length: 80cm plus 7cm extender. 60% Zinc, 25% Brass, 13% Plastic, 2% Cubic Zirconia'),
(26, 'Ministry Of Pets Flamingo Dog Accessories Bundle', 850, 'Day to Day Accessories', 'p26.jpg', 'Ministry of Pet dog bundle featuring Felicity the Flamingo on a printed fabric collar, inner knotted rope dog toy and a printed melamine pet bowl.'),
(27, 'Gold Tone Chunky Chain Necklace', 2560, 'Day to Day Accessories', 'p27.jpg', 'Length: 41cm plus 7cm extender. 92% Zinc, 5% Steel, 2% Brass, 1% Cubic Zirconia.'),
(28, 'Jon Richard Rhodium Plated Cubic Zirconia Graduated Peardrop Short Pendant Necklace - Gift Boxed', 5500, 'Day to Day Accessories', 'p28.jpg', 'The Jon Richard graduated peardrop necklace is plated in rhodium ( part of the platinum family of metals ) with cubic zirconia crystals. Presented in beautiful high quality blue velvet Jon Richard box. This necklace measures 16\" in length and features a 2\" extender with a lobster clasp fastening.Matching items available.'),
(29, 'Multicolour Beaded Necklace', 2560, 'Day to Day Accessories', 'p29.jpg', 'Length 44cm plus 7cm extender. Matching item available.\n25% Glass, 25% Acrylic, 15% Steel, 15% Polyester, 10% Brass, 5% Zinc, 5% Real Shell *Contains non-textile parts of animal origin.'),
(30, 'The Diamond Store And Diamond Pendant Necklace in 9K White Gold', 6500, 'Day to Day Accessories', 'p30.jpg', 'Brilliant blue topaz and dazzling white diamonds come together to form a glamorous necklace which will bring style and elegance to every outfit. The necklace features an oval cut 2.96CT blue topaz which is held in a 9K claw setting and is encased by 0.08CT of glistening Premium Quality Diamonds. Silver Adjustable Chain Included Pendant Dimensions are 14mm x 11mm at the widest point.'),
(31, 'The Diamond Store And Diamond 0.02CT Ribbon Pendant Necklace in 9K White Gold', 6250, 'Day to Day Accessories', 'p31.jpg', 'Although traditionally given on 20th, 35th and 55th wedding anniversaries, the deep green emeralds of this ribbon pendant make it a popular choice for any special occasion. The unique ribbon design features 0.02CT of Premium Quality Diamonds and 0.22CT of emeralds all delicately held from a bright 9K gold white chain. Silver Adjustable Chain Included Pendant Dimensions are 19mm x 13mm'),
(32, 'Simply Silver Besel Pendant', 4560, 'Day to Day Accessories', 'p32.jpg', 'A silver pendant from Simply Silver featuring a round shape and a bezel set design.\n100% Silver (Plated)'),
(33, 'Fitbit Charge 4 Advanced Fitness Tracker with GPS, Swim Tracking & Up To 7 Day Battery, Black', 5000, 'Other Electronics', 'p33.jpg', 'Built-in GPS: With built-in GPS, leave your phone behind and explore the outdoors with pace and distance on your tracker and see a workout intensity map showing your route and effort in the app when you?re done'),
(34, 'iWatch Overall Protective Cover', 1000, 'Other Electronics', 'p34.jpg', '360 full protection, you don\'t have to worry about your watch being scratched.99% high transparency. Reduction natural viewing experience'),
(35, 'Apple Watch Series 6', 25000, 'Other Electronics', 'p35.jpg', 'S6 SiP is up to 20% faster than Series 5\n5GHz Wi-Fi and U1 Ultra Wideband chip\nTrack your daily activity on Apple Watch and see your trends in the Fitness app on iPhone'),
(36, 'Xiaomi Mi Band 5 Black Health and Fitness Tracker', 18000, 'Other Electronics', 'p36.jpg', 'Upto 14 Days Battery\nHeart Rate Monitor\nSleep Tracker\nActivity Tracker\n5 ATM 50 m water resistance and swimming tracking\nPedometer\nSleep counte'),
(37, 'Apple AirPods Pro', 36000, 'Other Electronics', 'p37.jpg', 'Adaptive EQ automatically tunes music to the shape of your ear\nEasy setup for all your Apple devices2\nQuick access to Siri by saying ?Hey Siri?\nThe Wireless Charging Case delivers more than 24 hours of battery life'),
(38, 'Apple AirPods with Charging Case (Wired)', 22200, 'Other Electronics', 'p38.jpg', 'New Apple H1 headphone chip delivers faster wireless connection to your devices\nCharges quickly in the case\nCase can be charged using the Lightning connector\nRich, high-quality audio and voice'),
(39, 'Apple EarPods with Lightning Connector - White', 5000, 'Other Electronics', 'p39.jpg', 'Control music and video playback\nAnswer and end calls\nWorks with all devices that have a Lightning connector and support iOS 10 or later, including iPod touch, iPad and iPhone.'),
(40, 'Wireless Headphones', 3500, 'Other Electronics', 'p40.jpg', 'Portability: Charging case has a streamlined design that fits easily in your pocket and comes with a lanyard that can be strapped to your backpack to keep it handy.'),
(41, 'Power Bank Portable Phone Charger 30000mAh', 5600, 'Other Electronics', 'p41.jpg', 'Portable Charger with Two-Year Product Warranty. This Portable Mobile Phone Charger uses Market-Leading high quality LI-POLYMER ELECTRIC CORE battery to extend the using life. We are confident in the quality of our products, and we provide two-year warranty.'),
(42, 'SYOSIN Selfie Stick', 2500, 'Other Electronics', 'p42.jpg', 'Mini Folded Size and Light Weight -- 19 cm folding length that doesn\'t occupy too much space thus giving you more spaces when you travel. SYOSIN selfie stick is the best choice for you to record wonderful memories for you.'),
(43, 'DR.Q HI-04 Projector with Projection Screen', 50000, 'Other Electronics', 'p43.jpg', 'This video projector features with an upgraded color light output as well as a native 1920 * 720P resolution and delivers a Full HD clear, dynamic and color vibrant image quality. With the latest 3LCD Technique and 80% enhanced Color Brightness compared with other typical projectors, as well as 90% increased White Brightness, this easy-to-operate & carry 4 Inch mini LCD projector is real value for money.'),
(44, 'Fire TV Stick with Alexa Voice Remote', 10600, 'Other Electronics', 'p44.jpg', 'Latest release of our best-selling streaming device, 50% more powerful than the previous-generation Fire TV Stick (2019 release) for fast streaming in Full HD. Includes Alexa Voice Remote with power and volume buttons.'),
(45, 'Samsung Galaxy S21 5G', 250000, 'Mobile', 'p45.jpg', 'Exynos 2100 5nm smartphone processor brings all the performance you need. Packed with the oomph to rule your social feed while effortlessly keeping up with 8K video editing'),
(46, 'Apple iPhone XR 64GB Black (Renewed)', 110000, 'Mobile', 'p46.jpg', 'This pre-owned product is not Apple certified, but has been professionally inspected, tested and cleaned by Amazon-qualified suppliers.'),
(47, 'Samsung Galaxy S20 Ultra 5G', 300000, 'Mobile', 'p47.jpg', '48 MP Telephoto Camera; 40 MP Front Camera; 108 MP Wide Camera and a huge 100x Space Zoom to capture the world around you like never before\n120 Hz 6.9 Inch Infinity-O Display: Experience every moment in full, edge-to-edge clarity'),
(48, 'Apple iPhone 8 64GB - Space Grey - Unlocked (Renewed)', 85000, 'Mobile', 'p48.jpg', 'This pre-owned product is not Apple certified, but has been professionally inspected, tested and cleaned by Amazon-qualified suppliers.'),
(49, 'Samsung Galaxy A21s', 32000, 'Mobile', 'p49.jpg', 'Mobile camera - 48 MP main camera, 2 MP depth camera, 8 MP ultra-wide camera, 2 MP Macro camera and 13 MP front facing camera\nMobile screen - TFT LCD Infinity-O display, with 6.5 Inch screen, 720 x 1600 pixel resolution, 409 ppi pixel density and 16 million colour support'),
(50, 'Blackview A70 4G Smartphones', 25000, 'Mobile', 'p50.jpg', 'As a cost-effective smartphone,Blackview A70 mobile phone is equipped with the world\'s latest Android 11 system.\'Bubble Notification\' function has been added to A70.When you receive a chat message,you can mount it as a floating window for easy viewing and replying.You can also view all the messages in the same place,or open the chat window anytime while performing multitasking,ensuring that you won\'t miss any important messages.A70 Smarthone is undoubtedly your best choice!');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `r_no` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `message` text NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`r_no`, `p_id`, `name`, `message`, `stars`) VALUES
(15, 9, 'Afzal', 'Good', 1),
(16, 10, 'Afzal', 'Good Product', 3),
(17, 15, 'Afzal', 'Good Product', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_no` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_no`, `c_id`, `p_id`) VALUES
(1, 4, 22),
(4, 4, 9),
(5, 4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminpanel`
--
ALTER TABLE `adminpanel`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_no`),
  ADD KEY `product_id` (`p_id`),
  ADD KEY `customer_id` (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forum_no`);

--
-- Indexes for table `orderbook`
--
ALTER TABLE `orderbook`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `product_id2` (`p_id`),
  ADD KEY `customer_id2` (`c_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`r_no`),
  ADD KEY `product_id4` (`p_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_no`),
  ADD KEY `customer_id3` (`c_id`),
  ADD KEY `product_id3` (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `forum_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderbook`
--
ALTER TABLE `orderbook`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderbook`
--
ALTER TABLE `orderbook`
  ADD CONSTRAINT `customer_id2` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_id2` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `product_id4` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `customer_id3` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_id3` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
