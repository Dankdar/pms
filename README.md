# pms
Simple approach pharmacy managemnent sys. built in native php.
22-10622 Dar.
Forman Christian College University. 

1. Paste inside root directory/ where you have installed xammp i.e local disk C: OR drive D: OR drive E: etc.. then paste in: xampp/htdocs, 

2.Import pms.sql file(given inside the zip package in SQL file folder)

3.Run the script http://localhost/project_pms 

ADMIN Username: gandelfthegray@lotr.com
ADMIN Password: admin
SELLER Username: saouronthewhite@lotr.com
SELLER Password: 0000

this is explained in order of appearance in Visual Studio Code.
structure-->
1. project_pms is root folder.

2. assets contain images used.

3. includes contains .inc files i.e connection to database in db.inc, function.inc file conntaining all functions created and used, and some routing and handeling .inc files for login, logout, med.crud, sales.crud, scart. 

4. header is the navigation bar. 

6. index is login page.

7. ADMIN ACCESS ONLY: med.crud is where admin can EDIT,VIEW, DELETE and ADD medicine.

8. ADMIN ACCESS ONLY: panel is where the admin can select what they want to do; i.e inventory,salesmnan,sales and profile.

9. BOTH CAN ACCESS: pfp is where admin or user can change their own email/username or password.

10. SQL code for database named "pms".

11. this readme.txt

12. ADMIN ACCESS ONLY: sales.crud is where admin can edit,add,delete and veiw all salesmen.

13. ADMIN ACCESS ONLY: sales is where admin can view all sales on an input date.

14. SALESMAN ACCESS ONLY: salesman.panel is where salesman can select what to do i.e search,buy medcine and profile.

15. SALESMAN ACCESS ONLY scart is where the salesman can add medicine into cart and buy them/checkout.

16. SALESMAN ACCESS ONLY: seller.crud is where salesman can search for any number of medicine by its name or its company name.

17. ADMIN ACCESS ONLY: admin can update existing medicine information.

18. ADMIN ACCESS ONLY: admin can update existing salesman information.
