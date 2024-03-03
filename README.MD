****************PROGRESS********************************
Backend: 50%
Frontend: 80%
API Frontend: 40%

Note: JWT authentication is not yet integrated. Some of the backend api is not yet integrated to the frontend.

You may test the backend if you are familiar with API management like POSTMAN API. Just check the 'config/routes.php' file in the ci4 backend.

Overall Status: 50% Complete

**************FULLY WORKING FUNCTIONS***************
1. CREATE ACCOUNT PAGE
2. MANAGE USER ACCOUNT (ADD, UPDATE, DELETE)
3. MANAGE ALUMNI (VIEWING)
4. POST A JOB (CREATE)


*********HOW TO RUN****************
First, open the 'alumni' directory with VS Code.

A. Create a database name 'alumni'.

B. RUN THE BACKEND
    1. Open terminal then navigate to backend directory.
            example: cd backend
            Sample: C:\Users\Admin\Documents\Web Projects\alumni\backend> 
    2. Run the Database Migration.
            example: php spark migrate refresh
            Sample: C:\Users\Admin\Documents\Web Projects\alumni\backend> php spark migrate refresh
    2. Type php spark serve
            Sample: C:\Users\Admin\Documents\Web Projects\alumni\backend> php spark serve

C. RUN THE FRONTEND
    1. Open terminal then navigate to frontend directory.
            example: cd frontend
            Sample: C:\Users\Admin\Documents\Web Projects\alumni\frontend> 
    2. Type npm run dev.
            Sample: C:\Users\Admin\Documents\Web Projects\alumni\frontend> npm run dev
    3. Click the locahost link
             http://localhost:5173/

Use this links to test the functional pages.
http://localhost:5173/admin/manage/jobs
http://localhost:5173/admin/manage/alumni
http://localhost:5173/admin/manage/user
http://localhost:5173/account/create