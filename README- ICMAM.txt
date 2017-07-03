1. Create a mongodb 'ICMAM'

2. Import all the collections by 
mongoimport --db ICMAM --collection <collection_name> --file <path_to_collection.json>
Eg: mongoimport --db ICMAM --collection users --file Collections/users.json

3. Use php version 5.6 or less

4. Default Homepage: 
localhost/ICMAM
or
localhost/ICMAM/index.php