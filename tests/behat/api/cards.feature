Feature: Cards
  In order to use the various game cards
  As an api consumer
  I need to be able to get information about the various cards in the game

  Scenario: Get all cards in no particular order, paginated
    When I request GET "/cards"
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
      And scope into the "attributes" property
        And the following properties exist:
          """
          name
          type
          effect
          honor
          cost
          """
        And the following properties may exist:
          """
          quantity
          quote
          """
    And reset scope
    And scope into the "meta" property
      And scope into the "pagination" property
        And the following properties exist:
          """
          total
          count
          per_page
          current_page
          total_pages
          links
          """

  Scenario: Get one card by name as a url segment
    When I request GET "/cards/962d1d77-3b3c-4ad5-89d0-2d3b52f30201"
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
      And scope into the "attributes" property
        And the following properties exist:
          """
          name
          type
          effect
          honor
          cost
          """
        And the following properties may exist:
          """
          quantity
          quote
          """
    And reset scope
    And the "included" property is an array
    And the "included" property has 1 item
    And scope into the first "included" property
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

  Scenario: Get one card by name as a url segment with expansion
    When I request GET "/cards/962d1d77-3b3c-4ad5-89d0-2d3b52f30201?include=expansion"
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
      And scope into the "attributes" property
        And the following properties exist:
          """
          name
          type
          effect
          honor
          cost
          """
        And the following properties may exist:
          """
          quantity
          quote
          """
    And reset scope
    And the "included" property is an array
    And the "included" property has 2 items
    And scope into the second "included" property
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
