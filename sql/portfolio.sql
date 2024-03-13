-- Hapus tabel products jika sudah ada
DROP TABLE IF EXISTS products;

-- Buat tabel products baru dengan gambar dari link internet
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    link TEXT NOT NULL -- tipe data TEXT
);


-- Isi data contoh ke dalam tabel products
INSERT INTO products (title, link) VALUES
('product 1', 'http://www.example.com/product1'),
('product 2', 'http://www.example.com/product2'),
('product 3', 'http://www.example.com/product3'),
('product 4', 'http://www.example.com/product4');
