<?php

SELECT DISTINCT i.id, i.size, p.name, i.price FROM `inventory` i
LEFT JOIN `product_item` pi ON i.product_item_id = pi.id
LEFT JOIN `product` p ON pi.product_id = p.id
WHERE I.id = (
SELECT si.id FROM `inventory` si
LEFT JOIN `product_item` spi ON si.product_item_id = spi.id
LEFT JOIN `product` sp ON spi.product_id = sp.id
WHERE sp.id = p.id AND i.size = si.size ORDER BY si.price ASC LIMIT 1
);



