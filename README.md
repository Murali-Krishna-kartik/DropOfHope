# 🩸 DropOfHope – Blood Donation Management System  

A **full-stack web application** designed to streamline the process of donating and receiving blood, connecting donors, recipients, and administrators in one centralized system. Built with **PHP, MySQL, HTML, CSS, Bootstrap, and jQuery**, DropOfHope ensures efficiency, reliability, and ease of use for all stakeholders.

---

## 🚀 Features  

### **Public Interface**  
- **Animated Landing Page** 🩸 – Welcomes visitors with a unique blood drop animation.
- **Home Page** 🏠 – Displays donor lists dynamically fetched from the database, image sliders, and blood donation tips.
- **About Us** ℹ️ – Detailed organization information stored in and fetched from the database.
- **Why Donate Blood?** ❤️ – Educates visitors with facts and benefits of blood donation.
- **Become a Donor** 🙋 – Allows users to register as donors by providing contact details and address.
- **Need Blood** 🔍 – Search available donors by blood group and view their details.
- **Contact Us** 📩 – Send messages or queries directly to the admin.

### **Admin Panel**  
- **Secure Login** 🔐 – Authenticates admin credentials before granting access.
- **Dashboard** 📊 – Displays statistics like total donors and pending queries.
- **Add Donor** ➕ – Manually add donor details.
- **Manage Donors** 📋 – View and delete donor records.
- **View Contact Queries** 📥 – Mark queries as “Read” or delete them.
- **Manage Pages** 📝 – Edit content for *About Us* and *Why Donate Blood* pages directly from the admin panel.
- **Update Contact Info** 📞 – Modify address, phone, and email displayed on the Contact Us page.

---

## 🛠️ Tech Stack  

| Technology | Purpose |
|------------|---------|
| **HTML5, CSS3, Bootstrap** | Frontend styling and layout |
| **jQuery** | Interactive UI elements |
| **PHP** | Server-side logic |
| **MySQL (via XAMPP)** | Database management |
| **phpMyAdmin** | Database GUI tool |

---

## 📂 Project Structure  

```
DropOfHope/
│
├── Admin/ # Admin panel files
├── image/ # Images and icons
├── config.php # Database Authentication
├── savedata.php # To save data into database
├── index.php # Main application entry
├── main.html # Animated landing page
├── home.php # Homepage with donor listing
├── conn.php # Database connection
└── README.md # Project documentation

```

---

## ⚙️ Installation & Setup  

```bash
# 1️⃣ Clone the repository  
git clone https://github.com/your-username/DropOfHope.git

# 2️⃣ Move project to XAMPP htdocs folder  
# Example (Windows path):
C:/xampp/htdocs/DropOfHope

# 3️⃣ Import the database  
# - Open phpMyAdmin  
# - Create a new database (e.g., dropofhope)  
# - Import the provided .sql file into this database

# 4️⃣ Configure database connection  
# - Edit conn.php with your MySQL username, password, and database name.

# 5️⃣ Start Apache and MySQL using XAMPP Control Panel  

# 6️⃣ Open in browser  
http://localhost/DropOfHope/main.html
```

---

## 📸 Screenshots  

### Landing Page  
![Landing Animation](screenshots/landing.png)

### Home Page  
![Home Page](screenshots/home.png)

### Admin Dashboard  
![Admin Dashboard](screenshots/dashboard.png)

---

## 🌟 Highlights  
- Fully dynamic content management through admin panel.
- Mobile-responsive design with Bootstrap.
- Centralized database for donor and recipient records.
- Smooth animations and interactive UI for better user experience.

---

## 🧑‍💻 Author  

**A.Murali Krishna Kartik**
📧 Email: muraliaddaganti@email.com
💼 LinkedIn: www.linkedin.com/in/addaganti-murali-krishna-kartik 

---

## 📜 License  
This project is open-source and available under the **MIT License**.

---

💡 *"DropOfHope – Donate blood, save lives, because every drop counts."*
