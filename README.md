# EnumerableTrait
Easy way to get the possible values in a ENUM field. 

#Usage: 

#### Create a table with a ENUM type column:
```
Table: Users
+----------------+--------------------------------------+------+-----+---------+----------------+
| Field          | Type                                 | Null | Key | Default | Extra          |
+----------------+--------------------------------------+------+-----+---------+----------------+
| id             | int(10) unsigned                     | NO   | PRI | NULL    | auto_increment |
| status         | enum('banned','active','validating') | NO   |     | NULL    |                |
+----------------+--------------------------------------+------+-----+---------+----------------+
```

#### Create a class to use the trait:
> **Note**: If you don't create the property `$table`, you should call it with the second argument.

```
<?php

namespace App\Models;

class User 
{
    use EnumerableTrait;
    
    protected $table = 'users';
}

```

#### Call statically the method
```
var_export(User::getEnumValues('status'));

```
###### Output:
```
array (
  0 => 'banned',
  1 => 'active',
  2 => 'validating',
)
```


