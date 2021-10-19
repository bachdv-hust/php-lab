CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `products` (`id_product`, `name`, `description`, `price`) VALUES
(1, 'Product 1', 'Some random description', '15.00'),
(2, 'Product 2', 'Some random description', '20.00'),
(3, 'Product 3', 'Some random description', '50.00'),
(4, 'Product 4', 'Some random description', '55.00'),
(5, 'Product 5', 'Some random description', '54.00'),
(6, 'Product 6', 'Some random description', '34.00');