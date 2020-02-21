# Overview
This is a sdk package that can be used in your php code as a plugin to be able to transfer a properly encoded string that represents stamp points to SnowShoe servers and get a response with stamp information.

# Installing

You can install `snowshoe/stamp-sdk` via [the Packagist package](https://packagist.org/packages/snowshoe/stamp-sdk). Just add the following line to your composer.json:

    "snowshoe/stamp-sdk": "3.*"

# Getting Started

1. To be able to use this SDK tool you need to create an app first. You can learn how to [HERE](https://snowshoe.readme.io/v3.0/docs/part-1-create-a-snowshoe-application)

2. Make sure you get the API Key that you will need to run requests. You can learn more about the API Keys [HERE](https://snowshoe.readme.io/v3.0/docs/part-1-create-a-snowshoe-application#get-api-keys)

3. The stamp data passed to our servers is an array of x,y coordinates. These represent the touch points from the stamp that you are trying to get data for. If you are using our front-end jquery plugin (more info on this located [HERE](https://snowshoe.readme.io/v3.0/docs/maintained-libraries)) to capture stamp touch point data, then you can just pass that data directly through for the request with no need to change.

# A Test Page

1. To create a test page so that we can make sure that the Snowshoe plugin installed properly and everything is working we first need to include the autoload.php and the SSSApiClient that is used for the transfering like so:

```
    <?php
    require "vendor/autoload.php";
    use Snowshoe\SSSApiClient;
```

2. To test that it will send and receive the data properly we will use this snippet of code:

```
  $client= new SSSApiClient("INSERT_API_KEY");
  $JSONResponse=$client->processData("[[264,172],[267,371],[242,286],[69,375],[66,221]]");
  echo $JSONResponse;
  ?>
```
In this test sample you create a new client to send and receive the stamp data by using your API Key to register that we got earlier from your account. Then we send a request with some mock data (`[[264,172],[267,371],[242,286],[69,375],[66,221]]`) to get stamp data relating to the API Key and stamp data.

3. You should now be able to go to this php page in a browser and this should display an unformatted JSON string showing a 'serial' of 'DEVA'. Formatted properly it should look more like this:

```
{
   "stamp":{
      "serial":"DEVA",
      "customName":"DEVA"
   },
   "receipt":"2b6a57a3-2862-4af9-b529-bcdbe13c0453",
   "created":"2020-02-05T20:10:39.8967579Z"
}
```

This is the data that was returned after making the request for the stamp information. For more info on stamp data requests and returns go [HERE](https://snowshoe.readme.io/v3.0/docs/part-3-api-request)

# More info

- This sdk extension is made for simplistic retrieval of stamp data from our servers through the php language when your server uses this as it's primary code, such as a LAMP server structure.
- For more info on how to use our product visit: 
    https://snowshoe.readme.io/v3.0/docs
