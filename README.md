## Simple HTTP API in PHP 

### Tech stack:
<b>Framework: Laravel 8 <br>
<b>Database: MySQL <br>
<b>Code repository: Github <br>
<b>Web and Database Hosting: Kas Server <br>

## Project requirements:
Build a simple API that cater the following cases:<br>
Note: Please refer to the endpoints for the urls to test. <br>
    
### Case 1: Add/Update Entry
#### Endpoint: http://erika.pieper.im/public/api/
Example:<br>
Input Data: (Body->raw json)<br>
{"test5" : 5}<br>
Result: {status: Successfully saved changes}<br>

### Case 2: Retrieve Value Based on Key parameter
#### Endpoint: http://erika.pieper.im/public/api/test5
Example: <br>
Result: Value is 5 <br>

### Case 3: Retrieve Value Based on Key parameter and Unix timestamp
#### Endpoint: http://erika.pieper.im/public/api/test5?1635171219

### Case 4: Retrieve all Values
#### Endpoint: http://erika.pieper.im/public/api/get_all_records
    
    
### NOTE: Endpoints were tested through POSTMAN

