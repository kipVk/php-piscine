SELECT last_name, first_name, DATE(birthdate) as birthdate
	FROM user_card
	WHERE year(birthdate) = 1989
	ORDER BY lower(last_name)
;