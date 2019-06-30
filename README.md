# Way of the Hero

A simple Heroku app that pulls information from a Google Sheet. There's probably other ways to do it easier, but I really like Google Sheets.

## Usage

The app can be used in conjuction with HTTP GET clients, such as Moobot on Twitch.

You can use it an a command like `!woth` or `!woth 4` and it can respond with a message like `They say... Jury duty is on the way of the Hero.` 

## Setup

1. Create a Google Sheet with a list of possible options in column A. 
- Change the document sharing settings so that anybody with the link can view without signing in. 
- You can also allow other people to edit the document to add/change/remove possibilities.
- See an example here: https://docs.google.com/spreadsheets/d/1-sppUEhAukSrgVkvXZqJhPONwuD23sgJzxfkUQsuSzA/edit#gid=0
2. Create a Google API Project 
- Create one here (name doesn't matter) https://console.developers.google.com/projectcreate
- Add the Google Sheets API to the project here https://console.developers.google.com/apis/library
- Open the credentials page https://console.developers.google.com/apis/credentials
- Then create a credentials of type "API Key". It is recommended to restrict it to the Google Sheets API.
3. Create a command Respose with a "URL fetch" element. It will return "Plain text" using the "GET" request method.
- The URL will look like: `https://woth.herokuapp.com/woth.php?spreadsheet=insert_spreadsheet_id_here&token=insert_api_token_here&index=`
- If you want to support !woth 4 to output a fixed result, append the command "arguments" after &index=argument_here


## Notes
The app is limited to API limits of Google and usage limits of Heroku. If someone wanted, they could probably exceed the limits. For more information, you can see their respective documentation.
- Google API: https://console.developers.google.com/apis/api/sheets.googleapis.com/quotas (Currently 100 Read Requests per 100 seconds)
- Heroku Apps: https://devcenter.heroku.com/articles/limits


