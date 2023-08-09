CREATE or REPLACE VIEW itemview as 
SELECT product.* ,category.*FROM product
INNER JOIN category ON category.categroy_id = product.cat_id





CREATE OR REPLACE VIEW itemviews AS
SELECT
    product.*,
    1 AS wishlist,
    CAST(price - (price * product_discount / 100) AS DECIMAL(10, 2)) AS itemdiscount
FROM
    product
INNER JOIN wishlist ON wishlist.wishlist_productid = product.product_id AND wishlist.wishlist_userid = 19

UNION ALL

SELECT
    *,
    0 AS wishlist,
    CAST(price - (price * product_discount / 100) AS DECIMAL(10, 2)) AS itemdiscount
FROM
    product
WHERE
    product_id NOT IN (
        SELECT
            product.product_id
        FROM
            product
        INNER JOIN wishlist ON wishlist.wishlist_productid = product.product_id AND wishlist.wishlist_userid = 19
    );
