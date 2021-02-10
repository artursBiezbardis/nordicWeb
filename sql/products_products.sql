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

INSERT INTO products.products (id, sku, name, price, description) VALUES (47, 'mrk-56788', 'The Name of the Rose', 2999, 'Weight: 2Kg');
INSERT INTO products.products (id, sku, name, price, description) VALUES (6, 'mrk-56789', 'The Name of the Rose', 2999, 'Weight: 2Kg');
INSERT INTO products.products (id, sku, name, price, description) VALUES (7, 'mrk-56790', 'The Name of the Rose', 2999, 'Weight: 2Kg');
INSERT INTO products.products (id, sku, name, price, description) VALUES (8, 'mrk-56791', 'The Name of the Rose', 2999, 'Weight: 2Kg');
INSERT INTO products.products (id, sku, name, price, description) VALUES (9, 'mrk-56792', 'The Name of the Rose', 2999, 'Weight: 2Kg');
INSERT INTO products.products (id, sku, name, price, description) VALUES (48, 'mrk-567', 'Bed', 49999, 'Dimensions: 60x240x240');
INSERT INTO products.products (id, sku, name, price, description) VALUES (51, 'mrd-56785', 'Toy Story', 299, 'Size: 3880Mb');
INSERT INTO products.products (id, sku, name, price, description) VALUES (54, 'mrk-56786', 'Star Wars', 128, 'Size: 34568Mb');
INSERT INTO products.products (id, sku, name, price, description) VALUES (10, 'mrk-56787', 'Star Wars', 128, 'Size: 34568Mb');
INSERT INTO products.products (id, sku, name, price, description) VALUES (11, 'mrk-56793', 'Star Wars', 128, 'Size: 34568Mb');
INSERT INTO products.products (id, sku, name, price, description) VALUES (12, 'mrk-56794', 'Star Wars', 128, 'Size: 34568Mb');
INSERT INTO products.products (id, sku, name, price, description) VALUES (55, 'mrk-5679', 'Shelf', 2399, 'Dimensions: 120x40x180');
INSERT INTO products.products (id, sku, name, price, description) VALUES (1, 'mrk-5678', 'Shelf', 2399, 'Dimensions: 120x40x180');
INSERT INTO products.products (id, sku, name, price, description) VALUES (2, 'mrk-5677', 'Shelf', 2399, 'Dimensions: 120x40x180');
INSERT INTO products.products (id, sku, name, price, description) VALUES (3, 'mrk-5676', 'Shelf', 2399, 'Dimensions: 120x40x180');
INSERT INTO products.products (id, sku, name, price, description) VALUES (5, 'mrk-5675', 'Shelf', 2399, 'Dimensions: 120x40x180');