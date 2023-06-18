CREATE or REPLACE VIEW itemview as 
SELECT product.* ,category.*FROM product
INNER JOIN category ON category.categroy_id = product.cat_id