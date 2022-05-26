CREATE TABLE Customer
(  
  CustomerID INT AUTO_INCREMENT NOT NULL PRIMARY KEY
  , Username VARCHAR(50) 
  , UserPassword VARCHAR(50) 
  , LastName VARCHAR(50) NOT NULL
  , FirstName VARCHAR(50) NOT NULL
  , MiddleName VARCHAR(50) 
  , Email VARCHAR(30) 
  , ContactNumber VARCHAR(11) 
  , Addresss VARCHAR(30) 
  , Barangay VARCHAR(50) 
  , CityMun VARCHAR(50) 
  , Province VARCHAR(50) 
  , Country VARCHAR(50) 
);
CREATE TABLE Category
(
	 CategoryID INT AUTO_INCREMENT
		PRIMARY KEY
	,CategoryName VARCHAR(30) UNIQUE NOT NULL
);
CREATE TABLE Product 
(
	ProductID INT AUTO_INCREMENT NOT NULL PRIMARY KEY
	, CategoryID INT NOT NULL 
	, `Names` VARCHAR(30) NOT NULL
	, Price DOUBLE NOT NULL
	, Descriptions VARCHAR(65535)
	, Packet_content INT
	, Images longblob
	, CONSTRAINT FK_Product_Category FOREIGN KEY(CategoryID)	
    	REFERENCES Category (CategoryID) 
);
CREATE TABLE Orders(	
	  OrderID INT AUTO_INCREMENT NOT NULL
	, CustomerID INT NOT NULL
#	, TotalAmount MONEY (gagawing view)
	, OrderDate DATE
	, ShippingDate DATE
	, PaymentOption VARCHAR(50)
	, CONSTRAINT PK_Orders PRIMARY KEY (OrderID)
	, CONSTRAINT FK_Orders_Customer FOREIGN KEY(CustomerID) 
		REFERENCES Customer(CustomerID)
/*	, CONSTRAINT "CK_Orders_PaymentOption" CHECK
		(PaymentOption IN ('cod', 'credit card'))*/

);
CREATE TABLE OrderDetails
(
	  OrderID INT NOT NULL
	, ProductID INT NOT NULL
	, Quantity INT DEFAULT 1,
--	, SubTotal AS
	CONSTRAINT `PK_OrderDetails` PRIMARY KEY  CLUSTERED 
		(
			OrderID,
			ProductID
		),
	CONSTRAINT `FK_OrderDetails_Orders` FOREIGN KEY 
		(OrderID) 
		REFERENCES Orders(OrderID),
	CONSTRAINT `FK_OrderDetails_Products` FOREIGN KEY 
		(ProductID) 
		REFERENCES Product
		(ProductID)
);
CREATE VIEW V_Subtotal AS
SELECT OrderDetails.OrderID AS OrderID
	, Product.Names AS `Product Name`
	, Product.Price AS Price
	, OrderDetails.Quantity AS Quantity
	, Product.Price * Quantity AS Subtotal
FROM Product, OrderDetails
WHERE Product.ProductID = OrderDetails.ProductID
;
CREATE VIEW V_Total AS
SELECT Customer.LastName AS `Last Name`
	, Orders.CustomerID AS `Customer ID`
	, SUM(V_subtotal.subtotal) as `Total`
FROM Orders 
INNER JOIN V_Subtotal
ON Orders.OrderID = V_Subtotal.OrderID
INNER JOIN Customer
ON Orders.CustomerID = Customer.CustomerID
GROUP BY Orders.CustomerID, Customer.LastName


-- INSERT RECORD TO CATEGORY TABLE
INSERT INTO Category
	(CategoryName)
VALUES
	('Plants'),
	('Seeds'),
	('Accessories')
;
-- INSERT RECORD TO PRODUCT TABLE
-- CATEGORY 1 (PLANTS) PRODUCTS
INSERT INTO Product 
	( CategoryID
	, Names
	, Price
	, Descriptions
	, Images)
