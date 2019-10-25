# RagaBackend
Backend for raga

URL 
ambil semua data user
GET  http://127.0.0.1:8000/api/account

ambil 1 data user
GET  http://127.0.0.1:8000/api/account/{{id}}

daftarkan user
POST http://127.0.0.1:8000/api/account/ + body input sesuai field table

delete user
DEL http://127.0.0.1:8000/api/account/{{id}}

update user
PUT http://127.0.0.1:8000/api/account/{{id}}/ + body sesuai update

