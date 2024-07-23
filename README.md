# User Authentication API

This project provides user authentication functionality including login, logout, registration, and viewing user details. The API uses Laravel as the backend framework.

## Endpoints

### 1. Login

**URL:** `http://localhost:8000/api/user/login`  
**Method:** `POST`

**Request Body:**
```json
{
    "name": "admin123",
    "password": "11221122"
}

