CREATE or REPLACE VIEW itemview as 
SELECT product.* ,category.*FROM product
INNER JOIN category ON category.categroy_id = product.cat_id




CREATE OR REPLACE VIEW itemviews AS
SELECT
    product.*,
    1 AS wishlist,
    CAST(CAST(price - (price * product_discount / 100) AS DECIMAL(10, 0)) AS INT) AS itemdiscount
FROM
    product
INNER JOIN wishlist ON wishlist.wishlist_productid = product.product_id AND wishlist.wishlist_userid = 19

UNION ALL

SELECT
    *,
    0 AS wishlist,
    CAST(CAST(price - (price * product_discount / 100) AS DECIMAL(10, 0)) AS INT) AS itemdiscount
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


    CREATE OR REPLACE VIEW itemview AS
SELECT
    product.*,
    1 AS wishlist,
    CAST(CAST(price - (price * product_discount / 100) AS DECIMAL(10, 0)) AS INT) AS itemdiscount,
    subcategory.subcat_name, 
    subcategory.subcat_namear 
FROM
    product
INNER JOIN wishlist ON wishlist.wishlist_productid = product.product_id AND wishlist.wishlist_userid = 19
LEFT JOIN subcategory ON product.subcat_id = subcategory.sub_id

UNION ALL

SELECT
    product.*,
    0 AS wishlist,
    CAST(CAST(price - (price * product_discount / 100) AS DECIMAL(10, 0)) AS INT) AS itemdiscount,
    subcategory.subcat_name ,
    subcategory.subcat_namear 
    
FROM
    product
LEFT JOIN subcategory ON product.subcat_id = subcategory.sub_id
WHERE
    product_id NOT IN (
        SELECT
            product.product_id
        FROM
            product
        INNER JOIN wishlist ON wishlist.wishlist_productid = product.product_id AND wishlist.wishlist_userid = 19
    );






   CREATE OR REPLACE VIEW views AS
SELECT
    viewers.*,
    1 AS wishlist,
    subcategory.*,
    product.*
FROM
    viewers
INNER JOIN wishlist ON wishlist.wishlist_productid = viewers.item_id AND wishlist.wishlist_userid = 19
LEFT JOIN product ON viewers.item_id = product.product_id
LEFT JOIN subcategory ON product.subcat_id = subcategory.sub_id

UNION ALL

SELECT
    viewers.*,
    0 AS wishlist,
    subcategory.*,
    product.*
FROM
    viewers
LEFT JOIN product ON viewers.item_id = product.product_id
LEFT JOIN subcategory ON product.subcat_id = subcategory.sub_id
WHERE viewers.item_id NOT IN (
    SELECT
        viewers.item_id
    FROM
        viewers
    INNER JOIN wishlist ON wishlist.wishlist_productid = viewers.item_id AND wishlist.wishlist_userid = 19
);









$categoryid = filterRequest("id");



$userid = filterRequest("usersid");



$stmt = $con->prepare("SELECT items1view.* , 1 as favorite , (items_price - (items_price * items_discount / 100 ))  as itemspricedisount  FROM items1view 
INNER JOIN favorite ON favorite.favorite_itemsid = items1view.items_id AND favorite.favorite_usersid = $userid
WHERE categories_id = $categoryid
UNION ALL 
SELECT *  , 0 as favorite  , (items_price - (items_price * items_discount / 100 ))  as itemspricedisount  FROM items1view
WHERE  categories_id = $categoryid AND items_id NOT IN  ( SELECT items1view.items_id FROM items1view 
INNER JOIN favorite ON favorite.favorite_itemsid = items1view.items_id AND favorite.favorite_usersid =  $userid  )");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}

CREATE OR REPLACE VIEW views AS
SELECT viewers.*, product.*
FROM viewers
INNER JOIN product ON product.product_id = viewers.item_id
ORDER BY viewers.user_id
LIMIT 15;
