Feature: Get office
  In order to get Office on the platform
  As an Office Manager
  I want to get Office

  Scenario: From a non existing Office
    When I send a "GET" request to "/offices/a3700e00-9104-45e2-9d5e-df0f2dbceaee"
    Then the response status code should be 404