# parking

Exercise is the possible solution for follwing problem 

Description

We will be implementing a parking checkout system that calculates the total price of parking sessions by parking spot, which is priced in hourly bases and handles pricing schemes such as “1 hour price 3 EUR, three hours 2.90”. 
In our system we’ll use letters to identify each parking spot (A, B, C). Each parking spot is priced individually, but some of them are multipriced: “buy n hours, and they will cost you y”

Our parking spot has following attributes:
•	ParkingSpot
•	Price

Item	Regular price	Special price
A	1 EUR	3 for 2.70 EUR
B	4 EUR	2 for 6 EUR
C	8 EUR	
D	5 EUR	

Our system accepts calls in any order, so if we buy session in B and A spot, and another B session, we’ll recognize the two B sessions and price them at 6 EUR (total price would be 7 EUR). Because the pricing changes frequently, we need to be able to pass in a set of pricing rules each time we start handling transaction.

The Interface should look like:



Some examples of cases:
Items	Total
A, B	5 EUR
A, A	2 EUR
A, A, A	2.70 EUR
C, D, B, B	19 EUR
	
