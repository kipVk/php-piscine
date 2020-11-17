for folder in *; do
	echo "==="
	echo "$folder"
	mysql -uroot -pthomas616 db_rcenamor < $folder/$folder.sql
done