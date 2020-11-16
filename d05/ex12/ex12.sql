SELECT last_name, first_name
	FROM user_card
	WHERE last_name LIKE '%-%' OR first_name LIKE '%-%'
	ORDER BY lower(last_name), lower(first_name)
;