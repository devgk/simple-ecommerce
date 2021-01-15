
<p  align="center"><a  href="https://laravel.com"  target="_blank"><img  src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"  width="400"></a></p>

# About Laravel Project

Create an admin panel where Master Admin user can create sub-admin as per their
roles. Admin user can upload the products and change its status Active/Inactive. When product
is in active state then it will be populated to front-end product page. Guest users can buy the
product using cart management after filling a form consist of Name, Email and Address etc. On
successful order creation, redirect user to Thank You page with Its Order Reference No.
Admin Panel for (Master User) Consist for following information:

 - Users Management
	 - List Of All Sub-Admin (CRUD)
 - Products Management
	 - List Of All Products (CRUD)
 - Order Management
	 - List of All Orders with its Information

Context: Our system has the data of the Admin Users, its Roles, Products, Order Management table)

1. Structure of Admin Users:
	2. Identifier
	3. FullName
	4. Email
	5. Mobile
	6. Country
	7. State
	8. District
	9. ProfileImage
	10. Password
	11. Roles
	12. Created At
	13. Updated At
	14. LoginIP
	15. Status
2. Structure of Products:
	1. Identifier
	2. Name
	3. Image
	4. Quantity
	5. Descriptions
	6. Price
	7. Created At
	8. Updated At
	9. Status
3. Structure of Order Management:
	1. Identifier
	2. OrderId
	3. RefNo
	4. Quantity
	5. Price
	6. TotalPrice
	7. OrderStatus (Enum)
	8. Discount
	9. UserName
	10. UserMobile
	11. UserEmail
	12. UserAddress
	13. CreatedAt
	14. UpdatedAt

Project Status:
	Users Management - Completed
	Products Management - Testing Remaining
	Order Management - On Progress