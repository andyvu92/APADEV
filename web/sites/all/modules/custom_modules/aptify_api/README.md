# Basic Installation
- Enable the module as normal drupal way
- Find the module config at `/admin/config/system/aptifyapi`

# Debug Mode
- At module config if you enable debug mode
- You can check logs in Watchdog at  `/admin/reports/dblog`
- Here you can filter logs by "Aptify" tag
- Also you will have a path `apa/test-api`
- This is test page corresponds to `aptify_test_calls_logged_in()` function to test the calls.

# Structure
- The module is basically using 2 functions to talk to Aptify
- `aptify_api_login()` - gets user token 
- You can retrieve all the values through `_aptify_get($key)`
- To make API Calls the most important one is :
- `_aptify_api_call($api_number, $path, $token, $data, $method = 'GET')`
   * Very similar to curlRequest function.
   * Each API function should use this function as central call.
- Other functions like 