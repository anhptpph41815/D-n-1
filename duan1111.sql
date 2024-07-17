-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: duan1
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bill` (
  `id_bill` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `total` text,
  `pttt` varchar(50) DEFAULT NULL,
  `trangthai` int DEFAULT '0',
  `date` date DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_bill`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
INSERT INTO `bill` VALUES (150,'Đào xuân hải','sfasds','0369037600','hdao4959@gmail.com','635000000','1',0,'2023-01-01',''),(153,'Đào xuân hải','Nam Định','0369037600','hdao4959@gmail.com','370000000','1',1,'2023-01-03',''),(167,'Đào Xuân Hải','hdao4959@gmail.com','0369037600','dhai9757@gmail.com','915000000','1',2,'2023-08-03',''),(169,'Đào Xuân Hải','2342','142423','dhai9757@gmail.com','305000000','0',3,'2023-12-01','7  '),(170,'Đào xuân hải','Hà Nội','0369037600','hdao4959@gmail.com','740000000','0',4,'2023-12-03','   '),(171,'Đào xuân hải','Hà Nội','0369037600','hdao4959@gmail.com','370000000','0',0,'2023-12-03','   '),(172,'Đào xuân hải','sfasds','0369037600','hdao4959@gmail.com','610000000','0',4,'2023-12-04','7'),(173,'Đào xuân hải','sfasds','0369037600','dhai9757@gmail.com','265000000','1',1,'2023-12-04',''),(174,'Đào xuân hải','sfasds','0369037600','hdao4959@gmail.com','370000000','1',2,'2023-12-04',''),(180,'Đào Xuân Hải','Hà Nội','036903760','hdao4959@gmail.com','1200000000','1',3,'2023-12-05',''),(181,'đào xuân hải','Hà Nội','0369037600','hdao4959@gmail.com','370000000','1',3,'2023-12-06',''),(182,'Đào Xuân Hải','Hà Nội','03690','hdao4959@gmail.com','36905000000','0',1,'2023-12-07','');
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `binhluan` (
  `id_binhluan` int NOT NULL AUTO_INCREMENT,
  `noidung` text,
  `id_sanpham` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_binhluan`),
  KEY `fk_binhluan_sanpham_idx` (`id_sanpham`),
  KEY `fk_binhluan_khachhang_idx` (`id_user`),
  CONSTRAINT `fk_binhluan_khachhang` FOREIGN KEY (`id_user`) REFERENCES `khachhang` (`id_user`),
  CONSTRAINT `fk_binhluan_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `binhluan`
--

LOCK TABLES `binhluan` WRITE;
/*!40000 ALTER TABLE `binhluan` DISABLE KEYS */;
INSERT INTO `binhluan` VALUES (22,'đẹp',7,7),(23,'hàng chất lượng',7,7),(24,'chất lượng cao',6,7),(25,'dđasa',30,7);
/*!40000 ALTER TABLE `binhluan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitietbill`
--

DROP TABLE IF EXISTS `chitietbill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitietbill` (
  `id_chitietbill` int NOT NULL AUTO_INCREMENT,
  `id_sanpham` int DEFAULT NULL,
  `ten_sanpham` varchar(100) DEFAULT '0',
  `hinh_sanpham` varchar(100) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `soluong` int DEFAULT NULL,
  `thanhtien` text,
  `id_bill` int DEFAULT NULL,
  PRIMARY KEY (`id_chitietbill`),
  KEY `fk_chitietbill_bill_idx` (`id_bill`),
  CONSTRAINT `fk_chitietbill_bill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitietbill`
--

LOCK TABLES `chitietbill` WRITE;
/*!40000 ALTER TABLE `chitietbill` DISABLE KEYS */;
INSERT INTO `chitietbill` VALUES (220,10,'Đồng Hồ Rolex Datejust 126234 Mặt Xanh Navy','Rolex4.png',265000000,1,'265000000',150),(221,30,'Đồng Hồ Rolex 18238 Day Date President cọc kim cương vàng khối 18k','dong-ho-rolex-18238-day-date-president-coc-kim-cuong-vang-khoi-18k.png',370000000,1,'370000000',150),(224,30,'Đồng Hồ Rolex 18238 Day Date President cọc kim cương vàng khối 18k','dong-ho-rolex-18238-day-date-president-coc-kim-cuong-vang-khoi-18k.png',370000000,1,'370000000',153),(239,47,'Đồng Hồ Rolex 126334 Datejust 41mm White Gold Steel Black Diamond Dial Fluted Bezel Jubilee','Rolex_126334_Datejust_41mm_White_Gold_Steel_Black_Diamond_Dial_Fluted_Bezel_Jubilee.png',305000000,3,'915000000',167),(241,47,'Đồng Hồ Rolex 126334 Datejust 41mm White Gold Steel Black Diamond Dial Fluted Bezel Jubilee','Rolex_126334_Datejust_41mm_White_Gold_Steel_Black_Diamond_Dial_Fluted_Bezel_Jubilee.png',305000000,1,'305000000',169),(242,30,'Đồng Hồ Rolex 18238 Day Date President cọc kim cương vàng khối 18k','dong-ho-rolex-18238-day-date-president-coc-kim-cuong-vang-khoi-18k.png',370000000,2,'740000000',170),(243,30,'Đồng Hồ Rolex 18238 Day Date President cọc kim cương vàng khối 18k','dong-ho-rolex-18238-day-date-president-coc-kim-cuong-vang-khoi-18k.png',370000000,1,'370000000',171),(244,47,'Đồng Hồ Rolex 126334 Datejust 41mm White Gold Steel Black Diamond Dial Fluted Bezel Jubilee','Rolex_126334_Datejust_41mm_White_Gold_Steel_Black_Diamond_Dial_Fluted_Bezel_Jubilee.png',305000000,2,'610000000',172),(245,10,'Đồng Hồ Rolex Datejust 126234 Mặt Xanh Navy','Rolex4.png',265000000,1,'265000000',173),(246,30,'Đồng Hồ Rolex 18238 Day Date President cọc kim cương vàng khối 18k','dong-ho-rolex-18238-day-date-president-coc-kim-cuong-vang-khoi-18k.png',370000000,1,'370000000',174),(252,9,'Đồng Hồ Rolex Datejust 126234 Mặt Vi tính Xanh Navy','Rolex3.png',285000000,1,'285000000',180),(253,47,'Đồng Hồ Rolex 126334 Datejust 41mm White Gold Steel Black Diamond Dial Fluted Bezel Jubilee','Rolex_126334_Datejust_41mm_White_Gold_Steel_Black_Diamond_Dial_Fluted_Bezel_Jubilee.png',305000000,3,'915000000',180),(254,30,'Đồng Hồ Rolex 18238 Day Date President cọc kim cương vàng khối 18k','dong-ho-rolex-18238-day-date-president-coc-kim-cuong-vang-khoi-18k.png',370000000,1,'370000000',181),(255,47,'Đồng Hồ Rolex 126334 Datejust 41mm White Gold Steel Black Diamond Dial Fluted Bezel Jubilee','Rolex_126334_Datejust_41mm_White_Gold_Steel_Black_Diamond_Dial_Fluted_Bezel_Jubilee.png',305000000,121,'36905000000',182);
/*!40000 ALTER TABLE `chitietbill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhmuc` (
  `id_danhmuc` int NOT NULL AUTO_INCREMENT,
  `ten_danhmuc` varchar(255) DEFAULT NULL,
  `img_danhmuc` varchar(255) DEFAULT NULL,
  `video_danhmuc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_danhmuc`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmuc`
--

LOCK TABLES `danhmuc` WRITE;
/*!40000 ALTER TABLE `danhmuc` DISABLE KEYS */;
INSERT INTO `danhmuc` VALUES (1,'rolex','ROLEX.png','Rolex....mp4'),(2,'hublot','HUBLOT.png','trailerhublot.mp4'),(3,'richard mille','MILLE.png',''),(4,'franck muller','MULLER.png','trailermuller.mp4'),(5,'patek philippe','patek.png','trailerpatek.mp4');
/*!40000 ALTER TABLE `danhmuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khachhang` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `role` int DEFAULT '0',
  `password` varchar(45) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khachhang`
--

LOCK TABLES `khachhang` WRITE;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` VALUES (1,'Đào Xuân Hải','hdao4959@gmail.com','123',NULL,1,'123',NULL),(7,'Đào Xuân Hải','dhai9757@gmail.com','Nam Định','0369037600',0,'123',NULL),(8,'đào xuân hải','dhao4959@gmail.com',NULL,NULL,0,'hhhhhh',NULL);
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `momo`
--

DROP TABLE IF EXISTS `momo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `momo` (
  `id_momo` int NOT NULL AUTO_INCREMENT,
  `partnerCode` varchar(100) DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `order_Info` varchar(100) DEFAULT NULL,
  `order_Type` varchar(100) DEFAULT NULL,
  `trans_Id` int DEFAULT NULL,
  `pay_Type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_momo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `momo`
--

LOCK TABLES `momo` WRITE;
/*!40000 ALTER TABLE `momo` DISABLE KEYS */;
/*!40000 ALTER TABLE `momo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sanpham` (
  `id_sanpham` int NOT NULL AUTO_INCREMENT,
  `ten_sanpham` text,
  `img_sanpham` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `tinhtrang` varchar(105) DEFAULT NULL,
  `id_danhmuc` int NOT NULL,
  `thamnuoc` varchar(500) DEFAULT NULL,
  `vanhdongho` varchar(500) DEFAULT NULL,
  `nangluong` varchar(500) DEFAULT NULL,
  `chatlieuvo` varchar(500) DEFAULT NULL,
  `daydeo` varchar(500) DEFAULT NULL,
  `khoa` varchar(500) DEFAULT NULL,
  `matkinh` varchar(500) DEFAULT NULL,
  `sanxuattai` varchar(500) DEFAULT NULL,
  `tieude1` varchar(500) DEFAULT NULL,
  `tieude2` varchar(500) DEFAULT NULL,
  `tieude3` varchar(500) DEFAULT NULL,
  `noidung1` text,
  `noidung2` text,
  `noidung3` text,
  `soluong` int DEFAULT NULL,
  PRIMARY KEY (`id_sanpham`),
  KEY `fk_danhmuc_idx` (`id_danhmuc`),
  CONSTRAINT `fk_danhmuc` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danhmuc`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--

LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` VALUES (1,'Đồng Hồ Rolex Oyster Perpetual Day-Date 36mm','Rolex1.png','                                                                                                                                                                                                                                                                                                                                                         Vỏ bằng Titanium được hoàn thiện và đánh bóng bằng Satin dây đeo da,                                                                                       ',1011000000,'MỚI 100% FULLBOX SÁCH HỘP',1,'Khả năng chống thấm nước lên đến mức 100m/330 feet','Rãnh, vàng Everose 18 ct','Bộ chuyển động Perpetual, máy cơ, tự lên dây Calibre 3255, Nhà sản xuất Rolex','Oyster, 36 mm, vàng Everose, Vỏ chính đơn khối, nút vặn nắp lưng và nút chỉnh lên dây','President, mối nối 3 mảnh bán vòm, Vàng Everose 18 ct','Khóa vặn gập ẩn Crownclasp','Ngọc bích chống trầy xước, ống kính cyclops trên hiển thị số ngày','Thụy Sĩ','Đồng hồ Rolex Oyster Perpetual Day-Date 36mm thiết kế vành rãnh đặc trưng','Mặt đồng hồ Rolex Oyster Perpetual Day-Date 36mm sáng bóng đầy bí ẩn','Đồng hồ Rolex Oyster Perpetual Day-Date 36mm hiệu suất tối ưu','Đồng hồ Rolex Oyster Perpetual Day-Date 36mm sở hữu đai kính rãnh đặc trưng riêng của Rolex. Ban đầu, đồng hồ được tạo ra để dễ dàng xoay vòng bezel và vỏ để đảm bảo khả năng chống nước tối đa nhất. Sau đó, thiết kế giống như một đường rãnh ở mặt sau được vặn chắc chắn vào vỏ giúp tăng cường độ chống thấm nước tuyệt vời nhất.\r\n\r\nKể từ đó, thiết kế rãnh đã trở thành một chi tiết rất thẩm mỹ có giá trị nổi bật trong phong cách thương hiệu Rolex. Như vậy, mẫu đồng hồ này cũng được thừa hưởng giá trị thẩm mỹ cao đó và thu hút biết bao nhiêu ánh mắt phải trầm trồ muốn sở hữu','Mặt đồng hồ có lớp phủ tia mặt trời hoàn thiện tạo ra sự phản chiếu ánh sáng tinh tế và hấp dẫn. Phương pháp này sử dụng kỹ thuật chải khéo léo để tạo ra một đường rãnh hướng ra ngoài từ tâm của mặt số. Ánh sáng khuếch tán nhất quán dọc theo từng tác phẩm điêu khắc, tạo ra ánh sáng lấp lánh đặc biệt di chuyển theo vị trí của cổ tay. Sau khi lớp phủ này hoàn thành, áp dụng công nghệ PVD hoặc mạ điện để phủ màu mặt số. Với sự kết hợp màu khéo léo giữa màu đen và màu vàng đồng, mặt đồng hồ được sơn thêm lớp bóng nhẹ mang lại sự bí ẩn và sang trọng.','Tiếp theo, mẫu đồng hồ Perpetual Day-Date được trang bị bộ chuyển động thế hệ mới được phát triển và sản xuất hoàn toàn của Rolex. Đó là bộ máy Calibre 3255 mang lại mức hiệu suất vượt trội. Bộ máy cơ tự lên dây cót này chiếm vị trí hàng đầu trong lĩnh vực sản xuất đồng hồ.\r\n\r\nChính vì vậy, một tác phẩm nghệ thuật tuyệt đẹp từ 14 công nghệ đã được cấp bằng sáng chế của Rolex, chiếc đồng hồ này mang lại những lợi ích như đạt độ chính xác, khả năng dự trữ năng lượng cao. Đặc biệt là khả năng nhiễm từ, chống sốc, dễ sử dụng và độ tin cậy.',56),(2,'Đồng Hồ Hublot Classic Fusion Chronograph Titanium Blue 45MM','HublotClock.png','Vỏ bằng Titanium được hoàn thiện và đánh bóng bằng Satin dây đeo da, Chiếc đồng hồ là một thiết kế độc đáo của đồng hồ bấm giờ tự động Unico. Nó có thể dự trữ năng lượng lên tới 42 giờ.',195000000,'MỚI 100% FULLBOX SÁCH HỘP',2,'Chống thấm nước mức 50m hoặc 5 ATM','Titanium được hoàn thiện và đánh bóng bằng Satin với 6 ốc vít hình chữ H','Máy cơ, tự lên dây HUB1143 Self-winding Chronograph Movement dự trữ năng lượng 42 giờ','Vỏ bằng Titanium được hoàn thiện và đánh bóng bằng Satin','Dây đeo cao su màu xanh và da cá sấu','khóa clasp bằng thép không gỉ','Sapphire với khả năng chống phản chiếu','Nhà máy đồng hồ Thụy Sĩ','Thiết kế của Hublot Classic Fusion Chronograph Titanium Blue','Bên trongđồng hồ Hublot Classic Fusion Chronograph Titanium Blue','Đại lý cung cấp Hublot Classic Fusion Chronograph Titanium Blue','Đồng hồ Hublot Classic Fusion Chronograph Titanium Blue có vẻ bề ngoài khỏe khoắn, nam tính, thời thượng. Với vành đồng hồ làm từ chất liệu titanium siêu nhẹ và siêu bền bỉ, chiếc đồng hồ có kích thước mặt 45mm này là người bạn đồng hành hoàn hảo của các quý ông. Vành đồng hồ được chải xước dọc công phu và đánh bóng với Satin làm nổi bật 6 đinh ốc cách điệu theo chữ H trứ danh của Hublot. Chi tiết này tạo ra độ tương đồng hoàn hảo giữa mặt đồng hồ và càng nối dây.','Hublot Classic Fusion Chronograph Titanium Blue hoạt động chính xác nhờ bộ máy tự động HUB1143. Chế tác thủ công bằng tay hoàn hảo cho một khả năng chống nước tuyệt vời, đạt mức 50m chiều sâu. Thời lượng cót 42 giờ đồng hồ minh chứng cho độ chỉnh chu từ công nghệ làm đồng hồ cơ tiên tiến bật nhất của Hublot.','TÌNH TRẠNG : MỚI 100% FULLBOX SÁCH HỘP\r\nTHÔNG TIN THÊM:\r\nCam kết tất cả sản phẩm bán ra là Chính Hãng 100%Bảo hành từ 2 đến 5 năm theo đúng tiêu chuẩn của hãngTặng gói Spa miễn phí 2 năm trị giá 3.000.000 đồngGiao hàng toàn quốc,hỗ trợ 24/7 về chất lượng sản phẩmGiá trên website chỉ mang tính tham khảo,có thể thay đổi theo thời điểm để có giá tốt nhất quý khách vui lòng LH qua HotlineĐẶT MUA SẢN PHẨMCHAT VỚI EU LUXURYcall iconCẦN TƯ VẤN THÊM\r\nĐể lại số điện thoại...\r\nGỬIMUA HÀNG TẠI HÀ NỘIđịa chỉ mua hàngSố 3A Phố Trần Quang Diệu - Q.Đống Đa - Tp.Hà NộihotlineHotline : 093.66.88888Bảo hành : Chính hãng toàn quốcMiễn phí vận chuyển toàn quốc, giao nhanh trong nội thành Hà Nội & Tp.HCM1 đổi 1 trong 10 ngày nếu có lỗi nhà sản xuất\r\nđồng hồ Hublot Classic Fusion Chronograph Titanium Blue 521.NX.7170.LR 45MM\r\n\r\nTên tuổi của Hublot ghi dấu ấn trong lòng giới thượng lưu qua độ chỉnh chu bậc nhất khi chế tác từng chiếc đồng hồ. Một trong những siêu phẩm của đồng hồ Hublot được quý khách hàng ưa chuộng nhất tại EU Luxury là chiếc Hublot Classic Fusion Chronograph Titanium Blue 45MM, mang mã hiệu 521.NX.7170.LR.',65),(3,'Đồng hồ Franck Muller V41 Gold Option Diamond','FranckMuller1.png','Vỏ bằng Titanium được hoàn thiện và đánh bóng bằng Satin dây đeo da, Chiếc đồng hồ là một thiết kế độc đáo của đồng hồ bấm giờ tự động Unico. Nó có thể dự trữ năng lượng lên tới 42 giờ.',195000000,'MỚI 100% FULLBOX SÁCH HỘP',4,'Khả năng chống thấm nước lên đến mức 50m hoặc 5 ATM','','Máy cơ, tự lên dây','Vàng hồng 18k','Dây đeo cao su bọc da cá sấu','Vàng hồng 18k','Sapphire với khả năng chống phản chiếu, chống trầy xước','Thụy Sĩ','Thiết kế của Đồng hồ Franck Muller V41 Gold Option Diamond','Bên trong đồng hồ Franck Muller V41 Gold Option Diamond','Đại lý cung cấp đồng hồ Franck Muller V41 Gold Option Diamond','Đồng hồ Franck Muller V41 Gold Option Diamond là kết tinh của vẻ đẹp cổ điển từ những vật liệu đắt đỏ bậc nhất thế giới. Phần vỏ đồng hồ được làm hoàn toàn bằng vàng hồng 18k, chất liệu tạo nên vẻ đẹp rực rỡ và đồ bền cao cho thiết bị. Mặt đồng hồ được làm từ đá sapphire nguyên chất cho một độ trong suốt tối đa và khả năng chống lóa hiệu quả. Chiếc đồng hồ mang dáng tonneau trứ danh của nhà Franck Muller có kích thước mặt to phù hợp với các quý ông.','Đồng hồ Franck Muller V41 Gold Option Diamond hoạt động trơn tru với bộ máy cơ tự động trữ năng lượng từ chuyển động tay. Khả năng chống nước lên đến 50 mét cho thấy sự tỉ mỉ trong chế tác của nhứng người thợ lành nghề Thụy Sĩ.','EU Luxury là đại lý cung cấp đồng hồ Franck Muller V41 Gold Option Diamond chính hãng tại Việt Nam. Quý khách mua hàng tại địa chỉ 117 Xã Đàn, Đống Đa, Hà Nội.\r\n\r\naHa LUXURY CHUYÊN CUNG CẤP – PHÂN PHỐI CÁC DÒNG ĐIỆN THOẠI VERTU, TRANG SỨC & ĐỒNG HỒ CHÍNH HÃNG NHẬP KHẨU TỪ CHÂU ÂU',24),(4,'Richard Mille RM 023 vàng hồng đính kim cương','Richard_Mille_RM_023.png','Vỏ bằng Titanium được hoàn thiện và đánh bóng bằng Satin dây đeo da, Chiếc đồng hồ là một thiết kế độc đáo của đồng hồ bấm giờ tự động Unico. Nó có thể dự trữ năng lượng lên tới 42 giờ.',195000000,'TÌNH TRẠNG : FULLBOX',3,'Khả năng chống thấm nước lên đến mức 50m hoặc 5 ATM','','Máy cơ, tự lên dây','Vàng hồng 18k','Dây da','Vàng hồng 18k','','Thụy Sĩ','','','','','','',66),(6,'Đồng Hồ Hublot Classic Fusion Automatic King Gold 42 mm','Hublot3.png','Một trong những siêu phẩm được giới yêu đồng hồ săn đón gọi tên chiếc Hublot Classic Fusion Automatic King Gold 42mm với mã hiệu 542.OX.7180.LR. Tại sao chiếc đồng hồ này lại thu hút bất cứ ai nhìn thấy nó ngay lần đầu? Cùng EU Luxury giải đáp nhé.',338000000,'TÌNH TRẠNG : MỚI 100% FULLBOX SÁCH HỘP',2,'Chống thấm nước mức 50m hoặc 5 ATM','Bộ vàng 18K được đánh bóng và hoàn thiện bằng satin với 6 ốc vít hình chữ H','Máy cơ, tự lên dây HUB1110 dự trữ năng lượng 42 giờ','Vàng hồng 18k nguyên khối được đánh bóng và hoàn thiện bằng Satin','Dây đeo cao su màu xanh và da cá sấu','Khóa clasp vàng 18K 5N và thép không gỉ mạ đen','Sapphire với khả năng chống phản chiếu','Nhà máy đồng hồ Thụy Sĩ','Thiết kế của đồng hồ Hublot Classic Fusion Automatic King Gold','Bên trong Hublot Classic Fusion Automatic King Gold','Mặt kính của Hublot Classic Fusion Automatic King Gold','Hublot Classic Fusion Automatic King Gold mang một vẻ bề ngoài tinh tế, sang trọng bắt mắt. Chiếc đồng hồ toát lên chất tối giản thượng lưu đã làm nên thương hiệu Classic Fusion của nhà Hublot. Mặt đồng hồ làm từ kính sapphire trong vắt với khả năng chống phản quang hoàn hảo và độ bền cực lớn. Phần vành đồng hồ được thiết kế từ vàng hồng 18k nguyên khối, được đánh bóng tỉ mỉ bằng Satin. Bên trên phần vành là 6 chiếc đinh vít được cách điệu theo chữ H trứ danh của nhà Hublot, tạo ra độ tương thích tuyệt đối giữa mặt đồng hồ và càng nối dây.','Đồng hồ Hublot Classic Fusion Automatic King Gold không thể hoạt động bền bỉ và chính xác nếu thiếu đi bộ máy tự động HUB1110. Khả năng chống thấm nước mức 50m, cùng với thời lượng cót 42 giờ khẳng định độ tinh xảo tối đa trong khâu lắp đặt thủ công của các người thợ lành nghệ Thụy Sĩ.','Khu vực mặt số màu đen là điểm nhấn trọn vẹn cho một thiết kế tinh tế, chỉnh chu của Hublot Classic Fusion Automatic King Gold. Bộ kim dày dặn, đơn nét cùng các mốc thời gian được hoàn thiện tinh xảo bằng vàng hồng cho thấy một tư duy thẩm mĩ không tầm thường đến từ Hublot. Ở góc 3 giờ, nhà sản xuất đã đặt thêm một cửa sổ chỉ ngày làm giảm bớt độ trống trải của mặt đồng hồ kích thước 42mm. Hướng ',55),(7,'Đồng Hồ Hublot Classic Fusion Titanium Diamonds 42mm','Hublot4.png','                                                         Vỏ bằng Titanium gắn 138 viên Kim cương 1.01cts dây đep bằng da                                                                       ',170000000,'TÌNH TRẠNG : MỚI 100% FULLBOX SÁCH HỘP',2,'THÔNG SỐ KỸ THUẬTDòng sản phẩmClassic FusionThấm nướcKhả năng chống thấm nước lên đến mức 50m hoặc 5 ATM','Bằng Titanium được đánh bóng gắn với 138 viên kim cương 1,01cts với 6 ốc vít hình chữ H','Máy cơ, tự lên dây HUB1110 dữ trự năng lương 42 giờ','Vỏ bằng Titanium được hoàn thiện và đánh bóng gắn 138 viên Kim cương 1.01cts','Cao su đen và dây da cá sấu','Khóa clasp bằng thép không gỉ','Sapphire với khả năng chống phản chiếu','Nhà máy đồng hồ Thụy S','Thiết kế của đồng hồ Hublot Classic Fusion Titanium Diamonds','Bên trong đồng hồ Hublot Classic Fusion Titanium Diamonds','Đại lý đồng hồ Hublot Classic Fusion Titanium Diamonds','Bề mặt của đồng hồ Hublot Classic Fusion Titanium Diamonds được làm từ tinh thế sapphire nguyên khối được chế tác tỉ mỉ. Chất liệu sapphire không những là minh chứng cho sự sang trọng bậc nhất của mỗi chiếc Hublot, chúng còn mang đến cho chiếc đồng hồ khả năng quang học hoàn hảo nhất.\r\n\r\nTối giản nhưng xa hoa là những gì ta thấy ở đồng hồ Hublot Classic Fusion Titanium Diamonds. Sở hữu cho mình phần vỏ được làm từ chất liệu titanium, chiếc đồng hồ đảm bảo một khả năng chống va đập hiệu quả cùng giá trị thẩm mỹ cao. Bên trên phần vành là 6 chiếc đinh vít được cách điệu theo chữ H trong “Hublot”. Đây là điểm nhấn đặc trưng của dòng sản phẩm Classic Fusion, tạo cho thiết kế mang một sự ổn định cao khi bắt cặp cùng phần càng nối dây. Riêng với phiên bản này, điểm nhấn đáng gờm không chỉ dừng lại ở đó.','Đồng hồ Hublot Classic Fusion Titanium Diamonds có thể hoạt động chính xác nhờ bộ máy tự động HUB1110. Chế tác thủ công bằng tay hoàn hảo cho một khả năng chống nước tuyệt vời, đạt mức 50m chiều sâu. Thời lượng cót 42 giờ đồng hồ minh chứng cho độ chỉnh chu từ công nghệ làm đồng hồ cơ tiên tiến bật nhất của Hublot.','aHa Luxury là đại lý cung cấp đồng hồ Hublot Classic Fusion Titanium Diamonds chính hãng tại Việt Nam. Quý khách mua hàng tại địa chỉ 117 Xã Đàn, Đống Đa, Hà Nội. Để biết thêm các thông tin chi tiết về sản phẩm và dịch vụ, truy cập website https://aHaluxury.vn/. Qúy khách cũng có thể xem thêm các loại ĐỒNG HỒ FRANCK MULLER tại aHa Luxury',4423),(8,'Đồng Hồ Rolex Oyster Perpetual Day-Date 36mm 128235-0029 dây đeo President','Rolex2.png','Thép không gỉ kết hợp vàng hồng 18k',459000000,'TÌNH TRẠNG : MỚI 100% FULL SET',1,'100m (10ATM)','Vàng Everose 18K','70h','Thép không gỉ 904L','Dây đeo Jubilee','Khóa gấp Oysterclasp','Sapphire','Thụy Sĩ','Thiết kế dây đeo JUBILEE đem đến sự chắc chắn, thoải mái','Mặt đồng hồ có 1-0-2','Bộ chuyển động thế hệ mới','Dây đeo của đồng hồ được sản xuất với thiết kế bản quyền của Rolex đó là dây đeo JUBILEE. Đặc trưng của kiểu dây đeo này gồm 5 mảnh kim loại bằng vàng và thép hình bán nguyệt kết nối với nhau, gồm 2 màu sắc là màu rose gold và màu kim loại đặc trưng vừa đảm bảo tính thẩm mỹ, vừa đem lại độ chắc chắn cao.Đặc biệt, phần khóa là khóa gập giúp thao tác đeo đồng hồ trở nên đơn giản, tiết kiệm thời gian hơn. Chính bởi những ưu điểm này mà mẫu dây này đã được Rolex sử dụng từ những năm 1945 cho đến tận ngày nay.\r\n\r\nKích thước dây đeo của chiếc đồng hồ này là 41mm. Đây là kích thước phù hợp với hầu hết size cổ tay của các quý ông.','Mặt đồng hồ được làm bằng đá xà cừ có sẵn trong tự nhiên. Điểm đặc biệt của loại đá này là khi có ánh sáng chiếu vào sẽ phản chiếu đa sắc, đặc biệt, mỗi viên đá xà cừ sẽ phản chiếu những màu sắc khác nhau nên bạn sẽ không thể tìm được 2 chiếc đồng hồ có cùng m màu sắc trên bề mặt.\r\n\r\nCác cọc số là những viên kim cương tự nhiên. Tại vị trí cọc số 3 là kính Cyclops phóng đại. Hình ảnh được biểu thị qua ống kính này lớn hơn bình thường 2 lần rưỡi và hiển thị lịch ngày giúp bạn dễ dàng đọc lịch.\r\n\r\nNgoài ra, như mọi thiết kế đồng hồ Rolex khác, trên mặt của sản phẩm này cũng không thể thiếu các thông tin bao gồm tên thương hiệu, Oyster Perpetual chứng tỏ khả năng chống nước lên tới 100m và tên dòng sản phẩm là Datejust.','Phiên bản đồng hồ Rolex Datejust này được trang bị bộ chuyển động thế hệ mới nhà Rolex, mang tên calibre 3235. Bộ chuyển động này đảm bảo hiệu năng bền bỉ cho đồng hồ, đồng thời đảm bảo độ chính xác gấp 2 lần những chiếc đồng hồ thông thường và đạt chứng nhận chronometer - chứng nhận đồng hồ có độ chính xác cao.\r\n\r\nTrên đây là những thông tin về sản phẩm Đồng Hồ Rolex Datejust 41mm 126331 Phiên bản mặt số đá xà cừ trắng nạm kim cương dây Jubilee. Nếu quý khách muốn tham khảo thêm những mẫu đồng hồ Rolex cao cấp khác, hãy ghé thăm trang web của EU Luxury nhé.',5324),(9,'Đồng Hồ Rolex Datejust 126234 Mặt Vi tính Xanh Navy','Rolex3.png','Rolesor trắng - hỗn hợp thép Oystersteel và vàng trắng 18 ct',285000000,'TÌNH TRẠNG : FULLSET MỚI 100%',1,'Khả năng chống thấm nước lên đến mức 100m/330 feet','Roselor trắng - hỗn hợp thép 904L và vàng trắng 18 ct','Tự lên dây cót 2 chiều qua Perpetual rotor','Rolesor trắng - hỗn hợp thép Oystersteel và vàng trắng 18 ct','Jubilee, mối nối 5 mảnh bằng thép Oystersteel','Khóa gập Oysterclasp với mối nối phụ tiện dụng 5 mm Easylink','Saphire chống trầy sước với ống kính cyclops trên hiển thị số ngày','Thụy Sĩ','Đồng hồ Oyster Perpetual Datejust 36 bằng Oystersteel và vàng trắng đi kèm mặt số màu xanh sáng, nạm kim cương và dây đeo Jubilee','MẶT ĐỒNG HỒ MÀU XANH SÁNG LỊCH LÃM','ỐNG KÍNH CYLOPS - ỐNG KÍNH PHÓNG ĐẠI','Mặt số đi kèm bộ vàng 18 ct nạm kim cương.Về phương diện thẩm mỹ, phiên bản Datejust đã tồn tại qua nhiều thời đại, trong khi giữ lại những quy tắc cấu thành sản phẩm, đặc biệt với các phiên bản truyền thống, một trong những yếu tố biểu tượng và dễ nhận diện của đồng hồ.','Cả chiếc đồng hồ Rolex Dateujust hiện lên với tông màu bạc của vỏ khung, dây đeo, cọc chỉ giờ kim cương, bộ kim, chỉ riêng mặt số có màu xanh sáng bắt mắt, biểu tượng cho sự nam tính, lịch lãm của phái mạnh. Ngoài ra, những họa tiết Jubilee trên mặt số, những chữ Rolex được xếp ngang và xếp xen kẽ tạo hiệu ứng nổi bật và bắt mắt. Các phần cọc số được làm bằng kim cương trừ góc 3h và góc 12h là vương miện - logo của Rolex kết hợp với bộ kim sáng bóng.','Ống kính Cyclops là một trong những đặc điểm nổi bật nhất của chiếc đồng hồ Rolex, và một trong những tính năng dễ nhận biết nhất. Được đặt tên theo người khổng lồ một mắt của thần thoại Hy Lạp, ống kính Cyclops phóng đại ngày biểu tượng của đồng hồ hiển thị hai lần rưỡi cho việc đọc dễ dàng hơn. Đằng sau Cyclops, giống như mọi tính năng của chiếc đồng hồ Rolex, đều nằm trong lịch sử phát minh, nghiên cứu và phát triển, đều tìm kiếm đến sự hoàn hảo vô tận.',524),(10,'Đồng Hồ Rolex Datejust 126234 Mặt Xanh Navy','Rolex4.png','Đồng Hồ Rolex Datejust 126234 Mặt Xanh Navytiếp nối sau thành công vang dội của bộ sưu tập Datejust. Hãng Rolex tiếp tục giới thiệu mẫu đồng hồ với nhiều lựa chọn mới cho người yêu thích đồng hồ trên toàn thế giới trong năm nay.',265000000,'TÌNH TRẠNG : MỚI 100 % FULL SET',1,'Khả năng chống thấm nước lên đến mức 50m hoặc 5 ATM','Rãnh, Roselor trắng - hỗn hợp thép 904L và vàng trắng 18 ct','Máy cơ, tự lên dây','Stainless Steel','Stainless Steel','Khóa gập Oysterclasp với mối nối phụ tiện dụng 5mm Easylink','Sapphire với khả năng chống phản chiếu, chống trầy xước','Thụy Sĩ','Đồng Hồ Rolex Datejust 126234 Mặt Xanh Navy có gì nổi bật?','Ở đâu bán Đồng Hồ Rolex Datejust 126234 Mặt Xanh Navy giá tốt chính hãng?','','Đồng hồ  Rolex DateJust 126234 Blue Navy nằm trên cùng một kệ với mẫu đồng hồ mới được ra mắt tại Baselworld 2019 là Rolex Datejust 36mm 126234-0037. Mẫu thiết kế này có vỏ Oyster và vòng đeo tay 5 mỗi Jubilee được tiếp nối truyền thống năm 1945. Hơn nữa, mẫu đồng hồ có chất liệu thép 904L và sử dụng công nghệ sản xuất độc đáo, mang lại khả năng giữ độ sáng bóng và chống ăn mòn cao. Đặc biệt, bộ dây đeo Jubilee này đã chinh phục được rất nhiều khách hàng về mặt thẩm mỹ tuyệt vời.','ậy có thể mua đồng hồ Rolex DateJust 126234 Blue Navy chính hãng ở đâu với giá cả phải chăng? Câu trả lời đó là EU Luxury. Chúng tôi cung cấp các sản phẩm đồng hồ chính hãng Rolex đảm bảo chất lượng, uy tín. \r\n\r\nTất cả đồng hồ Rolex bán ra đều có giấy đảm bảo chất lượng sản phẩm sau khi được kiểm tra sản phẩm. Chúng tôi cam kết hàng chính hãng và nguyên bản 100% từ nhà sản xuất.\r\n\r\nHãy sở hữu một chiếc Rolex DateJust 126234 với mức giá tuyệt vời ngay tại EU Luxury. Hoặc bạn có thể ghé thăm website của chúng tôi để xem thêm nhiều mẫu điện thoại Vertu đẳng cấp.','',434),(11,'Đồng Hồ Franck Muller V41 Yachting','FranckMuller2.png','                                        Đồng Hồ Franck Muller Vanguard Yachting V41 là chiếc đồng hồ đậm chất hàng hải, được chế tác bởi nhà sản xuất đồng hồ nổi tiếng Franck Muller tại Thụy Sĩ. Với phần vành đồng hồ đính kim cương tự nhiên tuyệt đẹp, Đồng Hồ Franck Muller Vanguard Yachting V41 được giới thượng lưu săn đón gắt gao trong thời gian gần đây.                                                ',179000000,'TÌNH TRẠNG : FULLSET MỚI 100%',4,'Khả năng chống thấm nước lên đến mức 50m hoặc 5 ATM','','Máy cơ, tự lên dây','Stainless Steel','Dây đeo cao su bọc da cá sấu','','Sapphire với khả năng chống phản chiếu, chống trầy xước','Thụy Sĩ','Thiết kế của Đồng Hồ Franck Muller V41','Bên trong Đồng Hồ Franck Muller Vanguard Yachting V41','Đại lý cung cấp Đồng Hồ Franck Muller Vanguard Yachting V41','Đồng Hồ Franck Muller Vanguard Yachting V41 được chế tác tuyệt đẹp, gợi ta nhớ đến những hình ảnh về ngành hàng hải. Nhìn tổng thể, chiếc đồng hổ phủ một màu xanh biển bí ẩn như mặt đại dương. Cùng những chi tiết đắt giá được tạo ra từ kim cương, sản phẩm tạo ra một độ cân bằng màu sắc hoàn hảo.\r\n\r\nĐồng Hồ Franck Muller Vanguard Yachting V41 có phần vỏ làm từ chất liệu Stainless Steel đảm bảo một độ bền hoàn hảo. Phần vành đồng hồ được nạm hoàn toàn bởi vô số viên kim cương tự nhiên. Đây là chi tiết mang đến mức giá đắt đỏ của Đồng Hồ Franck Muller Vanguard Yachting V41, tạo cho người sở hữu chúng cảm giác sang trọng, xa hoa bậc nhất.','Đồng Hồ Franck Muller Vanguard Yachting V41 hoạt động trơn tru với bộ máy cơ tự động trữ năng lượng từ chuyển động tay. Khả năng chống nước lên đến 50 mét cho thấy sự tỉ mỉ trong chế tác của nhứng người thợ lành nghề Thụy Sĩ.','EU Luxury là đại lý cung cấp đồng hồ Franck Muller Vanguard Yachting V41 chính hãng tại Việt Nam. Quý khách mua hàng tại địa chỉ 117 Xã Đàn, Đống Đa, Hà Nội.',785),(12,'Đồng hồ Franck Muller V41 mới 100% Full Diamond','FranckMuller3.png','                        Đồng hồ Franck Muller V41 Full Diamond là chiếc đồng hồ siêu sang mà nhà Franck Muller sản xuất dành tặng các quý ông lịch lãm. Với một thiết kế tối giản cùng những cọc số được chế tác theo lối kiến trúc Art Deco mạnh mẽ, sắc xảo, sản phẩm này xứng đáng là người bạn đồng hành đáng tin cậy cho mọi quý ông.                        ',165000000,'TÌNH TRẠNG : FULLSET MỚI 100%',4,'Khả năng chống thấm nước lên đến mức 50m hoặc 5 ATM','','Máy cơ, tự lên dây','Stainless Steel','Dây da cá sấu','','Sapphire với khả năng chống phản chiếu, chống trầy xước','Thụy Sĩ','Thiết kế của đồng hồ Franck Muller V41 Full Diamond','Bên trong đồng hồ Franck Muller V41 Full Diamond','Đại lý cung cấp Franck Muller V41 Full Diamond','Đồng hồ Franck Muller V41 Full Diamond nổi bật với vành đồng hồ làm từ chất liệu thép không rỉ chất lượng, tạo ra một vẻ ngoài mạnh mẽ sang trọng cho mỗi quý ông. Điểm nhấn của phần vành đồng hồ nằm ở việc toàn bộ bề mặt của nó được đính kim cương tự nhiên. Hiệu ứng ánh sáng từ kim cương khiến cho chiếc đồng hồ có một sức hấp dẫn khó cưỡng với bất cứ ai nhìn vào nó.','Đồng hồ Franck Muller V41 Full Diamond hoạt động trơn tru nhờ bộ máy cơ tiên tiến với khả năng tự lên cót qua chuyển động cổ tay. Chống nước 50m chứng tỏ độ hoàn thiện tuyệt đối của nhà sản xuất với đứa con tinh thần danh giá này.','aHa Luxury là đại lý cung cấp đồng hồ Franck Muller V41 Full Diamond chính hãng tại Việt Nam. Quý khách mua hàng tại địa chỉ 117 Xã Đàn, Đống Đa, Hà Nội.',68),(13,'Đồng Hồ Franck Muller Vanguard Lady V32','FranckMuller4.png','                                Thép không gỉ tone màu bạc đính kim cương                                                ',135000000,'TÌNH TRẠNG : MỚI 100% FULLBOX SÁCH HỘP',4,'Chống thấm nước : Khả năng chống thấm nước lên đến mức 50m hoặc 5 ATM','Vành đồng hồ : Đính kim cương thiên nhiên','Năng lượng : Máy cơ,hoặc pin tự lên dây','Chất liệu vỏ: thép không gỉ,đính kim cương thiên nhiên','Dây đeo : Dây đeo cao su bọc da cá sấu','Khóa : khóa clasp bằng thép không gỉ','Mặt kính : Sapphire với khả năng chống phản chiếu, chống trầy xước','Thụy Sĩ','','','','','','',456),(14,'Richard Mille RM 011 Felipe Massa Flyback Chronograph Titanium','RichardMille2.png','                                                ',135000000,'',3,'Khả năng chống thấm nước lên đến mức 50m hoặc 5 ATM','','Máy cơ, tự lên dây','Titanium','Dây đeo cao su','','Sapphire với khả năng chống phản chiếu, chống trầy xước','Thụy Sĩ','','','','','','',635),(15,'Richard Mille RM35-02 Automatic Winding Rafael Nadal','RichardMille3.png','                                                ',135000000,'',3,'Khả năng chống thấm nước lên đến mức 50m hoặc 5 ATM','','','Carbon','Dây đeo cao su','Carbon','Sapphire với khả năng chống phản chiếu, chống trầy xước','Thụy Sĩ','','','','','','',5242),(16,'Richard Mille RM 011 Automatic Flyback Chronograph Felipe Massa Vàng Hồng Titanium','RichardMille4.png','                                                ',135000000,'',3,'Khả năng chống thấm nước lên đến mức 50m hoặc 5 ATM','','Máy cơ, tự lên dây','Vàng hồng 18k','Dây đeo cao su','','Sapphire với khả năng chống phản chiếu, chống trầy xước','Thụy Sĩ','','','','','','',424),(28,'Đồng Hồ Hublot Classic Fusion Chronograph Titanium Automatic Black Dial Men Watch','Hublot2.png','                                                                                                                       Đồng hồ Hublot Classic Fusion Chronograph Titanium Automatic Black Dial - gã quái vật mang số hiệu 541.NX.1171.LR là chiếc đồng hồ dành cho nam có độ cân bằng tuyệt đối giữa chức năng và phong cách. Cùng EU Luxury tìm hiểu về những bí mật ẩn giấu sau ngoại hình tuyệt đẹp của gã ta.                                                                                                   ',195000000,'TÌNH TRẠNG : MỚI 100% FULLBOX SÁCH HỘP',2,'Chống thấm nước mức 50m hoặc 5 ATM','Vành Bezel bằng thép không gỉ','Máy cơ, tự lên dây','Stainless Steel','Dây đeo cao su bọc da cá sấu','khóa clasp bằng thép không gỉ','Mặt kính được từ một mảnh tinh thể sapphire','Thụy Sĩ','Thiết kế của đồng hồ Hublot Classic Fusion Chronograph Titanium Automatic Black Dial','Bên trong đồng hồ Hublot Classic Fusion Chronograph Titanium Automatic Black Dial','Đại lý cung cấp đồng hồ Hublot Classic Fusion Chronograph Titanium Automatic Black Dial','Hublot Classic Fusion Chronograph Titanium Automatic Black Dial chắc chắn sẽ thu hút sự chú ý của các quý ông lịch lãm với hệ thống mặt số phụ tạo nên một thiết kế cực kì khoa học. Phần vỏ của sản phẩm được làm từ hợp kim Stainless Steel với độ cứng cao, đảm bảo chống lại mọi va đập cỡ vừa ảnh hưởng tới phần cứng. Chất liệu này cũng khiến cho sản phẩm mang một ngoại hình sáng bóng, cứng rắn và năng động đặc trưng của phái mạnh. 6 chiếc đinh vít trứ danh của dòng Classic Fusion là điểm kết nối hoàn hảo giữa bề mặt đồng hồ và càng nối dây.','Hublot Classic Fusion Chronograph Titanium Automatic Black Dial ghi dấu ấn với công chúng thế giới bởi công nghệ máy cơ tinh xảo, tiên tiến được chế tác thủ công hoàn toàn. Thời lượng cót lên đến 42 giờ đồng hồ cùng với khả năng chống nước tới 50m cho thấy độ tỉ mỉ từ bàn tay những người thợ đồng hồ Thụy Sĩ.','aHa Luxury là đại lý cung cấp đồng hồ Hublot Classic Fusion Chronograph Titanium Automatic Black Dial chính hãng tại Việt Nam. Quý khách mua hàng tại địa chỉ 117 Xã Đàn, Đống Đa, Hà Nội. Để biết thêm các thông tin chi tiết về sản phẩm và dịch vụ, truy cập website https://ahaluxury.vn/. Qúy khách cũng có thể xem thêm các loại ĐỒNG HỒ FRANCK MULLER tại EU Luxury',554),(29,'Đồng hồ Patek Philippe Complications 5396R-014 Annual Calendar & Moonphase','Patek_Philippe_Complications_5396R-014_Annual_Calendar_&_Moonphase.png','                                                                                        ',1110000000,'',5,'','','','','','','','','','','','','','',43234),(30,'Đồng Hồ Rolex 18238 Day Date President cọc kim cương vàng khối 18k','dong-ho-rolex-18238-day-date-president-coc-kim-cuong-vang-khoi-18k.png','                                                                                                                                ',370000000,'',1,'','','','','','','','','','','','','','',4242),(47,'Đồng Hồ Rolex 126334 Datejust 41mm White Gold Steel Black Diamond Dial Fluted Bezel Jubilee','Rolex_126334_Datejust_41mm_White_Gold_Steel_Black_Diamond_Dial_Fluted_Bezel_Jubilee.png','                                                                                        ',305000000,'TÌNH TRẠNG : MỚI 100 % FULL SET',1,'Khả năng chống thấm nước lên đến mức 100m/330 feet','Rãnh, Roselor trắng - hỗn hợp thép 904L và vàng trắng 18 ct','Perpetual, máy cơ, tự lên dây','Oyster, 41 mm, thép và vàng trắng','Jubilee, mối nối 5 mảnh','Khóa gập Oysterclasp với mối nối phụ tiện dụng 5mm Easylink','Ngọc bích chống trầy xước , ống kính cyclops trên hiển thị số ngày','Thụy Sĩ','','','','','','',42424),(48,'Đồng Hồ Hublot Classic Fusion Titanium Full Pave 42mm 542.nx.9010.lr.1704','dong-ho-hublot-classic-fusion-titanium-full-pave-42mm.png','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut possimus eum est, dolorum magnam qui ratione at neque architecto vitae placeat facilis corporis optio quo mollitia repellat quibusdam unde alias!',195000000,'',2,'','','','','','','','','','','','','','',436);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sizesanpham`
--

DROP TABLE IF EXISTS `sizesanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sizesanpham` (
  `id_size` int NOT NULL AUTO_INCREMENT,
  `size` int DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `id_sanpham` int NOT NULL,
  PRIMARY KEY (`id_size`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sizesanpham`
--

LOCK TABLES `sizesanpham` WRITE;
/*!40000 ALTER TABLE `sizesanpham` DISABLE KEYS */;
INSERT INTO `sizesanpham` VALUES (1,41,55,1),(4,13,5,38),(8,42,55,1),(10,41,3123,40),(12,40,12,42),(16,42,12,15),(17,44,32,13),(19,42,44,30),(20,42,44,13),(21,43,33,29),(22,42,22,28),(23,42,11,16),(24,43,22,14),(25,42,22,12),(26,43,23,2),(27,42,24,11);
/*!40000 ALTER TABLE `sizesanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thongsokithuat`
--

DROP TABLE IF EXISTS `thongsokithuat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thongsokithuat` (
  `id_tskt_sp` int NOT NULL AUTO_INCREMENT,
  `dongsanpham` varchar(45) DEFAULT NULL,
  `thamnuoc` varchar(255) DEFAULT NULL,
  `kichthuocmat` varchar(255) DEFAULT NULL,
  `vanhdongho` varchar(255) DEFAULT NULL,
  `nangluong` varchar(255) DEFAULT NULL,
  `chatlieuvo` varchar(255) DEFAULT NULL,
  `daydeo` varchar(255) DEFAULT NULL,
  `khoa` varchar(145) DEFAULT NULL,
  `matkinh` varchar(145) DEFAULT NULL,
  `sanxuattai` varchar(255) DEFAULT NULL,
  `id_sanpham` int NOT NULL,
  PRIMARY KEY (`id_tskt_sp`,`id_sanpham`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thongsokithuat`
--

LOCK TABLES `thongsokithuat` WRITE;
/*!40000 ALTER TABLE `thongsokithuat` DISABLE KEYS */;
INSERT INTO `thongsokithuat` VALUES (1,'Classic Fusion','Chống thấm nước mức 50m hoặc 5 ATM','45mm','Titanium được hoàn thiện và đánh bóng bằng Satin với 6 ốc vít hình chữ H','Máy cơ, tự lên dây HUB1143 Self-winding Chronograph Movement dự trữ năng lượng 42 giờ','Vỏ bằng Titanium được hoàn thiện và đánh bóng bằng Satin','Dây đeo cao su màu xanh và da cá sấu','Khóa clasp bằng thép không gỉ','Sapphire với khả năng chống phản chiếu','Nhà máy đồng hồ Thụy Sĩ',1);
/*!40000 ALTER TABLE `thongsokithuat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thongtin_website_chitietsanpham`
--

DROP TABLE IF EXISTS `thongtin_website_chitietsanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thongtin_website_chitietsanpham` (
  `id` int NOT NULL AUTO_INCREMENT,
  `camket` text,
  `diachi` text,
  `hotline` text,
  `baohanh` text,
  `vanchuyen` text,
  `description` text,
  `email` text,
  `ten_website` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thongtin_website_chitietsanpham`
--

LOCK TABLES `thongtin_website_chitietsanpham` WRITE;
/*!40000 ALTER TABLE `thongtin_website_chitietsanpham` DISABLE KEYS */;
INSERT INTO `thongtin_website_chitietsanpham` VALUES (1,'Cam kết tất cả các sản phẩm bán ra là Chính hãng 100% <br> Bảo hành từ 2 đến 5 năm theo đúng tiêu chuẩn của hãng <br>Tặng gói Spa miễn phí 2 năm trị giá 3.000.000 đồng <br>Giao hàng toàn quốc,hỗ trợ 24/7 về chất lượng sản phẩm <br> Giá trên website chỉ mang tính tham khảo,có thể thay đổi theo thời điểm để có giá tốt nhất quý khách vui lòng LH qua Hotline','Số 213 Xuân Phương - Phương Canh - Nam Từ Liêm - Tp.Hà Nội','0369.037.600','Chính hãng toàn quốc <br>1 đổi 1 trong 10 ngày nếu có lỗi nhà sản xuất','Miễn phí vận chuyển toàn quốc, giao nhanh trong nội thành Hà Nội & Tp.HCM','CHUYÊN CUNG CẤP – PHÂN PHỐI CÁC DÒNG ĐỒNG HỒ CHÍNH HÃNG NHẬP KHẨU TỪ CHÂU ÂU','hdao4959@gmail.com','aHa Luxury Official');
/*!40000 ALTER TABLE `thongtin_website_chitietsanpham` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-07 23:00:18
