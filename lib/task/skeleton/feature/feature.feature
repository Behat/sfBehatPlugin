Feature: ##MODULE_NAME##

  Scenario: Index page
    Given I am on homepage
     When I go to /##MODULE_NAME##
     Then Response status code is 200
      And I should see "This is a temporary page"
