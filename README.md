# PhoneBook System

## CodeIgniter Installation

Requirements: 
1. Composer
-> Download new composer </br>
Link : https://getcomposer.org/download/


## Start the Project
1. Clone Project </br>
git clone : https://github.com/luqmanahmad5149/phonebook.git </br>

2. Change directory to file location</br>
command : cd (file location)</br>

3. Run composer install</br>

4. Create new database </br>
-> DB name : phonebook </br>

5. Open Visual Studio -> copy & paste file env -> rename to .env</br>

6. Setup database information on .env</br>

7. Run php spark migrate</br>

8. Database seed (add 40 contact information)</br>
Run php spark db:seed ContactSeeder </br>

8. Run php spark serve</br>
