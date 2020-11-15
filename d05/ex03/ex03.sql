INSERT INTO ft_table (`login`, `group`, creation_date)
SELECT last_name, 'other', birthdate FROM user_card
WHERE 
	last_name LIKE '%a%' AND CHAR_LENGTH(last_name) < 9
	ORDER BY lower(last_name) ASC
	LIMIT 10
;