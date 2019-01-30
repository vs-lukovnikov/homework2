
<?php

// 1. Get list of users with all data connected to them
SELECT user.id, user.username, user.email, user.created_at, user_data_first_name.value, user_data_phone.value  FROM `homework-sql`.user
left join `homework-sql`.user_data_first_name ON user_data_first_name.user_id = user.id
left join `homework-sql`.user_data_phone ON user_data_phone.user_id = user.id

// 2. Get list of users who has articles created after 2019-01-24T13:00:00+00:00
SELECT  distinct(user.username) FROM `homework-sql`.user
left join `homework-sql`.article on article.author_id = user.id where article.created_at > '2019-01-24T13:00:00+00:00'

// 3. Get list of articles connected to not top level categories
SELECT * FROM `homework-sql`.article
left join `homework-sql`.category on article.category_id = category.id where category.parent_id != 0

// 4. Get list of users whose first name starts with letter 'V'
SELECT  user.username, user_data_first_name.value FROM `homework-sql`.user
left join `homework-sql`.user_data_first_name on user.id = user_data_first_name.user_id where user_data_first_name.value like 'V%'


