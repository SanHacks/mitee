
CREATE TABLE IF NOT EXISTS `generatedPhotos` (
                                             `id` int(11) NOT NULL AUTO_INCREMENT,
                                             `anytext` longtext DEFAULT NULL,
                                             `image_src` varchar(300) DEFAULT NULL,
                                             `rid` int(10) DEFAULT NULL,
                                             `user` int(10) DEFAULT NULL,
                                             `phoneNumber` varchar(100) DEFAULT NULL,
                                             `scheduled_time` int(20) DEFAULT NULL,
                                             `status` varchar(100) DEFAULT 0,
                                             `about` varchar(100) DEFAULT NULL,
                                             `prompt` varchar(500) DEFAULT NULL,
                                             `account_id` int(100) DEFAULT NULL,
                                             `timestamp` int(20) DEFAULT NULL,
                                             PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `imageSearches` (
                                             `id` int(11) NOT NULL AUTO_INCREMENT,
                                             `anytext` longtext DEFAULT NULL,
                                             `image_src` varchar(300) DEFAULT NULL,
                                             `rid` int(10) DEFAULT NULL,
                                             `user` int(10) DEFAULT NULL,
                                             `phoneNumber` varchar(100) DEFAULT NULL,
                                             `scheduled_time` int(20) DEFAULT NULL,
                                             `status` varchar(100) DEFAULT 0,
                                             `about` varchar(100) DEFAULT NULL,
                                             `prompt` varchar(500) DEFAULT NULL,
                                             `account_id` int(100) DEFAULT NULL,
                                             `timestamp` int(20) DEFAULT NULL,
                                             PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#Products Table
CREATE TABLE IF NOT EXISTS `products` (
                                        `id` int(11) NOT NULL AUTO_INCREMENT,
                                        `name` varchar(100) DEFAULT NULL,
                                        `description` varchar(100) DEFAULT NULL,
                                        `price` varchar(100) DEFAULT NULL,
                                        `image` varchar(100) DEFAULT NULL,
                                        `timestamp` int(20) DEFAULT NULL,
                                      `status` varchar(100) DEFAULT 0,
                                    `sku` varchar(100) DEFAULT NULL,
                                    `category` varchar(100) DEFAULT NULL,
                                    `stock` varchar(100) DEFAULT NULL,
                                    `weight` varchar(100) DEFAULT NULL,
                                    `height` varchar(100) DEFAULT NULL,
                                    `width` varchar(100) DEFAULT NULL,
                                    `length` varchar(100) DEFAULT NULL,
                                    `shipping` varchar(100) DEFAULT NULL,
                                    `tax` varchar(100) DEFAULT NULL,
                                    `discount` varchar(100) DEFAULT NULL,
                                    `discount_type` varchar(100) DEFAULT NULL,
                                    `discount_start` varchar(100) DEFAULT NULL,
                                    `discount_end` varchar(100) DEFAULT NULL,
                                    `discount_status` varchar(100) DEFAULT NULL,
                                    `discount_code` varchar(100) DEFAULT NULL,
                                    `discount_code_status` varchar(100) DEFAULT NULL,
                                    `discount_code_start` varchar(100) DEFAULT NULL,
                                    `discount_code_end` varchar(100) DEFAULT NULL,
                                    `discount_code_type` varchar(100) DEFAULT NULL,
                                    `discount_code_amount` varchar(100) DEFAULT NULL,
                                    `discount_code_limit` varchar(100) DEFAULT NULL,

                                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#Product Categories Table

CREATE TABLE IF NOT EXISTS `product_categories` (
                                        `id` int(11) NOT NULL AUTO_INCREMENT,
                                        `name` varchar(100) DEFAULT NULL,
                                        `description` varchar(100) DEFAULT NULL,
                                        `image` varchar(100) DEFAULT NULL,
                                        `timestamp` int(20) DEFAULT NULL,
                                      `status` varchar(100) DEFAULT 0,
                                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#Product Orders Table

CREATE TABLE IF NOT EXISTS `product_orders` (
                                        `id` int(11) NOT NULL AUTO_INCREMENT,
                                        `user` int(100) DEFAULT NULL,
                                        `product` int(100) DEFAULT NULL,
                                        `quantity` int(100) DEFAULT NULL,
                                        `price` varchar(100) DEFAULT NULL,
                                        `timestamp` int(20) DEFAULT NULL,
                                      `status` varchar(100) DEFAULT 0,
                                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#Product Order Details Table

CREATE TABLE IF NOT EXISTS `product_order_details` (
                                        `id` int(11) NOT NULL AUTO_INCREMENT,
                                        `user` int(100) DEFAULT NULL,
                                        `product` int(100) DEFAULT NULL,
                                        `quantity` int(100) DEFAULT NULL,
                                        `price` varchar(100) DEFAULT NULL,
                                        `timestamp` int(20) DEFAULT NULL,
                                      `status` varchar(100) DEFAULT 0,
                                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