VALUES 
	  ( 1
     , 'Amaryllis'
     , 2000.00
     , 'Bulb flowering type plants that produce a cluster of attractive trumpet like flowers in different color'
     ,  LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Amaryllis.jpg'))
	
	, ( 1
     , 'African Violet'
     , 10000.00
     , 'Belonging to the Saintpaulia Genus with many species.'
     ,   LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/African Violet.jpg'))

	, ( 1
     , 'Angel Wing Begonia'
     , 5000.00
     , 'This plant is from a large genus named Begonia. The Angel Wing Begonia is one of the most popular species from the genus.'
     ,   LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Angel Wing Begonia.jpg'))

	 , ( 1
     , 'Barberton Daisy'
     , 2000.00
     , 'A flowering pot plant displaying striking flowers.'
     ,   LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Barberton Daisy.jpg'))
;
-- CATEGORY 2 (SEEDS) PRODUCTS
INSERT INTO Product
	( CategoryID
	, Names
	, Price
	, Descriptions
	, Packet_content
	, Images)
VALUES
    ( 2
     , 'Achillea Millefolium Mix'
     , 500.00
     , 'A fantastic, slowly spreading, bright, mixture of colours. This mixture is ideal for filling any corner of the garden. A. millefolium is a spreading stoloniferous perennial with narrow, finely pinnately dissected leaves with flat upright facing flowerheads throughout the summer.'
     , 150
     ,   LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Achillea Millefolium Mix.jpeg'))

     ,( 2
     , 'Acroclinium Grandiflorum Mix'
     , 500.00
     , 'A striking, double flowered mixture of pink, red and white blooms. Great as fresh cut flowers in July and August, or used as dried flowers for long lasting decorations to brighten your home in winter.'
     , 150
     ,   LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Acroclinium Grandiflorum Mix.jpg'))

     , ( 2
     , 'Adonis Aestivalis'
     , 500.00
     , 'This superb annual has feathery foliage and a succession of brilliant blood-red flowers, making a delightful plant for the border. It grows well in any ordinary garden soil, but prefers a moist well-drained soil grown in sun or semi-shade. In olden times this scarce and beautiful European native was used as a medicinal and ornamental plant.'
     , 48
     ,   LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Adonis Aestivalis.jpg'))

     , ( 2
     , 'Ageratum Mexicanum'
     , 2000.00
     , 'Fluffy pale purple to blue flowers from summer through until the autumn will liven up your garden or patio container display. A quick growing and impressive plant with weather resistant flower heads which will go on flowering until the first frosts.'
     , 800
     , LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Ageratum Mexicanum.jpg'))

     ,( 2
     , 'Agrostemma Githago Milas Rosea'
     , 900.00
     , 'Milas Rosea has large rose pink to violet flowers, on tall branching stems. Similar to the ancient cottage garden plant (A Githago) which was once a welcome sight in cornfields, but is now very rare in the wild. Allow it to naturalise in your garden for a never-ending display year after year.'   
     , 100
     , LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Agrostemma Githago Milas Rosea.jpg'))
;
-- CATEGORY 3 (ACCESSORIES) PRODUCTS
INSERT INTO Product
	( CategoryID
	, Names
	, Price
	, Descriptions
	, Images)
VALUES
	( 3
	, 'Handwoven Medium Basket'
	, 950.00
	, 'These beautiful handmade woven baskets pair perfectly with any of our medium plants. Made from natural fibers by Filipino artisans, the simple design of these baskets will be a stunning addition to your home decor and plant collection.'
	, LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Handwoven Medium Basket.jpg'))

	, (  3
	, 'Hanging Saucer'
	, 1800.00
	, 'Elevate your plant game with the adjustable hanging Saucer. With a minimalist design and made of 80% recycled plastic, this hanging saucer is a unique way to display two small plants, one medium plant, or one full collection of extra-small plants. This waterproof, UV-proof, frost-resistant hanging saucer makes a great accessory indoors and out.'
	, LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Hanging Saucer.jpg'))

	, (  3
	, 'Potting Tarp'
	, 999.00
	, 'Repot plants without the mess using our Potting Tarp. Crafted with water-resistant canvas and nylon, the tarp is designed for easy clean-up with snaps at each corner to help fold the canvas and contain soil and other potting materials.' 
	, LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Potting Tarp.jpg'))

	, ( 3
	, 'Tool Roll'
	, 300.00
	, 'Store your gardening tools in style using our Tool Roll. With 11 nylon lined pockets and water-resistant exterior canvas fabric, keeping track of your gardening essentials has never been easier.'
	, LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Tool Roll.jpg'))

	, ( 3
	, 'Plant Hanger'
	, 350.00
	, 'Beautifully display small or medium plants with this handcrafted plant Hanger, made of 100% cotton. It pairs well with pothos, prayer plants, philodendrons, and other plants that trail down, creating a lush display in any room. This plant hanger allows your plant to get more natural light when hung by a window while being super stylish. The perfect gift to give plant-loving friends and family.'
	, LOAD_FILE('C:/xampp/htdocs/Ecommerce Website/Images/Product/Plant Hanger.jpg'))
;
-- INSERT RECORD TO CUSTOMER TABLE
INSERT INTO Customer
	(
	  Username 
	, UserPassword 
	, LastName 
	, FirstName 
	, MiddleName 
	, Email 
	, ContactNumber 
	, Addresss 
	, Barangay 
	, CityMun 
	, Province 
	, Country 
	)
VALUES
	 ( 'taylor'
	, 'taylor'
	, 'Swift'
	, 'Taylor'
	, 'Alison'
	, 'taylorswift@gmail.com'
	, 09102290806
	, '123 Monte Alms'
	, 'San Jose'
	, 'Rodriguez'
	, 'Rizal'
	, 'Philippines')

	, ('selena'
	, 'selena'
	, 'Gomez'
	, 'Selena'
	, 'Batumbakal'
	, 'selenagomez@gmail.com'
	, 09102290807
	, '234 Gondor Sluir'
	, 'San Jose'
	, 'Rodriguez'
	, 'Rizal'
	, 'Philippines')

	, ('heeseung'
	, 'heeseung'
	, 'Batumbakal'
	, 'Heeseung'
	, 'Lee'
	, 'heeseunglee@gmail.com'
	, 09102290808
	, '97 Hobbiton Villa'
	, 'San Jose'
	, 'Rodriguez'
	, 'Rizal'
	, 'Philippines')

	, ('harry'
	, 'harry'
	, 'Potter'
	, 'Harry'
	, 'Evans'
	, 'harrypotter@gmail.com'
	, 09102290809
	, '53 Pivet Drive'
	, 'Saint Monte'
	, 'London'
	, 'London'
	, 'United Kingdom')
;
INSERT INTO Orders
	(
	  CustomerID 
	, OrderDate 
	, ShippingDate
	, PaymentOption
	)
VALUES 
	  (1, '2022-3-6', '3/12/2022', 'cod')
	, (2, '2022-3-6', '3/12/2022', 'cod')
	, (3, '2022-3-6', '3/12/2022', 'cod')
	, (4, '2022-3-6', '3/12/2022', 'cod')
;
INSERT INTO OrderDetails 
(		
	  OrderID
	, ProductID 
	, Quantity 
)
	
VALUES
	  (1,1,5)
	, (2,2,1)
	, (3,2,3)
	, (4,3,2)
	, (4,5,8)
;
-- GET THE BEST SELLER
CREATE PROCEDURE getBestSeller()
BEGIN
     SELECT product.Names AS `Name`
	 	  , product.ProductID AS 'ProductID'
          , product.Images AS `Image`
          , product.Price AS`Price`
          , orderdetails.Quantity AS `Number of Order`
     FROM orderdetails
     INNER JOIN product
     ON orderdetails.ProductID = product.ProductID
     ORDER BY `Number of Order` DESC
     LIMIT 4;
END





