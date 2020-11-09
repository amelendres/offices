Feature: List offices
  In order to list offices on the platform
  As a reader
  I want to list offices

  Background:
    Given I send a POST request to "/offices" with body:
    """
    {
        "id": "4c0616e6-cae3-42d1-aa43-d3606b70d9b8",
        "name": "Main Office BCN",
        "address": {
            "street": "Gran Via 1003",
            "city": "Barcelona",
            "state": "Catalunya",
            "country": "ES",
            "postalCode": "08020"
        }
     }
    """
    Given I send a POST request to "/offices" with body:
    """
    {
        "id": "3c0616e6-cae3-42d1-aa43-d3606b70d9b8",
        "name": "Diagonal Office",
        "address": {
            "street": "Diagonal 100",
            "city": "Barcelona",
            "state": "Catalunya",
            "country": "ES",
            "postalCode": "08020"
        }
     }
    """

  Scenario: A valid List offices
    When I send a GET request to "/offices"
    Then the response status code should be 200
    And the response content should be:
    """
    [
      {
        "id": "3c0616e6-cae3-42d1-aa43-d3606b70d9b8",
        "name": "Diagonal Office",
        "address": {
            "street": "Diagonal 100",
            "city": "Barcelona",
            "state": "Catalunya",
            "country": "ES",
            "postalCode": "08020"
        }
     },
      {
        "id": "4c0616e6-cae3-42d1-aa43-d3606b70d9b8",
        "name": "Main Office BCN",
        "address": {
            "street": "Gran Via 1003",
            "city": "Barcelona",
            "state": "Catalunya",
            "country": "ES",
            "postalCode": "08020"
        }
     }
    ]
    """