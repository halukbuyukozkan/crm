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

# MoneyRequest
- id 
- user_id
- name

# MoneyRequestItem
- id
- money_request_id
- type_id
- price

# Type
- id 
- name
- type_id

# MoneyMovement 
- id 
- money_request_id
- user_id 
- user_id2
- price
- is_income

# Job 
- id 
- status_id
- name
- description
- deadline

# JobUser
- job_id
- user_id
- department_id

# Status
- id 
- name
- is_completed





