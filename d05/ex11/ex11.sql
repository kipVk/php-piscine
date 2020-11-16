SELECT UPPER(user.last_name) AS `NAME`,
	user.first_name,
	subs.price FROM member
	INNER JOIN user_card AS user ON member.id_user_card = user.id_user
	INNER JOIN subscription AS subs ON subs.id_sub = member.id_sub
	WHERE subs.price > 42
	ORDER BY user.last_name, user.first_name ASC
;