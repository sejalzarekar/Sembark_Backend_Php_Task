# URL Shortener App

A Laravel-based app to create and manage short URLs with role-based access control.

## Tech Stack

- **Backend:** Laravel 12 (PHP 8.2)
- **Frontend:** Blade Templates, Tailwind CSS
- **Authentication:** Laravel Fortify & Jetstream
- **Database:** MySQL
- **Version Control:** Git

## Development Process
### Laravel App Setup
- Created a new Laravel 12 project using `composer create-project`.  
- Configured `.env` file for MySQL database (`urlshortener`).  

### Authentication Setup
- Installed Jetstream for authentication (Login & Register).  
- Successfully generated login, register, and dashboard pages.  

### Models and Database
- Created necessary models: `User`, `Role`, `ShortUrl`, `Company`, `Invitation`.  
- Configured database relationships (e.g., `User` belongsTo `Role`, `ShortUrl` belongsTo `User`).  

### Seeders
- Created `RoleSeeder` to populate roles (`SuperAdmin`, `Admin`, `Member`).  
- Created `SuperAdminSeeder` to insert a SuperAdmin user directly using raw SQL.  
### Authorization Policies
- Defined URL access rules and invitation rules using role-based middleware.  

### Controllers & Logic
- Created `ShortUrlController` and `InvitationController`.  
- Configured controller logic with the help of ChatGPT.  

### Application Running
- Connected successfully to MySQL database.  
- Application is running locally, routes and views are working correctly.  
---

## Current Issue
- When a new user signs up, the `role_id` is not stored properly.  
- If `role_id` is manually updated in the database, the user roles work correctly.  
- This prevents proper authorization and role-based functionality.  

---
## Screenshots
<img width="1918" height="1077" alt="1" src="https://github.com/user-attachments/assets/33c73436-f6c1-4d69-9c64-9b814e25aae3" />
<img width="1912" height="1078" alt="2" src="https://github.com/user-attachments/assets/19620317-316a-4d2b-ae0d-920c56279ce7" />
<img width="1918" height="1078" alt="3" src="https://github.com/user-attachments/assets/1d70e1d2-abf3-40e3-b4ac-8e282aa65c1d" />
<img width="1647" height="285" alt="4" src="https://github.com/user-attachments/assets/bc23a35a-4992-46b1-9586-e9df3125fb72" />
<img width="437" height="155" alt="5" src="https://github.com/user-attachments/assets/b4c64ee3-c29e-4885-995e-6b6773bea8cb" />
<img width="1907" height="456" alt="6" src="https://github.com/user-attachments/assets/5e48e973-589f-46ad-9b7d-f987e0880f73" />
<img width="1917" height="460" alt="7" src="https://github.com/user-attachments/assets/9e98cfbd-68ce-406e-8849-f3a563febe27" />





