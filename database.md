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

# User
- id
- department_id
- name
- phone
- email
- balance


////////// PROJECT
# transection category
- id
- name

# Project
- id 
- user_id
- name
- description

# transection
- id 
- project_id
- category_id->nullable
- type_id->enum (AVANS,MASRAF,İADE)
- user_id
- user_id2 nullable    // Parayı veren kişi
- price
- is_income

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
 // department_id

# Status
- id 
- name
- is_completed

# Message
- id
- message










/////// ESKi

# MoneyRequest
- id 
- user_id
- name
- description

# MoneyRequestItem
- id
- money_request_id
- type_id
- price

# Type
- id 
- name
- type_id
