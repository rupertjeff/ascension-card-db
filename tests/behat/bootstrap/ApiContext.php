<?php

use App\Database\Model\Card;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use GuzzleHttp\Client;
use Laracasts\Behat\Context\DatabaseTransactions;
use PHPUnit_Framework_Assert as PHPUnit;

/**
 * Defines application features from the specific context.
 */
class ApiContext extends MinkContext implements Context, SnippetAcceptingContext
{
    use DatabaseTransactions;

    /**
     * @var Client
     */
    protected $client;
    /**
     * @var \GuzzleHttp\Psr7\Response
     */
    protected $response;
    /**
     * @var object
     */
    protected $responseData;
    /**
     * @var string
     */
    protected $scope;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('app.url'),
        ]);
    }

    /**
     * @When /^I request (GET|POST|PUT|DELETE) "([^"]*)"$/
     */
    public function iRequest($type, $uri)
    {
        $method = strtolower($type);

        try {
            switch ($method) {
                case 'post':
                case 'put':
                    $this->response = $this->client->$method($uri, null);
                    break;
                default:
                    $this->response = $this->client->$method($uri);
                    break;
            }
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse();

            if (is_null($response)) {
                throw $e;
            }

            $this->response = $response;
        }
    }

    /**
     * @Then the response code is :expectedCode
     */
    public function theResponseCodeIs($expectedCode)
    {
        $actualCode = $this->response->getStatusCode();

        PHPUnit::assertEquals($expectedCode, $actualCode);
    }

    /**
     * @Then the response is JSON
     */
    public function theResponseIsJson()
    {
        $this->responseData = json_decode($this->response->getBody());

        $expectedType = 'object';
        $actualObject = $this->responseData;

        PHPUnit::assertInternalType($expectedType, $actualObject);
    }

    /**
     * @Then the :name property is a(n) :type
     */
    public function thePropertyIsA($name, $type)
    {
        $data = $this->getScopedResponse();

        PHPUnit::assertInternalType($type, $data->$name);
    }

    /**
     * @Then scope into the first :name property
     */
    public function scopeIntoTheFirstProperty($name)
    {
        $this->scopeIntoFirst($name);
    }

    /**
     * @Then scope into the second :name property
     */
    public function scopeIntoTheSecondProperty($name)
    {
        $this->scopeIntoSecond($name);
    }

    /**
     * @Then the following properties exist:
     */
    public function theFollowingPropertiesExist(PyStringNode $string)
    {
        foreach (explode("\n", (string)$string) as $propertyName) {
            $this->theResponseHasProperty($propertyName);
        }
    }

    /**
     * @Then the property $propertyName exists
     */
    public function theResponseHasProperty($propertyName)
    {
        $data = $this->getScopedResponse();

        if (is_object($data)) {
            $data = get_object_vars($data);
        }

        PHPUnit::assertTrue(array_key_exists($propertyName, $data));
    }

    /**
     * @Then the :propertyName property has :expectedCount item(s)
     */
    public function thePropertyShouldHaveItemCount($propertyName, $expectedCount)
    {
        $data = $this->getScopedResponse();

        PHPUnit::assertCount((int)$expectedCount, $data->$propertyName);
    }

    /**
     * @Then scope into the :propertyName property
     */
    public function scopeIntoTheProperty($propertyName)
    {
        $this->scopeInto($propertyName);
    }

    /**
     * @Then the following properties may exist:
     */
    public function theFollowingPropertiesMayExist(PyStringNode $string)
    {
        // Nothing to do here... if they exist, great. If they don't, great. o_0
    }

    /**
     * @Then the :propertyName property equals :expectedValue
     */
    public function thePropertyEquals($propertyName, $expectedValue)
    {
        $data = $this->getScopedResponse();

        $actualValue = $data->$propertyName;

        PHPUnit::assertEquals($expectedValue, $actualValue);
    }

    /**
     * @Then reset scope
     */
    public function resetScope()
    {
        $this->scope = '';
    }

    /**
     * @param string   $name
     * @param int|null $first
     *
     * @return string
     */
    protected function scopeInto($name, $first = null)
    {
        $scope = explode('.', $this->scope);

        $scope[] = $name;
        if ($first) {
            if (is_integer($first)) {
                $scope[] = $first - 1;
            } else {
                $scope[] = '0';
            }
        }

        $this->scope = implode('.', array_filter($scope, function ($value) {
            if (0 === $value || '0' === $value) {
                return true;
            }

            if (empty($value)) {
                return false;
            }

            return true;
        }));


        return $this->scope;
    }

    protected function scopeIntoFirst($name)
    {
        return $this->scopeInto($name, 1);
    }

    protected function getScopedResponse()
    {
        if (empty($this->scope)) {
            return $this->responseData;
        }

        return $this->drillInto($this->responseData, $this->scope);
    }

    protected function drillInto($array, $path, $default = '')
    {
        if (is_null($path)) {
            return $default;
        }

        foreach (explode('.', $path) as $segment) {
            if (is_object($array)) {
                if ( ! isset($array->{$segment})) {
                    return $default;
                }
                $array = $array->{$segment};
            } else {
                if ( ! array_key_exists($segment, $array)) {
                    return $default;
                }
                $array = $array[$segment];
            }
        }

        return $array;
    }

    /**
     * @param $name
     */
    protected function scopeIntoSecond($name)
    {
        $this->scopeInto($name, 2);
    }
}
