#Enterprise Integration - Microservice API (Laravel 10)

Proyek ini merupakan implementasi arsitektur **microservices** menggunakan Laravel 10. Terdapat 3 layanan utama:

1. **Customer Service**
2. **Product Service**
3. **Order Service**

Setiap layanan berfungsi secara independen dan berkomunikasi satu sama lain melalui REST API dengan format JSON.

---

##Struktur Layanan

###1. Customer Service
- Menyimpan dan menampilkan data pelanggan.
- Endpoint:
  - `GET /api/customers`
  - `GET /api/customers/{id}`
  - `POST /api/customers`

🔗 [Dokumentasi Postman - Customer Service](https://postman.co/workspace/My-Workspace~5e218379-c677-4d7a-85a7-40e2e43bb0de/folder/44238542-3d6faba3-7519-42fc-b9fa-2736142da970?action=share&creator=44238542&ctx=documentation)

---

###2. Product Service
- Mengelola data produk.
- Endpoint:
  - `GET /api/produk`
  - `GET /api/produk/{id}`
  - `POST /api/produk`

🔗 [Dokumentasi Postman - Product Service](https://postman.co/workspace/My-Workspace~5e218379-c677-4d7a-85a7-40e2e43bb0de/folder/44238542-57e5eb1f-30a4-47e7-ae1a-ac7ecb36ec2c?action=share&creator=44238542&ctx=documentation)

---

###3. Order Service
- Membuat pesanan berdasarkan data dari customer dan produk.
- Endpoint:
  - `GET /api/orders`
  - `GET /api/orders/{id}`
  - `POST /api/orders`
  - `PUT /api/orders/{id}`
  - `DELETE /api/orders/{id}`

🔗 [Dokumentasi Postman - Order Service](https://postman.co/workspace/My-Workspace~5e218379-c677-4d7a-85a7-40e2e43bb0de/folder/44238542-68df74bc-90f0-4570-9784-1ee73b8b1b94?action=share&creator=44238542&ctx=documentation)
