create table products
(
    id          int auto_increment
        primary key,
    sku         varchar(20)  not null,
    name        varchar(240) null,
    price       int          not null,
    description varchar(240) not null,
    constraint products_sku_number_uindex
        unique (sku)
);

INSERT INTO products.products (id, sku, name, price, description) VALUES (9, '3268493', '32423', 1000, 'Weight: 1 Kg');
INSERT INTO products.products (id, sku, name, price, description) VALUES (13, 'gjfjh', 'jkhgkjg', 45564, 'Weight: 45 Kg');
INSERT INTO products.products (id, sku, name, price, description) VALUES (14, 'wer', 'Denis', 123, 'Weight: 32412 Kg');
INSERT INTO products.products (id, sku, name, price, description) VALUES (16, 'trew 36294023', 'ramis', 123, 'Weight: 1234Kg');
INSERT INTO products.products (id, sku, name, price, description) VALUES (17, 'terhoi 3242354', 'bumba', 12, 'Weight: 261218Mb');
INSERT INTO products.products (id, sku, name, price, description) VALUES (19, 'wqety 346891', 'shelf', 123, 'Dimensions: 21x12x31');
INSERT INTO products.products (id, sku, name, price, description) VALUES (20, 'sdcd', 'arturs', 324, 'Weight: 233Kg');