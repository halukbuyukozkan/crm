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
