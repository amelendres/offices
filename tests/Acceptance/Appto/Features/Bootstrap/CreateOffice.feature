Feature: Create a new office
  In order to have office on the platform
  As a Office Manager
  I want to create a new office

  Scenario: A valid non existing office
    Given I send a POST request to "/offices" with body:
    """
    {
        "id": "4c0616e6-cae3-42d1-aa43-d3606b70d9b8",
        "name": "Office BCN",
        "address": {
            "street": "Gran Via 1003",
            "city": "Barcelona",
            "state": "Catalunya",
            "country": "ES",
            "postalCode": "08020"
        }
     }
    """
    Then the response status code should be 204
    And the response should be empty
    When I send a "GET" request to "/offices/4c0616e6-cae3-42d1-aa43-d3606b70d9b8"
    Then the response status code should be 200
    And the response content should be:
    """
    {
        "id": "4c0616e6-cae3-42d1-aa43-d3606b70d9b8",
        "name": "Office BCN",
        "address": {
            "street": "Gran Via 1003",
            "city": "Barcelona",
            "state": "Catalunya",
            "country": "ES",
            "postalCode": "08020"
        }
     }
    """

  Scenario: A valid existing Office, Conflict with duplicated id
    Given I send a POST request to "/offices" with body:
    """
    {
        "id": "4c0616e6-cae3-42d1-aa43-d3606b70d9b8",
        "name": "Office BCN",
        "address": {
            "street": "Gran Via 1003",
            "city": "Barcelona",
            "state": "Catalunya",
            "country": "ES",
            "postalCode": "08020"
        }
     }
    """
    Then the response status code should be 409

  Scenario: A valid Office with invalid address
    Given I send a POST request to "/offices" with body:
    """
    {
        "id": "3c0616e6-cae3-42d1-aa43-d3606b70d9b8",
        "name": "Office BCN",
        "address": {
            "street": "",
            "city": "Barcelona",
            "state": "Catalunya",
            "country": "ES",
            "postalCode": "08020"
        }
     }
    """
    Then the response status code should be 400