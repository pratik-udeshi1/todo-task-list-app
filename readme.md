# Todo API

Create an API for a Todo application. User should be able to add/update/delete/index Tasks and Categories under these lists. Items can be marked as completed. All endpoints should be tested using some HTTP cli.

### Installation

```sh
$ cd /projectfolder
$ composer install
$ generate .env file
$ php artisan key:generate
$ php artisan migrate
$ php artisan serve
```

### API Endpoints

## View all Categories
-----------------

### Request

`GET /api/category/`

### Response

    {
        "id": 1,
        "name": "Category 1",
        "created_at": "2020-03-26 16:42:31",
        "updated_at": "2020-03-26 16:42:31",
        "deleted_at": null
    },
    {
        "id": 2,
        "name": "Category 2",
        "created_at": "2020-03-26 16:42:32",
        "updated_at": "2020-03-26 16:42:32",
        "deleted_at": null
    },
    
    
## View Specific Category
-----------------

### Request

`GET /api/category/{category_id}`

### Response

    {
    "id": 1,
    "name": "Category 1",
    "created_at": "2020-03-26 16:42:31",
    "updated_at": "2020-03-26 16:42:31",
    "deleted_at": null
    }
    
    
## Add new category
-----------------

### Request

`POST /api/category/`

### Parameters
 - name='Category 3'

### Response

    {
    "name": "Category 3",
    "updated_at": "2020-03-26 17:12:46",
    "created_at": "2020-03-26 17:12:46",
    "id": 4
    }
    
    
## Update specific category
-----------------

### Request

`PUT /api/category/{category_id}`

- name='Category 5'

### Response

    {
    "id": 2,
    "name": "category 5",
    "created_at": "2020-03-26 16:42:32",
    "updated_at": "2020-03-26 17:17:34",
    "deleted_at": null
    }
    
    
## Delete specific Categories
-----------------

### Request

`DELETE /api/category/{category_id}`

- Please note that the tasks are linked with category. Once category is deleted the task api would not fetch the tasks which are associated with a particular category.

### Response

    {
    "message": "Category deleted successfully"
    }


## View all Tasks
-----------------

### Request

`GET /api/task/`

- Please note that the tasks are linked with category. This api would not fetch deleted categories tasks.

### Response

    {
        "id": 1,
        "name": "Task 1",
        "created_at": "2020-03-26 16:42:31",
        "updated_at": "2020-03-26 16:42:31",
        "deleted_at": null
    },
    {
        "id": 2,
        "name": "Task 2",
        "created_at": "2020-03-26 16:42:32",
        "updated_at": "2020-03-26 16:42:32",
        "deleted_at": null
    },
    
    
## View Specific Task
-----------------

### Request

`GET /api/task/{task_id}`

### Response

    {
    "id": 1,
    "name": "Task 1",
    "created_at": "2020-03-26 16:42:31",
    "updated_at": "2020-03-26 16:42:31",
    "deleted_at": null
    }
    
    
## Add new Task
-----------------

### Request

`POST /api/task/`

### Parameters
 - name='Task 3'

### Response

    {
    "name": "Task 3",
    "updated_at": "2020-03-26 17:12:46",
    "created_at": "2020-03-26 17:12:46",
    "id": 4
    }
    
    
## Update specific Task
-----------------

### Request

`PUT /api/task/{task_id}`

- name='Task 5'

### Response

    {
    "id": 2,
    "name": "Task 5",
    "created_at": "2020-03-26 16:42:32",
    "updated_at": "2020-03-26 17:17:34",
    "deleted_at": null
    }

## Task Mark as complete
-----------------

### Request

`PUT /api/task/mark-complete/{task_id}`

- Mark as complete would toggle **is_completed** [true, false] with each request.

### Response

    {
    "id": 2,
    "task_name": "Task 2",
    "category_id": 1,
    "is_completed": true,
    "created_at": "2020-03-26 16:42:51",
    "updated_at": "2020-03-26 16:55:43",
    "deleted_at": null
    }
    
    
## Delete a specific Task
-----------------

### Request

`DELETE /api/task/{task_id}`

### Response

    {
    "message": "Task deleted successfully"
    }



License
----

**Open source, Hell Yeah!**
