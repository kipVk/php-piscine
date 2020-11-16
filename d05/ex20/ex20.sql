SELECT
	film.id_genre,
	genre.name AS name_genre,
	dist.id_distrib AS id_distrib,
	dist.name AS name_distrib,
	film.title AS title_film
	FROM film
	LEFT JOIN genre ON genre.id_genre = film.id_genre
	LEFT JOIN distrib AS dist ON dist.id_distrib = film.id_distrib
	WHERE film.id_genre >= 4 AND film.id_genre <= 8
;