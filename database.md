# Role 
- id
- name
- order 

# Permission
- id 
- name 
- order

# Department
- id
- name 

# Department.Folder
- id
- department_id
- name

# DepartmentfolderFile
- id 
- department_id
- folder_id

# User
- id
- department_id
- name
- phone
- email
- balance


////////// PROJECT
# Project
- id 
- user_id
- name
- type enum(AVANS,MASRAF)
- description

# transection
- id 
- project_id
- category_id->nullable
- type->enum (AVANS,MASRAF,İADE)
- payer nullable
- payee nullable // Parayı alan kişi
- price
- is_income
- status->enum (WAITING,COMPLETED,CANCELLED)

# transection category
- id
- name

////////// JOB

# Job 
- id 
- status_id
- name
- description
- deadline
- created_by

# JobUser
- job_id
- user_id

# Status
- id 
- name
- is_completed

# Message
- id
- message


# Purchase 
- id 
- user_id
- name
- description
- price

# Trip
- id
- name
- user_id
- location
- date
- description

