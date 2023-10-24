CREATE OR REPLACE VIEW  items1view AS
SELECT items.* , categories.* FROM items 
INNER JOIN  categories on  items.items_cat = categories.categories_id ; 



CREATE OR REPLACE VIEW  wishview AS
SELECT wishlist.* , product.* FROM wishlist 
INNER JOIN  product on  wishlist.wishlist_productid = product.product_id ; 



CREATE OR REPLACE VIEW myfavorite AS
SELECT favorite.* , items.* , users.users_id FROM favorite 
INNER JOIN users ON users.users_id  = favorite.favorite_usersid
INNER JOIN items ON items.items_id  = favorite.favorite_itemsid




CREATE OR REPLACE VIEW cartview AS
SELECT 
    SUM(CAST(product.price * cart.quantity -( product.price * product_discount / 100) AS INT)) AS itemsprice,
    COUNT(cart.cart_itemid) AS countitems,
    cart.*,
    product.*
FROM cart
INNER JOIN product ON product.product_id = cart.cart_itemid
WHERE cart_order = 0
GROUP BY cart.cart_itemid, cart.cart_userid, cart.cart_order;



CREATE OR REPLACE VIEW cartview AS
SELECT 
    SUM(CAST(product.price * cart.quantity -( product.price * product_discount / 100) AS INT)) AS itemsprice,
    COUNT(cart.cart_id) AS countitems,
    cart.*,
    product.*
FROM cart
INNER JOIN product ON product.product_id = cart.cart_itemid
WHERE cart_order = 0 and hides = 0
GROUP BY cart.cart_id, cart.cart_userid, cart.cart_order;


CREATE  or REPLACE view ordersview AS 
SELECT orders.* , address.* FROM orders 
LEFT JOIN address ON address.address_id = orders.orders_address ; 


CREATE or REPLACE VIEW ordersdetailsview  as 
SELECT SUM(product.price - product.price * product_discount / 100) as itemsprice  , COUNT(cart.cart_itemid) as countitems , cart.* , product.*   FROM cart 
INNER JOIN product ON product.product_id = cart.cart_itemid 
WHERE cart_order != 0 
GROUP BY cart.cart_itemid , cart.cart_userid , cart.cart_order ;


CREATE or REPLACE VIEW itemstopselling AS 
SELECT COUNT(cart_id) as countitems , cart.* , items.*  , (items_price - (items_price * items_discount / 100 ))  as itemspricedisount  FROM cart 
INNER JOIN items ON items.items_id = cart.cart_itemsid
WHERE cart_orders != 0 
GROUP by cart_itemsid   ; 



CREATE VIEW orderlsit AS
SELECT
    u.*,
    
    a.*,
    o.*,
    c.*,
   
    p.*
FROM
    user u
    LEFT JOIN address a ON u.id = a.user_address
    LEFT JOIN orders o ON u.id = o.order_userid
    LEFT JOIN cart c ON u.id = c.cart_userid
    LEFT JOIN product p ON c.cart_itemid = p.product_id;
