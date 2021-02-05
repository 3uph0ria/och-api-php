<?php

namespace OchApi;

class OchApi
{
    /**
     * The API key.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * The API link.
     *
     * @var string
     */
    protected $link;

    /**
     * OchApi constructor.
     *
     * @param string $key The API key.
     */
    public function __construct($key = '')
    {
        $this->apiKey = $key;
        $this->link = 'https://gs-dev.ru/och/api/?key=' . $key;
    }

    public function GetServersInfo()
    {
        $method = 'getServersInfo';
        return file_get_contents($this->link . '&method=' . $method);
    }

    public function GetServersStats()
    {
        $method = 'getServersStats';
        return file_get_contents($this->link . '&method=' . $method);
    }

    public function GetUsersVk()
    {
        $method = 'getUsersVk';
        return file_get_contents($this->link . '&method=' . $method);
    }

    public function GetMessages()
    {
        $method = 'getMessages';
        return file_get_contents($this->link . '&method=' . $method);
    }
}