Feature: ##MODULE_NAME##

  Scenario: Index page
    Given I am on homepage
     When I go to /##MODULE_NAME##
     Then the response status code should be 200
      And I should see "This is a temporary page"
