## Laravel Jobs and Queues

```shell script
#Setup
php artisan queue:table
php artisan queue:failed-table
php artisan migrate

#Create jobs
php artisan make:job BlogPostAfterCreateJob
php artisan make:job BlogPostAfterDeleteJob
php artisan make:job ProcessVideoJob

#Run
#production
php artisan queue:work
php artisan queue:work --queue=queueName1,queueName2
#development
php artisan queue:listen
```
