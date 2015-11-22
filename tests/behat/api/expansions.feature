Feature: Expansions
  In order to get expansion information
  As an api consumer
  I need to be able to make requests to get expansions

  Scenario: Get all expansions, paginated
    When I request GET "/expansions"
    Then the response code is 200
    And the response is JSON
    And the "data" property is an array
    And scope into the first "data" property
      And the following properties exist:
        """
        id
        type
        attributes
        """
      And the "type" property equals "expansion"
      And scope into the "attributes" property
        And the following properties exist:
          """
          name
          abbreviation
          """

  Scenario: Get one expansion by uuid
    When I request GET "/expansions/9b99e418-0699-4769-b5a6-d51507bdd682"
    Then the response code is 200
    And the response is JSON
    And the "data" property is an object
    And scope into the "data" property
      And the following properties exist:
        """
        id
        type
        attributes
        """
      And the "type" property equals "expansion"
      And scope into the "attributes" property
        And the following properties exist:
          """
          name
          abbreviation
          """
