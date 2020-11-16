for folder in *; do
	echo "\n\n\n\n"
	echo "$folder"
	echo "\n"
	mysql -uroot -pthomas616 db_rcenamor < $folder/$folder.sql
done