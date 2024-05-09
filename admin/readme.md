Tracking system refers to the process of monitoring the progress in a system.
Here it focuses on the progress of the task in a system.
2024/05/05:=>
Features to be included in the task tracking system:=>
1. User Authentication and Authorization:=>
a. Secure Login:=> Secure login and authentication mechanisms for users (regular user, supervisor and admin).
b. Role-Based Access Control:=> Depending on your role (regular user/ supervisor or admin ), one is allowed into certain areas of the system which keeps everything safe and organized.
2. Task Management:=>
    (I) Task:=>
Id|title|description|start|end|status|user_id|files|board_id 
Int|varchar|text|date|date|int|int|file|int|	
a. Task creation:[To create new task](tasks/create.php)
b. Task Editing and Updating:[To edit and update the task](tasks/edit.php)
c. Task Deleting:[To delete the task](tasks/delete.php)
 (II) Users
Id|name|username|email|password|role
int|varchar|varchar|email|password|varchar
a.      Add users
b.     Edit users
c.      View users
d.     Delete users
  (III) level
Id|task_title|task_description| color| status| board_id|task_id
d
Int|int|text|       |int|int|int
a.      Add level
b.     Edit level
c.      View level
d.     Delete level
    (IV) Task board
Id|task_title|task_description | user_id
int|varchar|text|int
Add board
Edit board
View board
Delete board
    (V) Task_label
Id|task_id|user_id|status|created_at|updated_at
int|int|int|int|date|date


=> WORK FLOW OF THE “TASK TRACKING SYSTEM”

a. Users:=> Represent the users of the system who  can create tasks, manage task boards and assign label. 
b. Tasks:=> Represent the individual task created by the user. Each task belong to the specific user and can be associated with task boards and labels
c. Taskboard:=> Represent the collection of the tasks organized by the users.User can create task board to put the related task together
d. Label:=> Represent the label that can be assigned to the task. Labels help categorize and organize task further
e. Task_label:=> Represent the association between task and labels. Each task can have multiple tasks assigned to it.The task-label table serves as a junction table to manage the many-to-many relationship between tasks and labels. 

 

Research is going on on the topic related to tables to be made in database for CRUD operations






