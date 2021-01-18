


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
	- Identifier
	- FullName
	- Email
	- Password
	- Mobile
	- AddressLine (Extra Field Added - For better experience)
	- District
	- City
	- State
	- Country
	- ProfileImage
	- Roles (It will store height role - Can be modified by Admin)
	- LoginIP (Last Login IP Spoofing - Visible in profile page)
	- Status
	- Created At
	- Updated At
2. Structure of Products:
	- Identifier
	- Name
	- Image
	- Quantity
	- Descriptions
	- Price
	- Status
	- Created At
	- Updated At
3. Structure of Order Management:
	- Identifier
	- OrderId
	- RefNo
	- Quantity
	- Price
	- TotalPrice
	- OrderStatus (Enum)
	- Discount
	- UserId (Extra Field Added - For better experience)
	- UserName
	- UserMobile
	- UserEmail
	- UserAddress (Full address including country)
	- CreatedAt
	- UpdatedAt

Project Status:
 - Users Management - Completed
 - Roles & Permission - Completed
 - Products Management - Completed
 - Order Management - Completed

## Getting Started
1. Clone this repo
2. Setup environment - Add db connection details
3. Composer Install
5. Run NPM Install and NPM Watch to compile JS and SCSS
6. Import sample-db-data.sql
7. Serve Laravel Locally

### credential
User: gk@gmail.com | password: 2116 - admin
User: ak@gmail.com | password: 2116 - manager
User: jd@gmail.com | password: 2116 - user