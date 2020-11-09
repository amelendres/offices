Feature: Update office
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

  Scenario: Change office name from an existing Office
    When I send a "PUT" request to "/offices/4c0616e6-cae3-42d1-aa43-d3606b70d9b8" with body:
    """
    {
        "id": "4c0616e6-cae3-42d1-aa43-d3606b70d9b8",
        "name": "Main Office",
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
    When I send a "GET" request to "/offices/4c0616e6-cae3-42d1-aa43-d3606b70d9b8"
    Then the response status code should be 200
    And the response content should be:
    """
    {
        "id": "4c0616e6-cae3-42d1-aa43-d3606b70d9b8",
        "name": "Main Office",
        "address": {
            "street": "Gran Via 1003",
            "city": "Barcelona",
            "state": "Catalunya",
            "country": "ES",
            "postalCode": "08020"
        }
     }
    """


  Scenario: Change office address with invalid address
    When I send a "PUT" request to "/offices/4c0616e6-cae3-42d1-aa43-d3606b70d9b8" with body:
    """
    {
        "id": "4c0616e6-cae3-42d1-aa43-d3606b70d9b8",
        "name": "Main Office",
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


  Scenario: From a non existing Office
    When I send a "PUT" request to "/offices/3c0616e6-cae3-42d1-aa43-d3606b70d9b8" with body:
    """
    {
        "id": "3c0616e6-cae3-42d1-aa43-d3606b70d9b8",
        "name": "Non existing office",
        "address": {
            "street": "Gran Via 1003",
            "city": "Barcelona",
            "state": "Catalunya",
            "country": "ES",
            "postalCode": "08020"
        }
     }
    """
    Then the response status code should be 404

