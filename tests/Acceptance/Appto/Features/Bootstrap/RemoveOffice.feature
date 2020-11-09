Feature: Remove office
  In order to get Office on the platform
  As an Office Manager
  I want to get Office

  Background:
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

  Scenario: From an existing Office
    When I send a "DELETE" request to "/offices/4c0616e6-cae3-42d1-aa43-d3606b70d9b8"
    Then the response status code should be 204

  Scenario: From a non existing Office
    When I send a "DELETE" request to "/offices/4c0616e6-cae3-42d1-aa43-d3606b70d9b8"
    Then the response status code should be 204
