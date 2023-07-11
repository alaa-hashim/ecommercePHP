CREATE or REPLACE VIEW itemview as 
SELECT product.* ,category.*FROM product
INNER JOIN category ON category.categroy_id = product.cat_id


CREATE or REPLACE VIEW cartview as 
SELECT SUM(items.items_price - items.items_price * items_discount / 100) as itemsprice  , COUNT(cart.cart_itemsid) as countitems , cart.* , items.* FROM cart 
INNER JOIN items ON items.items_id = cart.cart_itemsid
WHERE cart_orders = 0 
GROUP BY cart.cart_itemsid , cart.cart_usersid , cart.cart_orders ;