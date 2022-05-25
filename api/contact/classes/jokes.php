<?php
/**
 * @class Jokes
 * This is used to pull the jokes from the given api.
 */
class Jokes
{
    public $count;

    /**
     * Jokes constructor.
     * @param $count
     */
    public function __construct($count)
    {
        $this->count = $count;
    }

    /**
     * @return array
     */
    function getJokes(){
        $count = $this->count;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'http://api.icndb.com/jokes/random/'.$count);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch); // Close the connection

        (array)$result = json_decode($response);

        return $jokeData = (array)$result->value;
    }


}