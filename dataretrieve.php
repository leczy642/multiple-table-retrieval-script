<?php
//PART ONE (Creating our sample data)

//The first thing we need to do is to create our database and create some tables 
//for the sake of this tutorial we will be creating 3 tables.
//customer, orders and shipping.
// So let's dive straight into MySQL using phpmyadmin, and enter the following code

//We will start by creating our database, we will be calling our database customerorder. To do that we will open phmyadmin > click on sql
//and type the following code 


// [code]
//CREATE DATABASE customerorder;
//[show picture of result]

//now lets create our tables. So we will go back into MySQL and type the following lines of code. 
//please note that you have to select the databse you just created (customerorder), before you click
//on SQL, that way MySQL knows the database you are working on.
//So let's create our table 'customer', by entering the following code 

/**CREATE TABLE customer (
customerid INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(40) NOT NULL,
email VARCHAR(40) NOT NULL,
phone VARCHAR(50),
city VARCHAR(50)
);**/

// We now create our seoond table called orders

/**CREATE TABLE orders (
orderid INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
customerid VARCHAR(40) NOT NULL,
email VARCHAR(40) NOT NULL,
orderdate date
);**/

// for the third table let's enter the following lines of code

/**CREATE TABLE shipping (
shippig_id INT(40) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
customerid VARCHAR(40) NOT NULL,
location VARCHAR(60) NOT NULL,
shipping_date date
);**/

// Now that we have created out tables, can start to enter some sample data for
// our application to work with. So this time when we go into MySQL we will select the table we want //to insert data into before clicking SQL. We will now insert data into customer table


/** INSERT INTO customer (name, email, phone, city ) 
	VALUES 	('Tyson Beckfor', 'beck@yahoo.com', '12345', 'Newyork'),
			('Charlie Stone','charlie@yahoo.com','22345', 'San Diego'),
			('Harry ford','ford@yahoo.com','32345', 'Boston'),
			('Toni Stone','toni@gmail.com','42345', 'Texas'),
			('Charlize page','charlize@yahoo.com','52345', 'Los angeles'),
			('Bill stone','stone@gmail.com','62345', 'Alaska'),
			('katie miller','katie@gmail.com','72345', 'Boston');
				**/
				
			// [Show picture of data successfully inserted]
				
// Let's do the same for the orders table. Don't forget to select the orders table before clicking sql.  Type in the following code to insert our sample data

/**INSERT INTO orders (customerid, orderdate ) 
VALUES 	('1', '2017-12-3'),
			('2','2017-4-3'),
			('3','2017-8-1'),
			('1','2017-8-5'),
			('2','2017-6-1'),
			('4','2017-6-3'),
            ('2','2017-5-1'),
            ('1','2017-5-3'),
            ('3','2017-4-1'),
			('4','2017-4-5'); **/
			
//in order to conclude this part we would insert data into the shipping table. That can be done by typing the following code in MySQL

/** 
INSERT INTO shipping (customerid, location, shipping_date ) 
VALUES 		('1', 'Kansas', '2017-10-10' ),
			('2','Newyork', '2017-07-8'),
			('3','Lagos', '2017-7-15'),
			('1','Abidjan', '2017-7-18'),
			('2','Texas', '2017-8-15'),
			('4','Los Angeles', '2017-9-24' ),
            ('2','Washington', '2017-7-15' ),
            ('1','Abuja', '2017-5-15'),
            ('3','Dallas', '2017-9-18'),
			('4','Florida', '2017-10-15' );
**/

// Now that we have concluded part one it's time to move straight to the second part

//part 2 (retrieving our data)

// Having created our sample data it's time to start retrieving it using php. We will attempt to retrieve the data from 3 tables at the same time. So we begin by creating connections to our database. 

$servername = 'localhost';
$username = 'root';
$password = '';
$dbase = 'customerorder';

$conn = new MySQLi ($servername, $username, $password, $dbase);

// so lets check to make sure there is a connection and output an error message if otherwise
if ($conn->connect_error){
	die ("Unable to connect: ". $dbconn->connect_error);
	}

// In the above code, the die() function kills the script when there is no connection 

// Now for the fun part. We will carry out an SQL query using an inner join, this would query
// our tables and return results from the 3 tables. 

$sql = "SELECT customer.customerid, customer.name, orders.orderid, shipping.location
		FROM customer
		INNER JOIN orders ON customer.customerid = orders.orderid
		INNER JOIN shipping ON customer.customerid = shipping.shippig_id";
		
       //$result = $dbconn ->query($sql);
	   $result = $conn->query($sql);
	   
	   echo ("<table>
			  <tr>
				<th>Customer ID</th>
				<th>Name</th>
				<th>Order ID</th>
				<th>Location</th>
			  </tr>");
	  
	   if($result->num_rows > 0){
		   
		  while ($row = $result->fetch_array()){
				$dbcusid = $row['customerid'];
				$dbcusname = $row['name'];
				$dborderid = $row['orderid'];
				$dblocation = $row['location'];
				
				echo ("
			  <tr>
				<td>$dbcusid</td>
				<td>$dbcusname</td>
				<td>$dborderid</td>
				<td>$dblocation</td>
				
				</tr>
				
		       ");

			} 
	   }
		
//When we view the results on the browser we get what is similar to the picture below 
// [show picture]


// To make the tables more appealing we would throw in a little bit of css but in preparation
// for that we need add some HTML below
// [add html code here]

// Now let's create our style.css file and throw in our css
// [add css code here]
?>

<!DOCTYPE html>
<html>
<head>

<link href="style.css" rel="stylesheet">
</head>
<body>

</body>
</html>