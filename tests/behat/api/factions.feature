Feature: Factions
  In order to get information about factions
  As an api consumer
  I need to be able to get factions

  Scenario: Get all factions, paginated
    When I request GET "/factions"
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
      And the "type" property equals "faction"
      And scope into the "attributes" property
        And the following properties exist:
          """
          name
          """

  Scenario: Get one faction by uuid
    When I request GET "/factions/1ccd71ce-eb73-4520-a90a-7b4b2b7d2199"
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
      And the "type" property equals "faction"
      And scope into the "attributes" property
        And the following properties exist:
          """
          name
          """
